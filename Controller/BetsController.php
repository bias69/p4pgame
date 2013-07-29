<?php
App::uses('AppController', 'Controller');
/**
 * Bets Controller
 *
 * @property Bet $Bet
 * @property PaginatorComponent $Paginator
 */
class BetsController extends AppController {

/**
 * paginate
 *
 * @var array
 */
	public $paginate = array(
		'fields' => array('id', 'fight_date'),
		'contain' => array('Fighter' => array('fields' => array('name')),
						'Bet' => array('fields' => array('id', 'bet_name', 'odds', 'type', 'event_id'))),
		'conditions' => array('Event.status' => array('Draft')),
		'limit' => 10
		);

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('events', $this->paginate('Event'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
		$this->set('bet', $this->Bet->find('first', $options));
	}

/**
 * admin_add method
 * @throws NotFoundException
 * @return void
 */
	public function admin_add($event_id = null) {
		if ($this->request->is('post')) {
			$this->Bet->create();
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'), 'flash_error');
			}
		}
		if ($event_id) {
			if($this->Bet->Event->exists($event_id)) {
				$event = $this->Bet->Event->find('first', array('conditions' => array('Event.id' => $event_id), 
					'contain' => array('Fighter' => array('fields' => array('name'))), 'fields' => array('fight_date')));
				$this->request->data['Bet']['event_id'] = $event['Event']['id'];
				$this->set(compact('event'));
			}
		}
		else {
			throw new NotFoundException(__('No Event specified'));
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
			$this->request->data = $this->Bet->find('first', $options);
		}
		$event = $this->Bet->Event->find('first', array('conditions' => array('Event.id' => $this->request->data['Bet']['event_id']), 
			'contain' => array('Fighter' => array('fields' => array('name'))), 'fields' => array('fight_date')));
		$this->set(compact('event'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bet->id = $id;
		if (!$this->Bet->exists()) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bet->delete()) {
			$this->Session->setFlash(__('Bet deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bet was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
