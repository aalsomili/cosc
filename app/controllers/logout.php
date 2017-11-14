<?php

class Logout extends Controller {
	
	public function logout() {
		
		$user = $this->model('User');
        $user->logout($_SERVER['REMOTE_ADDR'], $_SESSION['username']);
        session_destroy();
        header ('location:/');
	}
}