<?php 

define("ACC", true);
define("DS", DIRECTORY_SEPARATOR);
define("NOW_PATH", dirname(__FILE__) . DS);

include_once(NOW_PATH . "../../library" . DS . "index.php");
//include_once(NOW_PATH . "../../library/core" . DS . "application.func.php");

class MrPHPControllerTest extends PHPUnit_Framework_TestCase
{
	public $controller;

	function __construct()
	{
		$this->controller = new MrController();
	}

	public function testUriSegment()
	{
		$seg = uriSegment(1);

		$this->assertEmpty($seg);

	}
	
}




