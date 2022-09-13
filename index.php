<?php
require_once 'config/config.php';
require_once 'lib/core.php';
// Session d'utilisateur
session_start();

// module = controlleur
$module = isset($_REQUEST['module'])? safe($_REQUEST['module']):$config['default_module'];

//echo $module;
//action = fonction dedans le controlleur
$action = isset($_REQUEST['action'])? safe($_REQUEST['action']):$config['default_action'];
//echo $action;

//http://localhost/web21622/mvc/?module=user&action=abc

$controller_file = 'controllers/'.ucfirst($module).'Controller.php';

//echo $controller_file;

if(!file_exists($controller_file)){
    trigger_error('Invalid Controller');
    exit;
}
require_once($controller_file);

$function = strtolower($module).'_controller_'.$action;

//-echo $function;
if(!function_exists($function)){
    trigger_error('Invalid Function');
    exit;
}

call_user_func($function, $_REQUEST);


?>



