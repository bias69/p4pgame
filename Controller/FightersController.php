<?php
App::uses('AppController', 'Controller');
/**
 * Fighters Controller
 *
 * @property Fighter $Fighter
 * @property PaginatorComponent $Paginator
 */
class FightersController extends AppController {

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
		$this->Fighter->recursive = 0;
		$this->set('fighters', $this->Paginator->paginate());
	}



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Fighter->recursive = 0;
		$this->set('fighters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Fighter->exists($id)) {
			throw new NotFoundException(__('Invalid fighter'));
		}
		$options = array('conditions' => array('Fighter.' . $this->Fighter->primaryKey => $id));
		$this->set('fighter', $this->Fighter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fighter->create();
			if ($this->Fighter->save($this->request->data)) {
				$this->Session->setFlash(__('The fighter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fighter could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Fighter->exists($id)) {
			throw new NotFoundException(__('Invalid fighter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Fighter->save($this->request->data)) {
				$this->Session->setFlash(__('The fighter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fighter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Fighter.' . $this->Fighter->primaryKey => $id));
			$this->request->data = $this->Fighter->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Fighter->id = $id;
		if (!$this->Fighter->exists()) {
			throw new NotFoundException(__('Invalid fighter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Fighter->delete()) {
			$this->Session->setFlash(__('Fighter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fighter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
