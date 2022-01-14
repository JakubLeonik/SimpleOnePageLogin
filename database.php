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
    //check user
    function checkUser($login, $password){
        //sanityze
        $login = $this->connection->real_escape_string($login);
        $password = $this->connection->real_escape_string($password);
        //build and execute statement
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE login=? AND password=?");
        $stmt->bind_param('ss', $login, $password);
        $stmt->execute();
        //check result
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //close connection
    function __destruct(){
        $this->connection->close();
    }
}
?>