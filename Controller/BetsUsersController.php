<?php
App::uses('AppController', 'Controller');
/**
 * BetsUsers Controller
 *
 * @property BetsUser $BetsUser
 * @property PaginatorComponent $Paginator
 */
class BetsUsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('index');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// get all current user's bets
		$betsUsers = $this->BetsUser->find('all', array('conditions' => array('BetsUser.user_id' => $this->Auth->user('id')),
			'fields' => array('id', 'bet_id', 'user_id', 'ammount'),
			'contain' => array('Bet' => array('fields' => array('id', 'bet_name', 'odds', 'won', 'event_id'))),
			));
		// extract unique id's of events these bets belong to
		$event_ids = array();
		foreach ($betsUsers as $betsUser) {
			$event_ids[] = $betsUser['Bet']['event_id'];
		}
		$event_ids = array_unique($event_ids);
		// get only events user placed bets on
		$events = $this->BetsUser->Bet->Event->find('all', array(
			'fields' => array('id', 'status', 'fight_date'),
			'contain' => array('Fighter' => array('fields' => array('name'))),
			'conditions' => array('Event.id' => $event_ids)
		));
		$this->set(compact('events', 'betsUsers'));
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
			if(!$this->Auth->loggedIn()) {
				return json_encode(array('login' => 'You have to sign in first.'));
			}
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
		$credits = (int) $this->BetsUser->User->field('credits') - (int) $this->request->data['bet_ammount'];
		$this->BetsUser->User->set('credits', $credits);
		$this->BetsUser->User->save();
	}
}
