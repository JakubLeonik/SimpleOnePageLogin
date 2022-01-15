<?php
require_once('error.php');
class Database{
    //data for connection to database
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $databaseName = 'simpleOnePageLogin';
    private $connection;

    //create connection to database
    function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
        if($this->connection->connect_error) Err::throwError('Connection to database error', 'index.php');
    }
    //authenticate user
    function checkUser($login, $password){
        //sanityze
        $login = $this->connection->real_escape_string($login);
        $password = $this->connection->real_escape_string($password);
        //build and execute statement
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE login=?");
        $stmt->bind_param('s', $login);
        $stmt->execute();
        //check result
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])) return $user;
            else return null;
        } else {
            return null;
        }
    }
    //check if user exist in database
    function isUserExist($login){
        //sanityze
        $login = $this->connection->real_escape_string($login);
        //build and execute statement
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE login=?");
        $stmt->bind_param('s', $login);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) return true;
        else return false;
    }
    //add user to database
    function addUser($login, $password){
        //sanityze
        $login = $this->connection->real_escape_string($login);
        $password = $this->connection->real_escape_string($password);
        //build and execute statement
        $stmt = $this->connection->prepare("INSERT INTO users (login, password) values (?, ?)");
        $stmt->bind_param('ss', $login, $password);
        $status = $stmt->execute();
        return $status;
    }
    //close connection to database
    function __destruct(){
        $this->connection->close();
    }
}
?>