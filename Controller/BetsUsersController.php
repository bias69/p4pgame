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


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}

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

	public function place_bet() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			$this->BetsUser->set('bet_id', $this->request->data['bet_id']);
			$this->BetsUser->set('user_id', $this->Auth->user('id'));
			$this->BetsUser->set('ammount', $this->request->data['bet_ammount']);
			if($this->BetsUser->save()) {
				$this->_subtractAmmount();
			}
			if(isset($this->BetsUser->validationErrors) && !empty($this->BetsUser->validationErrors)) {
				return json_encode($this->BetsUser->validationErrors);
			}
			else {
				return json_encode(array('success' => 'success'));
			}
		}
		else {
			throw new BadRequestException(__('Not allowed'));
		}
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
				$this->_subtractAmmount();
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


/**
 * _subtractAmmount method
 * @return void
 */
	private function _subtractAmmount() {
		$this->BetsUser->User->recursive = 0;
		$this->BetsUser->User->read(array('credits'), $this->Auth->user('id'));
		$credits = (int) $this->BetsUser->User->field('credits') - (int) $this->request->data['BetsUser']['ammount'];
		$this->BetsUser->User->set('credits', $credits);
		$this->BetsUser->User->save();
	}
}
