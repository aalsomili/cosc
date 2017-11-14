<?php

class Home extends Controller {

    public function index($name = ' ') {		
        $user = $this->model('User');
		
		$this->view('home/index', ['message' => 'Welcome to the website']);
    }

    public function login($name = ' ') {
		$logs = $this->model('Logs');
		$counter = $logs->getLogin($_SERVER['REMOTE_ADD']);
		$this->view('home/login', ['counter' => $counter);
    }
	
} //end of Home class
