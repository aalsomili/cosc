<?php

class User {
	
	public $username;
    public $password;
	public $hpassword
    public $auth = false;
	
	public function __construct() { 
	
    }
	
	/* authenticate function */
	public function authenticate($add) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$db = db_connect();
        $statement = $db->prepare("SELECT username, password FROM users 
			WHERE username = :username;");
        $statement->bindValue(':username', $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		$isSuccess = false;
		if ($rows) {
			
			if (password_verify($this->password, $rows[0]['password'])) {
				$this->auth = true;
				$_SESSION['username'] = $rows[0]['username'];
				$isSuccess = true;
			}
		}
		
		$statement = $db->prepare("INSERT INTO logsActivity (username, is_login, address, success) VALUES (:username, true, :address, :success);");
        $statement->bindValue(':username', $this->username);
        $statement->bindValue(':address', $add);
        $statement->bindValue(':success', $success);
        $statement->execute();
		
    } //end of authenticate funtion
	
	/* Rigester function */
	public function register($username, $password) {
			
			//check to see if the user already exist
			$db = db_connect();
			$statement = $db->prepare("SELECT * FROM users WHERE username = :username;");
			$statement->bindValue(':username', $username);
			$statement->execute();
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			if ($rows) {
				return false;
				
			} else {
				//if it is not there, register the user 
				$statement = $db->prepare("INSERT INTO users (username, password)" 
						. " VALUES (':username', ':password'); ");
				$statement->bindValue(':username', $username);
				$statement->bindValue(':password', $password);
				$statement->execute();
			
				$_SESSION['username'] = $username;
			}	
			
	} //end of Register function
	
	/* Logout function */
	 public function logout ($address, $username) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO logsActivity (username, is_login, address, success) VALUES (:username, false, :address, true);");
        $statement->bindValue(':username', $username);
        $statement->bindValue(':address', $add);
        $statement->execute();
    } //end of Logout function 

} //end of User class 