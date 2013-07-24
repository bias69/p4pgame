<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * Code Model
 *
 * @property User $User
 */
class Code extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * sendActivation method
 * @return void
 */
	public function sendActivationCode($user_id = null) {
		if($user_id) {
			$user = $this->User->find('first', array('conditions' => array('id' => $user_id), 'fields' => array('username', 'email')));
			$code = $this->find('first', array('conditions' => array('user_id' => $user_id)));
			$email = new CakeEmail('default');
			$email->to(array($user['User']['email'] => $user['User']['username']));
			$email->viewVars(array('username' => $user['User']['username'], 'code' => $code['Code']['id']));
			$email->send();
		}
	}
}
