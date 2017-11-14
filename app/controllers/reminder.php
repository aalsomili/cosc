<?php

class Reminder extends Controller {
	
	/* index function */
    public function index() {		
        
		$reminders = $this->model('Reminders');
        $remindersList = $reminders->getReminders($_SESSION['username']);
		
        $this->view('reminder/reminder_list', ['reminders' => $remindersList]);
    } //end of index function
	
	/* create function */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reminders = $this->model('Reminders');
            $reminders->create($_POST['subject'], $_POST['desc'], $_SESSION['username']);
            header('Location:/reminder');
        } else {
            $this->view('reminder/create');
        }
		
    } //end of create function 
	
	/* update function */
    public function update($id) {
		
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reminders = $this->model('Reminders');
            $reminders->update($_POST['id'], $_POST['subject'], $_POST['desc']);
            header('Location:/reminder');
			
        } else {
            $reminders = $this->model('Reminders');
            $item = $reminders->getReminder($id);
            
            $this->view('reminder/update', ['item' => $item] );
        }
    } //end of  function
	
	/* remove function */
    public function remove($id) {
        $reminders = $this->model('Reminders');
        $reminders->remove_reminder($id);
        header('Location:/reminder');
		
    } //end of remove function
	
}