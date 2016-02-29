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

		$this->assertStringMatchesFormat("object(mysqli)%a[\"client_info\"]%w=>%wstring(%d)%a", $res);

	}

	public function testGetRecommend()
	{
		curl_setopt($this->ch, CURLOPT_URL, BASE_URI . "index.php/index/getRecommend");
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);

		$res = curl_exec($this->ch);

		$this->assertStringMatchesFormat("%a!@#$%^&*%a!@#$%^&*%a", $res);
	}

	public function testGetCat()
	{
		$num = rand(0, 1000);
		curl_setopt($this->ch, CURLOPT_URL, BASE_URI . "index.php/index/getCat/" . $num);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);

		$res = curl_exec($this->ch);

		$this->assertStringMatchesFormat("[%A]", $res);
	}

	public function testSearch()
	{
		$num = rand(0, 1000);
		curl_setopt($this->ch, CURLOPT_URL, BASE_URI . "index.php/index/getCat/" . $num);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);

		$res = curl_exec($this->ch);

		$this->assertStringMatchesFormat("[%A]", $res);
	}
	
}




