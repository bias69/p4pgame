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
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Fighter->exists($id)) {
			throw new NotFoundException(__('Invalid code'));
		}
		$options = array('conditions' => array('Fighter.' . $this->Fighter->primaryKey => $id));
		$this->set('fighter', $this->Fighter->find('first', $options));
	}


/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
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
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
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


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
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

}
