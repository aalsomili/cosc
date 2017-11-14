<?php

class Reports extends Controller {
	
    public function login() {
		$logs = $this->model('Logs');
		$this->view('reports/login', ['logs' => $logs->getLogs()]);    
    }
	
}