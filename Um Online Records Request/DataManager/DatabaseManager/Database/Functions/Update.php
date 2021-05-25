<?php
namespace DataManager\DatabaseManager\Functions;

include_once "DataManager/DatabaseManager/Database/Connection/Connection.php";

use DataManager\DatabaseManager\Connection\Connector;

class Update
{
    public static function executeUpdate($sqlQuery)
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