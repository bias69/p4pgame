<?php
App::uses('AppController', 'Controller');
/**
 * BetsUsers Controller
 *
 * @property BetsUser $BetsUser
 * @property PaginatorComponent $Paginator
 */
class BetsUsersController extends AppController {

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
		$this->BetsUser->recursive = 0;
		$this->set('betsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BetsUser->exists($id)) {
			throw new NotFoundException(__('Invalid bets user'));
		}
		$options = array('conditions' => array('BetsUser.' . $this->BetsUser->primaryKey => $id));
		$this->set('betsUser', $this->BetsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BetsUser->create();
			if ($this->BetsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The bets user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bets user could not be saved. Please, try again.'));
			}
		}
		$bets = $this->BetsUser->Bet->find('list');
		$users = $this->BetsUser->User->find('list');
		$this->set(compact('bets', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BetsUser->exists($id)) {
			throw new NotFoundException(__('Invalid bets user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BetsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The bets user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bets user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BetsUser.' . $this->BetsUser->primaryKey => $id));
			$this->request->data = $this->BetsUser->find('first', $options);
		}
		$bets = $this->BetsUser->Bet->find('list');
		$users = $this->BetsUser->User->find('list');
		$this->set(compact('bets', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BetsUser->id = $id;
		if (!$this->BetsUser->exists()) {
			throw new NotFoundException(__('Invalid bets user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BetsUser->delete()) {
			$this->Session->setFlash(__('Bets user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bets user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
