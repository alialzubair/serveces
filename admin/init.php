<?php
//init the clases

//strat the session
session_start();

//set the config

$GLOBALS['config']=array(
 //set the connect database
 'mysql'=>array(
     'host'=>'127.0.0.1',
     'username'=>'root',
     'password'=>'',
     'db'=>'serves'
 ),
 'remeber'=>array(
     'coolie_name'=>'hash',
     'cookie_expiry'=>604800
 ),
 'session'=>array(
     'session_name'=>'user'
 )
);

//load the all classes
spl_autoload_register(function($class){
 require_once 'classes/'.$class.'.php';
});

include 'include/header.php';








// include all imoprtfile
// include 'model/actions.php';
// include 'config/connect.php';

// include 'function/function.php';
// include 'include/header.php';
// include 'include/footer.php';

