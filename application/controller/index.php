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
		var_dump(0);
		return 0;

	}

	/**
	 * get the recommend videos
	 * 
	 * @return json
	 */
	public function getRecommend()
	{
		$res = $this->model("db")->getRecommend();

		$res = json_encode($res);
		var_dump($res);

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
		var_dump($res);

		return $res;

	}

	/**
	 * get search results.
	 * 
	 * @return int 0 the request key is empty.
	 */
	public function search()
	{
		$key = get("key");

		if (is_array($key) || empty($key) || trim($key) == "") {
			var_dump(0);
			return 0;
		}

		$res = $this->model("db")->search($key);
		$res = json_encode($res);
		var_dump($res);

		return $res;

	}

}










