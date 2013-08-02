<?php
App::uses('AppModel', 'Model');
App::uses('Event', 'Model');
/**
 * BetsUser Model
 *
 * @property Bet $Bet
 * @property User $User
 */
class BetsUser extends AppModel {

	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'bet_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isPublished' => array(
				'rule' => array('eventPublishedCheck'),
				'message' => 'There\'s no such event.'
			)
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ammount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'validAmmount' => array(
				'rule' => array('validAmmount'),
				'message' => 'You don\'t have enough credits.'
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Bet' => array(
			'className' => 'Bet',
			'foreignKey' => 'bet_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * validAmmount method
 * @return boolean
 */

	public function validAmmount() {
		$this->User->recursive = 0;
		$users_credits = $this->User->read('credits', AuthComponent::user('id'));
		if($this->data['BetsUser']['ammount'] <= $users_credits['User']['credits']) {
			return true;
		}
	}

	public function eventPublishedCheck() {
		$event_id = $this->Bet->read('event_id', $this->data['BetsUser']['bet_id']);
		$Event = new Event();
		$event_status = $Event->read('status', $event_id['Bet']['event_id']);
		if($event_status['Event']['status'] == 'Published') {
			return true;
		}
	}
}
