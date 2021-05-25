<?php
namespace DataManager\LoginManager;

include_once "DataManager/SessionController.php";
include_once "DataManager/DatabaseController.php";
include_once "DataManager/DatabaseManager/Database/Connection/DatabaseConfiguration.php";

use DataManager\SessionManager\Session;
use DataManager\DatabaseManager\DB;
use DataManager\DatabaseManager\Connection\classes;

class Log
{
    public static function checkThis($id, $pass)
    {
        $identifierID = "_ID";
        $identifierPASSWORD = "PASSWORD";

        $keys = classes::getKeys();
        $returnArray = array();
        foreach($keys as $tableName)
        {
            $class = classes::getClass($tableName);
            $configID = $class->col(strtolower($tableName.$identifierID));
            $configPass = $class->col(strtolower($identifierPASSWORD));

            
            $return = DB::do()
            ->select()
            ->all()
            ->from($tableName)
            ->where($configID)
            ->isEqualTo($id)
            ->and($configPass)
            ->isEqualTo($pass)
            ->endSelect();
            if(!empty($return))array_push($returnArray, $tableName);
            $returnArray = array_merge($returnArray, $return);
        }
        return $returnArray;
    }
    public static function setRole($table)
    {
        Session::set('role', $table);
        Session::set('POS', $table);
        return new self;
    }
    public function setAllSession($data)
    {
        Session::set('name', $data['FIRSTNAME']);

        foreach($data as $key => $value)
        {
            Session::set($key, $value);
        }
        return $data;
    }
}

?>