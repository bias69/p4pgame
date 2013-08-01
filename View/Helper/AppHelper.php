<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

	public function eventStatusBtn($status = null) {
		switch ($status) {
			case 'Draft':
				return 'label';
				break;
			
			case 'Published':
				return 'label label-success';
				break;

			case 'Ended':
				return 'label label-important';
				break;

			case 'Closed':
				return 'label label-inverse';
				break;
		}
		return false;
	}

	public function activeStatus($status = null) {
		if(!array_key_exists('status', $this->params['named'])) {
			if($status == 'all') {
				return 'class="active"';
			}
		}
		else {
			if ($status == $this->params['named']['status']) {
				return 'class="active"';
			}
		}
		
	}

	public function activeController($controller = null, $action = true) {
		if($controller == $this->params['controller'] &&
			$action == $this->params['action']) {
			return 'class="active"';
		}
	}

	public function resultIcon($bool = false) {
		if($bool) {
			return '<i class="icon-ok"></i>';
		}
		else {
			return '<i class="icon-remove"></i>';
		}
	}

	public function betButton($betType = null, $betArray = array()) {
		if($betType == 'O' && is_array($betArray) && !empty($betArray)) {
			$otherBetsArray = array();
			foreach ($betArray as $bet) {
				if($bet['type'] == 'O') {
					$otherBetsArray[] = $bet;
				}
			}
			return $otherBetsArray;
		}
		if($betType && is_array($betArray) && !empty($betArray)) {
			foreach ($betArray as $bet) {
				if($bet['type'] == $betType) {
					return array('bet_name' => $bet['bet_name'], 'bet_id' => $bet['id'], 'odds' => $bet['odds']);
				}
			}
		}
	}

}
