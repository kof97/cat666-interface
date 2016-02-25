<?php 
/**
 * controller
 * 
 * PHP version 5
 *
 * @category PHP
 * @author   LYJ <1048434786@qq.com>
 */
if (!defined('ACC')) exit('this script access allowed');

class Index extends MrController
{
	public function init()
	{
		return 0;
	}

	/**
	 * 
	 * 
	 * 
	 * @return int 0 the request key is empty.
	 */
	public function search()
	{
		$key = "1";
		if (trim($key) == "") {
			return 0;
		}

		$res = $this->model("db")->search($key);


		var_dump($res);
	}

	public function get()
	{
		
	}





}










