<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function authenticate() {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$db = db_connect();
        $statement = $db->prepare("select * from users
                                WHERE username ='$username';
                ");
        $statement->bindValue('$username', $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) {
			$this->auth = true;
			$_SESSION['name'] = $rows[0]['name'];
		}
    }
	
	public function register ($username, $password) {
		$db = db_connect();
        $statement = $db->prepare("INSERT INTO users (name)"
                . " VALUES ('$username'); ");

        $statement->bindValue('$username', $username);
        $statement->execute();

	}

}
