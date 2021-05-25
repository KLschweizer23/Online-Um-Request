<?php
namespace DataManager\DatabaseManager\Functions;

include_once "DataManager/DatabaseManager/Database/Connection/Connection.php";

use DataManager\DatabaseManager\Connection\Connector;

class Select
{
    public static function executeSelect($sqlQuery)
    {
        $connection = Connector::get()->Connection();
        $resultSet = mysqli_query($connection, $sqlQuery);

        $results = array();
        if($resultSet != null)
        {
            while($row = mysqli_fetch_assoc($resultSet))
            {
                array_push($results, $row);
            }
        }
        return $results;
    }
}
?>