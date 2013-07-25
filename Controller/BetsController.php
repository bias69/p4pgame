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
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Bet->recursive = 0;
		$this->set('bets', $this->Paginator->paginate());
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
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Bet->create();
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'));
			}
		}
		$events = $this->Bet->Event->find('list');
		$this->set(compact('events'));
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
				$this->Session->setFlash(__('The bet has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
			$this->request->data = $this->Bet->find('first', $options);
		}
		$events = $this->Bet->Event->find('list');
		$users = $this->Bet->User->find('list');
		$this->set(compact('events', 'users'));
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
