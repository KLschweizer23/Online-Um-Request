<?php
include_once "BladeOne-master/lib/BladeOne.php";
include_once "DataManager/SessionController.php";
include_once "DataManager/DataController.php";

use eftec\bladeone\BladeOne;
use DataManager\SessionManager\Session;
use DataManager\DataController\DataControl;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeOne($views, $cache,BladeOne::MODE_DEBUG);

$blade->setCurrentUser(Session::get('name'));
$blade->setCurrentRole(Session::get('role'));

$pass = array('setBackground'=>null, 'blade'=>$blade,
    'data'=>DataControl::data()->allData(),
    'user'=>DataControl::data()->getNonAdminUserAndData(),
    'allData'=>DataControl::data()->getCompleteData()
);

echo $blade->setView('dashboard')
            ->share($pass)
            ->run();
?>