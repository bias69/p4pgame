<?php
App::uses('AppController', 'Controller');
App::uses('User', 'Model');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 */
class EventsController extends AppController {


/**
 * paginate
 *
 * @var array
 */

	public $paginate = array(
		'contain' => array('Fighter' => array('fields' => array('id', 'name'))),
		'limit' => 10,
		'order' => array('bets_close_time' => 'asc')
	);

/**
 * beforeFilter method
 * @return void
 */

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'show_results');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$events = $this->Event->getPublishedEvents();
		if(!empty($events)) {
			foreach ($events as &$event) {
				$event['Event']['description'] = $this->Event->prepareDescription($event['Event']['description']);
			}			
		}
		$promoted_event = $this->Event->getPublishedEvents(true);
		if(!empty($promoted_event)) {
			$promoted_event['Event']['description'] = $this->Event->prepareDescription($promoted_event['Event']['description']);
		}		
		$this->set(compact('events', 'promoted_event'));
	}

/**
 * show_results method
 *
 * @return void
 */

	public function show_results() {
		$events = $this->Event->find('all', array(
			'fields' => array('id', 'status', 'fight_date', 'result'),
			'conditions' => array('status' => 'Closed'),
			'contain' => array('Fighter' => array('fields' => array('name')))
		));
		$this->set(compact('events'));
	}
/**
 * admin_payout method
 *
 * @return void
 */

	public function admin_payout($id) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->Event->Bet->saveAll($this->request->data['Bet'])) {
				$this->Event->id = $this->request->data['Event']['id'];
				$this->Event->set('status', 'Closed');
				$this->Event->save();
				$this->_payoutCreditsToUsers($this->request->data['Bet']);

				$this->Session->setFlash(__('Bets have been paid out'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			}
		}
		$this->request->data = $this->Event->find('first', array('conditions' => array('Event.id' => $id)));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		if(array_key_exists('status', $this->params['named']) && $this->params['named']['status'] != 'all') {
			$this->paginate = array_merge(array('conditions' => array(
				'Event.status =' => $this->_getNamedStatus())), $this->paginate);
		}

		$this->set('events', $this->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->_giveCreditsToBrokeUsers();
				$this->Session->setFlash(__('The event has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		$fighters = $this->Event->Fighter->find('list');
		$this->set(compact('fighters'));
	}

/**
 * admin_publish method
 *
 * @return void
 */
	public function admin_publish($id = null) {
		$this->_publishPromote($id, 'published', array('status', 'Published'));
	}

/**
 * admin_unpublish method
 *
 * @return void
 */
	public function admin_unpublish($id = null) {
		$this->_publishPromote($id, 'unpublished', array('status', 'Draft'));
	}


/**
 * admin_promote method
 *
 * @return void
 */
	public function admin_promote($id = null) {
		$this->_publishPromote($id, 'promoted', array('promoted', 1));
	}


/**
 * admin_unpromote method
 *
 * @return void
 */
	public function admin_unpromote($id = null) {
		$this->_publishPromote($id, 'unpromoted', array('promoted', 0));
	}

/**
 * admin_end_event method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_end_event($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Event->set('status', 'Ended');
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been ended'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be ended. Please, try again.'), 'flash_warning');
				$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
				$this->request->data = $this->Event->find('first', $options);
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
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
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'flash_warning');
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$fighters = $this->Event->Fighter->find('list');
		$this->set(compact('fighters'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('Event deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event was not deleted'), 'flash_warning');
		$this->redirect(array('action' => 'index'));
	}

/**
 * _giveCreditsToBrokeUsers method
 * @return void
 */

	private function _giveCreditsToBrokeUsers() {
		$user = new User();
		$user->recursive = 0;
		$userList = $user->find('all', array('conditions' => array('credits =' => 0), 'fields' => array('id', 'credits')));
		if(!empty($userList)) {
			foreach ($userList as &$userDetails) {
				$userDetails['User']['credits'] = 75;
			}
			$user->saveAll($userList);
		}
	}

	private function _getNamedStatus() {
		if(array_key_exists('status', $this->params['named'])) {
			switch ($this->params['named']['status']) {
				case 'all':
					return '';
					break;
				case 'drafts':
					return 'draft';
					break;
				case 'published':
					return 'published';
					break;
				case 'ended':
					return 'ended';
					break;
				case 'closed':
					return 'closed';
					break;
			}
		}
	}

	private function _publishPromote($id = null, $message = null, $options = array()) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->Event->id = $id;
		list($field, $value) = $options;
		$this->Event->set($field, $value);
		if($this->Event->save()) {
			$this->Session->setFlash(__("The event has been {$message}"), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->Session->setFlash(__("The event could not be {$message}"), 'flash_warning');
			$this->redirect(array('action' => 'index'));
		}		
	}

	private function _payoutCreditsToUsers($bets = array()) {
		foreach ($bets as $key => $bet) {
			if($bet['won'] == 1) {
				$User = new User();
				$User->Bet->recursive = 0;
				$odds = $User->Bet->read('odds', $bet['id']);
				$users_bets = $User->BetsUser->find('all', array('conditions' => array('bet_id' => $bet['id']), 'fields' => array('id', 'user_id', 'ammount')));
				foreach ($users_bets as $user_bet) {
					$User->recursive = 0;
					$User->read('credits', $user_bet['BetsUser']['user_id']);
					$User->data['User']['credits'] = (int) ($User->data['User']['credits'] + ($user_bet['BetsUser']['ammount']*$odds['Bet']['odds']));
					$User->save();
				}

			}
		}
	}

}
