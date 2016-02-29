<?php 

define("ACC", true);
define("DS", DIRECTORY_SEPARATOR);
define("TEST_PATH", dirname(__FILE__) . DS);

$class = TEST_PATH . "../library/core" . DS . "MrController.class.php";

var_dump($class);

include_once($class);

function __autoload($class)
{
	$path = TEST_PATH . "../library/core" . DS . "MrController.class.php";

	if (file_exists($path)) {
		include_once($path);
	}
}

spl_autoload_register('__autoload');















