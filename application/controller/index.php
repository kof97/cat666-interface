<?php 
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






}










