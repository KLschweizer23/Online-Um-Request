<?php
include "BladeOne-master/lib/BladeOne.php";
include "DataManager/SessionController.php";

use eftec\bladeone\BladeOne;
use DataManager\SessionManager\Session;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeOne($views, $cache,BladeOne::MODE_DEBUG);

$blade->setCurrentKey(Session::get('key'));
$oldId = Session::get('old');

$pass = array('setBackground'=>null, 'blade'=>$blade, 'old_ID'=>$oldId);

echo $blade->setView('login')
            ->share($pass)
            ->run();
?>