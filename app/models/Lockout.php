<?php
class Lockout {
	
    public function __construct() {
        
    }
	
	/* isLocked function */
    public function isLocked($add) {
		
		$db = db_connect();
        $statement = $db->prepare("SELECT * FROM lockout_times
                                WHERE address = :address ORDER BY date_time DESC;");
        $statement->bindValue(':address', $address);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $date_time = new DateTime();
        $date_time->sub(date_interval_create_from_date_string('5 hours'));
        
		if ($rows) {
            
            $server_timestamp = $rows[0]['date_time'];
            
            $server_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $server_timestamp );
            
            $server_datetime->add(date_interval_create_from_date_string('30 seconds'));
            if ($date_time > $server_datetime) {
                return false;
            }
            return true;
		}
        return false; 
    } //end isLocked 
    public function lockout($address) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO lockout_times (address) VALUES (:address);");
        $statement->bindValue(':address', $address);
        $statement->execute();
    }
}