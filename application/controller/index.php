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

    // get danmu by id
    public function getDanmu()
    {
        $id = intval(post("id"));

        $res = $this->model("db")->getDanmu($id);
        $res = json_encode($res);

        echo $res;

    }

    // get cat recommend by fid. limit 0, 4
    public function getCatRecommend()
    {
        $id = intval(post("id"));

        $res = $this->model("db")->getCatRecommend($id);
        $res = json_encode($res);

        echo $res;

    }

    public function viewcounts()
    {
        $id = intval(post("id"));

        $res = $this->model("db")->viewcounts($id);

        echo $res;
    }

    public function register()
    {
        $user = post("user");
        $password = md5(post("password"));

        if (trim($user) == "") {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;
            return 0;
        }

        $res = $this->model("db")->register($user, $password);
        $res = json_encode($res);

        echo $res;

    }

    public function check()
    {
        $user = post("user");
        $password = md5(post("password"));

        if (trim($user) == "") {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;
            return 0;
        }

        $res = $this->model("db")->check($user, $password);

        if (count($res) == 0) {
            $res = array("error" => "0");
        }
        $res = json_encode($res);

        echo $res;

    }

    public function getCollection()
    {
        $userId = intval(post("userid"));

        if ($userId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->getCollection($userId);

        if (count($res) == 0) {
            $res = array("error" => "0");
        }
        $res = json_encode($res);

        echo $res;

    }

    public function setCollection() 
    {
        $userId = intval(post("userid"));
        $videoId = intval(post("videoid"));

        if ($userId == 0 || $videoId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->setCollection($userId, $videoId);
        $res = json_encode($res);

        echo $res;

    }

    public function cancelCollection()
    {
        $userId = intval(post("userid"));
        $videoId = intval(post("videoid"));

        if ($userId == 0 || $videoId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->cancelCollection($userId, $videoId);
        $res = json_encode($res);

        echo $res;
    }

    public function getVideoInfo()
    {
        $videoId = intval(post("videoid"));

        if ($videoId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }

        $res = $this->model("db")->getVideoInfo($videoId);
        $res = json_encode($res);

        echo $res;
    
    }

    public function alterNick()
    {
        $userId = intval(post("userid"));
        $nick = trim(post("nick"));

        if ($userId == 0 || $nick == "") {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }

        $res = $this->model("db")->alterNick($userId, $nick);
        $res = json_encode($res);

        echo $res;

    }

    public function alterSex()
    {
        $userId = intval(post("userid"));
        $sex = intval(post("sex"));

        if ($userId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }

        $res = $this->model("db")->alterSex($userId, $sex);
        $res = json_encode($res);

        echo $res;

    }

    public function alterBirth()
    {
        $userId = intval(post("userid"));
        $birth = trim(post("birth"));

        if ($userId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }

        $res = $this->model("db")->alterBirth($userId, $birth);
        $res = json_encode($res);

        echo $res;

    }

    public function alterSignature()
    {
        $userId = intval(post("userid"));
        $signature = trim(post("signature"));

        if ($userId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }

        $res = $this->model("db")->alterSignature($userId, $signature);
        $res = json_encode($res);

        echo $res;

    }

    public function alterPassword()
    {
        $userId = intval(post("userid"));
        $password = trim(post("password"));

        if ($userId == 0 || $password == "") {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }

        $password = md5($password);
        $res = $this->model("db")->alterPassword($userId, $password);
        $res = json_encode($res);

        echo $res;

    }

    public function sendDanmu()
    {
    	$userId = intval(post("userid"));
    	$videoId = intval(post("videoid"));
    	$danmu = trim(post("danmu"));

    	if ($userId == 0 || $danmu == "") {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }

        $res = $this->model("db")->sendDanmu($userId, $videoId, $danmu);
        $res = json_encode($res);
        echo $res;

    }

    public function getFollow()
    {
    	$userId = intval(post("userid"));

    	if ($userId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->getFollow($userId);

        if (count($res) == 0) {
            $res = array("nothing" => "1");
        }
        $res = json_encode($res);

        echo $res;

    }

    public function setFollow()
    {
    	$userId = intval(post("userid"));
    	$followId = intval(post("followid"));

    	if ($userId == 0 || $followId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->setFollow($userId, $followId);
        $res = json_encode($res);

        echo $res;

    }

    public function cancelFollow()
    {
    	$userId = intval(post("userid"));
    	$followId = intval(post("followid"));

    	if ($userId == 0 || $followId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->cancelFollow($userId, $followId);
        $res = json_encode($res);

        echo $res;

    }

    public function catFood()
    {
    	$userId = intval(post("userid"));
    	$videoId = intval(post("videoid"));
    	$cat = intval(post("cat"));

    	if ($userId == 0 || $videoId == 0 || $cat == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->catFood($userId, $videoId, $cat);
        $res = json_encode($res);

        echo $res;

    }

    public function getVideoById()
    {
        $userId = intval(post("userid"));

        if ($userId == 0) {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;
        }

        $res = $this->model("db")->getVideoById($userId);
        $res = json_encode($res);

        echo $res;

    }

    public function alterPic()
    {
        $userId = intval(post("userid"));
        $tmp_name = $_FILES['pic']['tmp_name'];
        
        if ($userId == 0 || trim($tmp_name) == "") {
            $res = array("error" => "0");
            $res = json_encode($res);
            echo $res;

            return false;

        }
        $res = $this->model("db")->alterPic($userId, $tmp_name);
        $res = json_encode($res);

        echo $res;

    }

    public function getAll() 
    {
        $res = $this->model("db")->getAll();
        $res = json_encode($res);

        echo $res;
    }



}










