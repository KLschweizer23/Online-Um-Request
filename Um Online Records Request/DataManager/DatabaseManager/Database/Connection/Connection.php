<?php
namespace DataManager\DatabaseManager\Connection;

include_once "DataManager/DatabaseManager/Database/Connection/DatabaseConfiguration.php";

use DataManager\DatabaseManager\Connection\Config;

class Connector
{
    private $serverName;
    private $username;
    private $password;
    private $databaseName;

    private $connection;
    private $errorMessage;
 
    public function __construct()
    {
        $this->serverName = Config::get()->has('serverName');
        $this->username = Config::get()->has('username'); 
        $this->password = Config::get()->has('password'); 
        $this->databaseName = Config::get()->has('databaseName');

        $this->connection = mysqli_connect($this->serverName, $this->username, $this->password);

        if(!$this->connection)
        {
            $this->errorMessage='Connection failed : ' . mysqli_connect_error();
            die($this->errorMessage);
        }
        else
        {
            $isConnected = mysqli_select_db($this->connection, $this->databaseName);

            if(!$isConnected)
            {
                $sqlQuery = "CREATE DATABASE " . $this->databaseName;
                if(mysqli_query($this->connection, $sqlQuery))
                    return 'Database Created';
                else
                {
                    $this->errorMessage = mysqli_error($this->connection);
                    return  $this->errorMessage;
                }
            }
        }
    }
    public static function get()
    {
        return new self;
    }
    public function Connection()
    {
        return $this->connection;
    }
}

?>