<?php 

define("DS", DIRECTORY_SEPARATOR);
define("NOW_PATH", dirname(__FILE__) . DS);
define("BASE_URI", "http://localhost/cat666-interface/");

include_once(NOW_PATH . "../../" . DS . "index.php");


class IndexTest extends PHPUnit_Framework_TestCase
{
	public $ch;

	function __construct()
	{
		$this->ch = curl_init();
	}

	public function testInit()
	{
		curl_setopt($this->ch, CURLOPT_URL, BASE_URI . "index.php/index/init");
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);

		$res = curl_exec($this->ch);

		//var_dump($res);
		$this->assertEmpty($res);

	}
	
}




