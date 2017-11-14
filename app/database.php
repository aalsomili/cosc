<?php

/* database connection stuff here
 * 
 */

function db_connect() {
    try {
        $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USER, DB_PASS);
        return $dbh;
    } catch (PDOException $e) {
        echo $e.getMessage();
    }
}
