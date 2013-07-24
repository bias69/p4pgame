<?php
App::uses('AppController', 'Controller');
/**
 * Codes Controller
 *
 * @property Code $Code
 * @property PaginatorComponent $Paginator
 */
class CodesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function beforeFilter() {
		$this->Auth->allow();
	}

/**
 * activate_account method
 * @return void
 */

	public function activate_account($code = null) {
		if($code) {
			$user_id = $this->Code->read(array('user_id'), $code);
			if($user_id) {
				$this->Code->User->recursive = 0;
				$this->Code->User->read(array('id', 'active'), $user_id['Code']['user_id']);
				$this->Code->User->set('active', 1);
				if($this->Code->User->save()) {
					$this->Code->delete($code);
					$this->Session->setFlash(__('Your account has been activated'));
					$this->redirect(array('controller' => 'users', 'action' => 'login'));
				}
			}
			else {
				throw new NotFoundException(__('No code found'));
			}
		}
		else {
			throw new BadRequestException(__('You need a code to activate account'));
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Code->recursive = 0;
		$this->set('codes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Code->exists($id)) {
			throw new NotFoundException(__('Invalid code'));
		}
		$options = array('conditions' => array('Code.' . $this->Code->primaryKey => $id));
		$this->set('code', $this->Code->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Code->create();
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.'));
			}
		}
		$users = $this->Code->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Code->exists($id)) {
			throw new NotFoundException(__('Invalid code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Code.' . $this->Code->primaryKey => $id));
			$this->request->data = $this->Code->find('first', $options);
		}
		$users = $this->Code->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Code->id = $id;
		if (!$this->Code->exists()) {
			throw new NotFoundException(__('Invalid code'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Code->delete()) {
			$this->Session->setFlash(__('Code deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Code was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
