<?php

namespace DataManager\SessionManager;

class SessionVariables
{
    public static function getSessionVariables()
    {
        $var = array(
            "name"=>"name",
            "role"=>"role",
            "key"=>"key",
            "old"=>"old",
            "ID"=>"ID",
            "POS"=>"POS",
            "PICKPUP"=>"PICKUP",
            "FIRSTNAME"=>"FIRSTNAME",
            "MIDDLENAME"=>"MIDDLENAME",
            "LASTNAME"=>"LASTNAME",
            "ADDRESS"=>"ADDRESS",
            "PHONE"=>"PHONE",
            "EMAIL"=>"EMAIL",

            "YEAR"=>"YEAR",
            "POSITION"=>"POSITION",
            "SYEAR"=>"SYEAR",
            "COURSE"=>"COURSE",

        );
        return $var;
    }
}
?>