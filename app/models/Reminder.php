<?php

class Reminder {
	
	public function_construct() {
		
	}
	
	/* getReminders function */
	public function getReminders($username){
		
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE username=:username AND deleted=0;");
        $statement->bindValue(':username', $username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
        return $rows;
		
    } //end of getReminders function
	
	/* getReminder function */
	 public function getReminder($id){
		 
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE id=:id;");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
		
        return $row;
		
    } //end of getReminder function 
	
	/* create function*/
	public function create($subject, $description, $username) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO reminders (subject, description, username) 
		VALUES (:subject, :description, :username);");
        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':username', $username);
        $statement->execute();
		
    } //end of create function 
	
	
	/* update function */
	public function update($subject, $description, $id){
        $db = db_connect();
        $statement = $db->prepare("UPDATE reminders SET subject=:subject, description=:description WHERE id=:id;");
        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':id', $id);
        $statement->execute();
		
    } //end of update function
	
	/* remove function */
	public function remove($id){
        $db = db_connect();
        $statement = $db->prepare("UPDATE reminders SET deleted=1 WHERE id=:id;");
        $statement->bindValue(':id', $id);
        $statement->execute();
		
    } //end of remove function
	
} //end of class Reminder
