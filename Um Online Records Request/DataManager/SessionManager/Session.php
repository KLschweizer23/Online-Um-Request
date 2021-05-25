<?php
namespace DataManager\SessionManager;

if(session_id()==''){session_start();}

include "DataManager/SessionManager/SessionVariables.php";

use  DataManager\SessionManager\SessionVariables;

    class mySession
    {
        public static function mySession()
        {
            return new self;
        }
        public static function variableExist($variableName)
        {            
            $v = SessionVariables::getSessionVariables();
            $exist = false;

            foreach ($v as $variables)
            {
                if($variables == $variableName)
                {
                    $exist = true;
                    break;
                }
            }
            return $exist;
        }
        public function setSession($variableName, $value)
        {
            if($this->variableExist($variableName)){$_SESSION[$variableName] = $value;}
            else{return "Session name does not exist!";}
        }

        public function getSession($variableName)
        {
            if($this->variableExist($variableName))
            {
                if(!isset($_SESSION[$variableName]))
                {
                    return null;
                }
                return $_SESSION[$variableName];
            }
            else{return "Session name does not exist!";}
        }
        public function clearSession()
        {
            $v = SessionVariables::getSessionVariables();
            foreach($v as $variables)
            {
                $_SESSION[$variables] = null;
            }
        }
    }
?>