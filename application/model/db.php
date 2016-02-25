<?php 
/**
 * db interface
 * 
 * PHP version 5
 *
 * @category PHP
 * @author   LYJ <1048434786@qq.com>
 */
if (!defined('ACC')) exit('this script access allowed');

class Db extends MrModel
{
	public $db;

	/**
	 * get the database object.
	 * 
	 * @return void
	 */
	function __construct()
	{
		$this->db = $this->db();
	}

	/**
	 * 
	 * 
	 * 
	 */
	public function getRecommend()
	{	
		$result = array();
		$arr = array();

		// $cat(name => id)
		$cat = array();

		// get top category list
		$c = $this->db->query("select id, name from nav where parentid = 0");
		while ($p = $c->fetch_assoc()) {
			$catName = $p['name'];
			$cat["$catName"] =  $p["id"];
			
		}

		// get 4 videos that order by viewcounts
		$res = $this->db->query("select * from videoinfo order by viewcounts limit 0, 4");
		while ($r = $res->fetch_assoc()) {
			array_push($arr, $r);
		}
		$result[0] = $arr;
		$arr = array();

		// get every categorys top 4
		foreach ($cat as $name => $id) {

			$res = $this->db->query("select * from videoinfo where fid = $id order by viewcounts limit 0, 4");
			while ($r = $res->fetch_assoc()) {
				array_push($arr, $r);
			}
			$result["$name"] = $arr;
			$arr = array();
		}

		return $result;
	}

	/**
	 * get videos' information by catgory.
	 * 
	 * @param int $id category id.
	 * @return array
	 */
	public function getCat($id)
	{
		$arr = array();

		$res = $this->db->query("select * from videoinfo where fid = $id");
		while ($r = $res->fetch_assoc()) {
			array_push($arr, $r);
		}

		return $arr;
	}

	public function search($key)
	{


		return 0;
	}

	



	
}