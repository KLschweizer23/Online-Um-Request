<?php
namespace DataManager\DatabaseManager;

include_once "DataManager/DatabaseManager/Database/Functions/Insert.php";
include_once "DataManager/DatabaseManager/Database/Functions/Delete.php";
include_once "DataManager/DatabaseManager/Database/Functions/Update.php";
include_once "DataManager/DatabaseManager/Database/Functions/Select.php";
include_once "DataManager/DatabaseManager/Database/Functions/Table.php";

use DataManager\DatabaseManager\Functions\Insert;
use DataManager\DatabaseManager\Functions\Delete;
use DataManager\DatabaseManager\Functions\Update;
use DataManager\DatabaseManager\Functions\Select;
use DataManager\DatabaseManager\Functions\Table;

class database
{
    public static function insertData($table, $query)
    {
        $tab = Table::createIfNotExist($table);
        return $tab . "---" . Insert::executeInsert($query);
    }
    public static function deleteData($table, $query)
    {
        $tab = Table::createIfNotExist($table);
        return $tab && Delete::executeDelete($query);
    }
    public static function updateData($table, $query)
    {
        $tab = Table::createIfNotExist($table);
        return $tab . "---" . Update::executeUpdate($query);
    }
    public static function selectData($table, $query)
    {
        $tab = Table::createIfNotExist($table);
        return Select::executeSelect($query);
    }
}

?>