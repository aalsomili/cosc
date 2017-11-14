<?php
class Logs {
	
    public function __construct() {
        
    }
	
	/* getLogs function */
    public function getLogs(){
        
		$db = db_connect();
        $statement = $db->prepare("SELECT * FROM logActivity ORDER BY date_time DESC;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
        return $rows;
		
    } //end og getLogs function 
	
    public function getLoginCount($add){
		
        $db = db_connect();
        $statement = $db->prepare("SELECT COUNT(date_time) AS count FROM logActivity WHERE address=:address 
		 AND is_login=1 AND DATE_FORMAT(date_time, '%y-%m-%d') = DATE_FORMAT(:today_date, '%y-%m-%d');");
        $statement->bindValue(':address', $add);
        $date_time = new DateTime();
        $date_time->sub(date_interval_create_from_date_string('5 hours'));
        $statement->bindValue(':today_date', $date_time->format('Y-m-d'));
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
		
        return $rows['count'];
		
    } //end of getLoginCount
	
		/* lastLogin*/
        public function lastLogin($username){
        $db = db_connect();
        $statement = $db->prepare("SELECT date_time FROM logActivity WHERE username=:username AND isLogin=1 ORDER BY date_time DESC;");
        $statement->bindValue(':username', $username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
        return $rows;
		
    } //end of lastLogin function 
}