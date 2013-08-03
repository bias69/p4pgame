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
		$this->Auth->allow('place_bet');
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
 * place_bet method
 *
 * @return json
 */

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
