<?php
namespace DataManager\InputManager;

include_once "DataManager/Databasemanager/Database/Connection/DatabaseConfiguration.php";
include_once "DataManager/SessionController.php";

use DataManager\DatabaseManager\Connection\classes;
use DataManager\SessionManager\Session;

class Data
{
    public static function get()
    {
        return new self;
    }
    public function all()
    {
        $class = classes::getClass(Session::get('role'));
        return $variables = $class->all();
    }
}
?>