<?php
namespace DataManager\DatabaseManager\Functions;

include_once "DataManager/DatabaseManager/Database/Connection/DatabaseConfiguration.php";
include_once "DataManager/DatabaseManager/Database/Connection/Connection.php";

use DataManager\DatabaseManager\Connection\classes;
use DataManager\DatabaseManager\Connection\Connector;
class Table
{
    public static function createIfNotExist($table)
    {
        $tableClass = classes::getClass($table);
        $connection = Connector::get()->Connection();

        $sqlQuery = "CREATE TABLE IF NOT EXISTS $table (" . $tableClass->attributedCol() . ")";
        if(mysqli_query($connection, $sqlQuery))
        {
            return true;
        }
        else
        {
            return "Error creating table: Error message -> " . mysqli_error($connection);
        }
    }
}
?>