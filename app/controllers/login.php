<?php

class Login extends Controller {
    public function index() {
        $user = $this->model('User');
		
		if(isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
		}
		
        

        $user->authenticate();

        if ($user->auth == TRUE) {
            $_SESSION['auth'] = true;
        }
        
        header('Location: /home');
    }
	
	public function register () {
		$user = $this->model('User');
		
		if(isset($_POST['submit-btn'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			$user->register($username, $password);
			$_SESSION['auth'] = true;
		}
		
		$this->view('home/register');
	}
}
