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

	/**
	 * 
	 * 
	 * 
	 */
	public function getRecommend()
	{
		$res = $this->model("db")->getRecommend();

		$res = json_encode($res);
		
		return $res;
	}

	/**
	 * get videos' information by catgory.
	 * the uri segment 3 is the category id.
	 * 
	 * @return json
	 */
	public function getCat()
	{
		$id = uriSegment(3);
		$res = $this->model("db")->getCat($id);

		$res = json_encode($res);
		return $res;
	}





}










