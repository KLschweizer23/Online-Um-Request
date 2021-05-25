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

$blade->setCurrentRole(Session::get('role'));

$array = array('setBackground'=>null, "blade"=>$blade);
echo $blade->setView('register')
            ->share($array)
            ->run();
?>