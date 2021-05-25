<?php
namespace DataManager\SessionManager;

include_once "DataManager/SessionManager/Session.php";

use  DataManager\SessionManager\mySession;


class Session
{
    public static function set($var, $val)
    {
        mySession::mySession()->setSession($var, $val);
    }

    public static function get($val)
    {
        return mySession::mySession()->getSession($val);
    }
    public static function clear()
    {
        mySession::mySession()->clearSession();
    }
}

?>