<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
 * beforeFilter method
 *
 * @return void
 */

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}


/**
 * login method
 *
 * @return void
 */
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	$this->Session->setFlash(__('You are logged in now'), 'flash_success');
	            return $this->redirect($this->Auth->redirectUrl());
	        } else {
	        	$this->_checkAccountActivated();
	            $this->Session->setFlash(__('Username or password is incorrect'), 'flash_warning', array(), 'auth');
	        }
	    }
	}


/**
 * logout method
 * @return void
 */

	public function logout() {
		$this->Session->setFlash(__('You\'ve been logged out'), 'default', array(), 'auth');
	    $this->redirect($this->Auth->logout());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['active'] = 0;
			$this->request->data['User']['credits'] = 1000;
			if ($this->User->save($this->request->data)) {
				$this->User->Code->data['Code']['user_id'] = $this->User->id;
				$this->User->Code->save();
				$this->User->Code->sendActivationCode($this->User->id);
				$this->Session->setFlash(__('The user has been saved and activation code sent to your email address.'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_error');
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$bets = $this->User->Bet->find('list');
		$this->set(compact('bets'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * _checkAccountActivated method
 * @return redirect
 */

	private function _checkAccountActivated() {
	    	$this->User->recursive = 0;
	    	$user_activation_status = $this->User->find('first', array('conditions' => 
	    		array('username' => $this->request->data['User']['username']), 
	    		'fields' => array('id', 'active')));
	    	if(!empty($user_activation_status) && !$user_activation_status['User']['active']) {
	    		$this->Session->setFlash(__('You have to activate your account before logging in'), 'flash_error', array(), 'auth');
	    		return $this->redirect(array('controller' => 'users', 'action' => 'login'));
	    	}
	    	else {
	    		return;
	    	}
	}

}
