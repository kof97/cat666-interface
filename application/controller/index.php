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
        var_dump($this->db());
        echo 0;

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

        echo $res;

    }

    /**
     * get videos' information by catgory.
     * the uri segment 3 is the category id.
     * 
     * @return json
     */
    public function getCat()
    {
        $id = intval(uriSegment(3));
        $res = $this->model("db")->getCat($id);

        $res = json_encode($res);

        echo $res;

    }

    /**
     * get search results.
     * 
     * @return int 0 the request key is empty.
     */
    public function search()
    {
        $key = post("key");
        //$key = "A";

        if (is_array($key) || trim($key) == "") {
            echo "[{\"error\": \"0\"}]";
            return 0;
        }

        $res = $this->model("db")->search($key);

        if (count($res) == 0) {
            echo "[{\"error\": \"0\"}]";
            return 0;
        }
        $res = json_encode($res);

        echo $res;

    }

    public function getDanmu()
    {
        $id = intval(post("id"));

        $res = $this->model("db")->getDanmu($id);
        $res = json_encode($res);

        echo $res;

    }

}










