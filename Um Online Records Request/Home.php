<?php
include "BladeOne-master/lib/BladeOne.php";
include "DataManager/SessionController.php";

use eftec\bladeone\BladeOne;
use DataManager\SessionManager\Session;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeOne($views, $cache,BladeOne::MODE_DEBUG);


Session::set('key', 'none');
Session::set('old', null);

$blade->setCurrentUser(Session::get('name'));
$blade->setCurrentRole(Session::get('role'));

$pass = array('setBackground'=>'um-background', 'blade'=>$blade);

echo $blade->setView('home')
            ->share($pass)
            ->run();
?>