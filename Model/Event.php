<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property Bet $Bet
 * @property Fighter $Fighter
 */
class Event extends AppModel {


	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fight_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bets_close_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'result' => array(
			'custom' => array(
				'rule' => '/^[a-zA-Z0-9\ ]+$/',
				'message' => 'only letters, numbers and spaces',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Bet' => array(
			'className' => 'Bet',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Fighter' => array(
			'className' => 'Fighter',
			'joinTable' => 'events_fighters',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'fighter_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

/**
 * getPublishedEvents method
 * @return array
 */
	public function getPublishedEvents($promoted = false) {
		$options = array(
			'fields' => array(
					'Event.id',
					'Event.fight_date',
					'Event.bets_close_time',
					'Event.description',
					'Event.promoted'
				),
			'contain' => array(
					'Bet' => array(
							'fields' => array(
									'Bet.id',
									'Bet.bet_name',
									'Bet.odds',
									'Bet.type',
									'Bet.event_id'
								)
						),
					'Fighter' => array(
							'fields' => array(
									'Fighter.id',
									'Fighter.name',
									'Fighter.record',
									'Fighter.photo',
									'Fighter.photo_dir'
								)
						)
				),
			'conditions' => array(
					'Event.status' => 'Published',
					'Event.promoted' => $promoted
				),
			'order' => array('bets_close_time' => 'asc')
		);
		$method = $promoted ? 'first' : 'all';
		return $this->find($method, $options);
	}

	public function prepareDescription($description = null) {
		if($description) {
			return explode(';',$description);
		}
	}

}
