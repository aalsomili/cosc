<?php

public function db_connect() {
	
	try{
		$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USER, DB_PASS);
		return $db;
		
	} catch(PDOException $e){
		echo $e->getMessage();
		die;
	}
	
} //end of db_connect function