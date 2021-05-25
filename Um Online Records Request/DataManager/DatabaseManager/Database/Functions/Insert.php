<?php
namespace DataManager\DatabaseManager\Functions;

include_once "DataManager/DatabaseManager/Database/Connection/Connection.php";

use DataManager\DatabaseManager\Connection\Connector;

class Insert
{
    public static function executeInsert($sqlQuery)
    {
        $connection = Connector::get()->Connection();
        if(mysqli_query($connection, $sqlQuery))
        {
            return true;
        }
        else
        {
            return mysqli_error($connection) . ' - here ins';
        }
    }
}
?>