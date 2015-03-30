<?php
class UserimageimportShell extends Shell {

	public $uses = array('User');

	public function main() {

		$users = $this->User->find('all');

		foreach($users as $user) {

			$this->User->id = $user['User']['id'];

//			copy(IMAGES . 'users/logos/' . $user['User']['image_1'], IMAGES . 'users/image_1/' . $user['User']['image_1']);
//			copy(IMAGES . 'users/logos/' . $user['User']['image_2'], IMAGES . 'users/image_2/' . $user['User']['image_2']);
//			copy(IMAGES . 'users/logos/' . $user['User']['image_3'], IMAGES . 'users/image_3/' . $user['User']['image_3']);
//			copy(IMAGES . 'users/logos/' . $user['User']['image_4'], IMAGES . 'users/image_4/' . $user['User']['image_4']);
//			copy(IMAGES . 'users/logos/' . $user['User']['image_5'], IMAGES . 'users/image_5/' . $user['User']['image_5']);
//			copy(IMAGES . 'users/logos/' . $user['User']['image_6'], IMAGES . 'users/image_6/' . $user['User']['image_6']);

//			if(!empty($user['User']['image_1'])) {
//				rename(IMAGES . 'users/image_1/' . $user['User']['image_1'], IMAGES . 'users/image_1/' . $user['User']['slug'] . '.jpg');
//				$this->User->saveField('image_1', $user['User']['slug'] . '.jpg');
//			}

		}

	}

}
