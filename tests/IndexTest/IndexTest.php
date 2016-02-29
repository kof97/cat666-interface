<?php 

define("DS", DIRECTORY_SEPARATOR);
define("NOW_PATH", dirname(__FILE__) . DS);

include_once(NOW_PATH . "../../" . DS . "index.php");


class IndexTest extends PHPUnit_Framework_TestCase
{

	public function testInit()
	{
		$seg = uriSegment(1);

		$this->assertEmpty($seg);

	}
	
}




