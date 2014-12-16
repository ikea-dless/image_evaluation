<?php
class TopsController extends AppController {
	var $uses = array('Top', 'User');
	public function index() {
		/*
$user = $this->User->find('first', array(
			'conditions' => array('session' => CakeSession::read('Config.userAgent'))
		));
*/
		//if (!empty($user)) {
		//	$this->redirect(array('action' => 'already'));
		//}
	}

	public function submit() {
		$this->autoRender = false;
		//$datas = $this->request->data;
		if ($this->request->is('post')) {
			//$this->Top->saveField('value', $this->request->data[$num]);
			$this->User->saveField('session', CakeSession::read('Config.userAgent'));
			//$user = $this->User->find('first', array(
			//	'conditions' => array('session' => CakeSession::read('Config.userAgent')),
				//'fields' => array('id')
			//));
			//$id = $user['User']['id'];
			/*
foreach($datas as $key => $data) {
				$ary = array(
					'key' => $key,
					'value' => $data,
					'user_id' => $id
				);
				$this->Top->save($ary);
			}
*/
		}
	}
	
	public function already() {
		echo '既にアンケートに答えています。';
	}
	
	public function complete() {
		echo 'ご協力ありがとうございました。';
	}
}