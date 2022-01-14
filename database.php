<?php
require_once('error.php');
class Database{
    //data for connection to database
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $databaseName = 'simpleOnePageLogin';
    private $connection;

    //create connection
    function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
        if($this->connection->connect_error) Err::throwError('Connection to database error', 'index.php');
    }
    //close connection
    function __destruct(){
        $this->connection->close();
    }
}
?>