<?php
class Login extends Controller {
	
    public function index() {
        $user = $this->model('User');
		$lockout = $this->model('Lockout');
        $logs = $this->model('Logs');
		
		if (!isset($_SESSION['countLoginAttempts'])) {
            $_SESSION['countLoginAttempts'] = 0;
            $_SESSION['loginAttempts'] = array();
        }
		
		//if username is entered
		if (isset($_POST['username'])) {
			$user->username = $_POST['username'];
		}
		
		//if password is entered
		if (isset($_POST['password'])) {
			$user->password = $_POST['password'];
		}
		
		if (!$lockout->isLocked($_SERVER['REMOTE_ADDR'])) {
            $user->authenticate($_SERVER['REMOTE_ADDR']);
            if ($user->auth == TRUE) {
                $_SESSION['auth'] = true;
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loginDate'] = $logs->lastLogin($_POST['username']);
            }
            else {
                $_SESSION['countLoginAttempts'] += 1;
                $message = 'incorrect was provided was';
            }
        } else {
            $message = 'You have been locked out';
        }
        if ($_SESSION['countLoginAttempts'] >= 3) {
            $lockout->lockout($_SERVER['REMOTE_ADDR']);
            $_SESSION['countLoginAttempts'] = 0;
        }
        $counter = $logs->loginCount($_SERVER['REMOTE_ADDR']);
        
        $this->view('home/login', ['message' => $message, 'counter' => $counter]);
		
    } //end of index function
	
	/* register function */
	public function register () {
		$user = $this->model('User');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			if($password != $cpassword) {
				echo '<script type="text/javascript"> alert("password and confirm password does not match") </script>';
				} else if($username == "") {
					echo '<script type="text/javascript"> alert("please enter a usename") </script>';
					} else if($password == "") {
						echo '<script type="text/javascript"> alert("please enter a password") </script>';
						} else if($cpassword == "") {
							echo '<script type="text/javascript"> alert("please enter a confirmation password") </script>';
							} else if(strlen($username) < 4) {
								echo '<script type="text/javascript"> alert("username must be more than 3 characters") </script>';
								} else if(strlen($password) < 6) {
									echo '<script type="text/javascript"> alert("password must be more than 6 characters") </script>';
										} else if(strlen($cpassword) < 6) {
											echo '<script type="text/javascript"> alert("confirmation password must be more than 6 characters") </script>';
											} else {
												$hpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
												$user->register($username, $hpassword);
												echo '<script type="text/javascript"> alert("register was successful") </script>';
												}
		} 	

		$this->view('home/register');
		
	} //end of registration function
	
} //end of Login class