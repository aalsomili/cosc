<?php

class Home extends Controller {

    public function index($name = '') {		
        $user = $this->model('User');
		
		if (strtolower($_SESSION['name']) == 'mike') {
			$message = 'You are awesome';
		} else {
			$message = 'You suck';
		}
		
        $this->view('home/', ['message' => $message]);
    }

    public function login($name = '') {
        $this->view('home/login');
    }

}
