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

class Db
{
	function __construct()
	{
		
	}

	public function get($table)
	{
		$db = $this->db();

		$res = $db->query("select * from $table");
	}

	public function search($key)
	{


		return 0;
	}



	
}