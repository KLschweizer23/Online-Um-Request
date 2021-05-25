<?php
namespace DataManager\DatabaseManager\Functions;

include_once "DataManager/DatabaseManager/Database/Connection/Connection.php";

use DataManager\DatabaseManager\Connection\Connector;

class Delete
{
    public static function executeDelete($sqlQuery)
    {
        $connection = Connector::get()->Connection();
        if(mysqli_query($connection, $sqlQuery))
        {
            return 0;
        }
        else
        {
            return mysqli_error($connection);
        }
    }
}
?>