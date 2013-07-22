<?php
App::uses('AppController', 'Controller');
/**
 * EventsFighters Controller
 *
 * @property EventsFighter $EventsFighter
 * @property PaginatorComponent $Paginator
 */
class EventsFightersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventsFighter->recursive = 0;
		$this->set('eventsFighters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventsFighter->exists($id)) {
			throw new NotFoundException(__('Invalid events fighter'));
		}
		$options = array('conditions' => array('EventsFighter.' . $this->EventsFighter->primaryKey => $id));
		$this->set('eventsFighter', $this->EventsFighter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventsFighter->create();
			if ($this->EventsFighter->save($this->request->data)) {
				$this->Session->setFlash(__('The events fighter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events fighter could not be saved. Please, try again.'));
			}
		}
		$events = $this->EventsFighter->Event->find('list');
		$fighters = $this->EventsFighter->Fighter->find('list');
		$this->set(compact('events', 'fighters'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventsFighter->exists($id)) {
			throw new NotFoundException(__('Invalid events fighter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventsFighter->save($this->request->data)) {
				$this->Session->setFlash(__('The events fighter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events fighter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventsFighter.' . $this->EventsFighter->primaryKey => $id));
			$this->request->data = $this->EventsFighter->find('first', $options);
		}
		$events = $this->EventsFighter->Event->find('list');
		$fighters = $this->EventsFighter->Fighter->find('list');
		$this->set(compact('events', 'fighters'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventsFighter->id = $id;
		if (!$this->EventsFighter->exists()) {
			throw new NotFoundException(__('Invalid events fighter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventsFighter->delete()) {
			$this->Session->setFlash(__('Events fighter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Events fighter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
