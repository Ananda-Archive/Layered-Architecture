<?php

class DatabaseConfig {

    private $DB_HOST = "localhost:3306";
    private $DB_USERNAME = "root";
    private $DB_PASSWORD = "1234";
    private $DB_DATABASE = "tkresti";
    public $DB_CONNECTION;

    public function __construct() {
        $connection = new PDO ("mysql:host=".$this->DB_HOST.";dbname=".$this->DB_DATABASE.";",$this->DB_USERNAME,$this->DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->DB_CONNECTION = $connection;
    }

}