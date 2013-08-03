<?php
App::uses('AppController', 'Controller');
/**
 * Codes Controller
 *
 * @property Code $Code
 * @property PaginatorComponent $Paginator
 */
class CodesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function beforeFilter() {
		$this->Auth->allow();
	}

/**
 * activate_account method
 * @throws NotFoundException, BadRequestException
 * @return void
 */

	public function activate_account($code = null) {
		if($code) {
			$user_id = $this->Code->read(array('user_id'), $code);
			if($user_id) {
				$this->Code->User->recursive = 0;
				$this->Code->User->read(array('id', 'active'), $user_id['Code']['user_id']);
				$this->Code->User->set('active', 1);
				if($this->Code->User->save()) {
					$this->Code->delete($code);
					$this->Session->setFlash(__('Your account has been activated'));
					$this->redirect(array('controller' => 'users', 'action' => 'login'));
				}
			}
			else {
				throw new NotFoundException(__('No code found'));
			}
		}
		else {
			throw new BadRequestException(__('You need a code to activate account'));
		}
	}

}
