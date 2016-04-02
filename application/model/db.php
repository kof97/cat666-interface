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
    // to save the database object
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
     * get the recommend videos.
     * 
     * @return array
     */
    public function getRecommend()
    {   
        $result = array();
        $arr = array();

        // $cat(name => id)
        $cat = array();

        // get top category list
        $c = $this->db->query("SELECT id, name from nav where parentid = 0");
        while ($p = $c->fetch_assoc()) {
            $catName = $p['name'];
            $cat["$catName"] =  $p["id"];
            
        }

        // get 4 videos that order by viewcounts
        $res = $this->db->query("SELECT * from videoinfo order by viewcounts desc limit 0, 4");
        while ($r = $res->fetch_assoc()) {
            array_push($arr, $r);
        }
        $result["!@#$%^&*0!@#$%^&*"] = $arr;
        $arr = array();

        // get every categorys top 4
        foreach ($cat as $name => $id) {

            $res = $this->db->query("SELECT * from videoinfo where fid = $id order by viewcounts desc limit 0, 4");
            while ($r = $res->fetch_assoc()) {
                array_push($arr, $r);
            }
            $result["!@#$%^&*$name!@#$%^&*"] = $arr;
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

        $res = $this->db->query("SELECT * from videoinfo where fid = $id");
        while ($r = $res->fetch_assoc()) {
            array_push($arr, $r);
        }

        return $arr;

    }

    /**
     * get search results.
     *
     * @param string $key key.
     * @return array
     */
    public function search($key)
    {   
        $arr = array();

        $res = $this->db->query(" SELECT * FROM videoinfo WHERE description like '%$key%' ");

        while ($r = $res->fetch_assoc()) {
            array_push($arr, $r);
        }

        return $arr;

    }

    public function getDanmu($id)
    {
        $sql = "SELECT * from danmu where parentid = $id";
        $res = $this->conn->query($sql);
       
        return $res;

    }

    public function getCatRecommend($id)
    {
        $sql = "SELECT * from videoinfo where fid = $id order by viewcounts desc limit 0, 8";
        $res = $this->conn->query($sql);

        $count = count($res);

        if ($count < 8) {
            $sql = "SELECT * from videoinfo order by viewcounts desc limit 0, 8";
            $res = $this->conn->query($sql);
        }

        return $res;

    }
    
    public function viewcounts($id)
    {
        $sql = "SELECT viewcounts from videoinfo where id = $id";
        $count = $this->conn->query($sql, "array");

        $count = intval($count["viewcounts"]) + 1;

        $sql = "UPDATE videoinfo set viewcounts = $count where id = $id";
        $res = $this->conn->query($sql);

        if ($res) {
            return "[{'res':'1'}]";
        }
        return "[{'res':'0'}]";

    }

    public function register($user, $password)
    {
        $stmt = $this->db->stmt_init();
        $sql = "SELECT id, email, uname from `user` where email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->bind_result($id, $eamil, $name);
        $stmt->execute();

        $res = array();
        while($stmt->fetch()){
            $res = array('id' => $id, 'email' => $eamil, 'user' => $name);
        }
        $stmt->free_result();
        

        // user exists
        if (count($res) > 0) {
            return "[{'res':'0'}]";
        }

        // insert
        $sql = "INSERT into user (`email`, `password`) values (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();

        // select
        $sql = "SELECT id, email, uname from `user` where email = ? and password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $user, $password);
        $stmt->bind_result($id, $e, $n);
        $stmt->execute();

        $res = array();
        while($stmt->fetch()){
            $res = array('id' => $id, 'email' => $e, 'user' => $n);
        }
        $stmt->free_result();
        $stmt->close();

        return $res;

    }

    public function check($user, $password)
    {

        $stmt = $this->db->stmt_init();
        $sql = "SELECT id, email from `user` where email = ? and password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $user, $password);
        $stmt->bind_result($id, $name);
        $stmt->execute();

        $res = array();
        while($stmt->fetch()){
            $res = array('id' => $id, 'user' => $name);
        }
        $stmt->free_result();
        $stmt->close();

        if (count($res) == 0) {
            return array();
        }
        
        $id = $res['id'];

        $sql = "SELECT * from user where id = $id limit 0, 1";
        $userinfo = $this->conn->query($sql, "array");

        return $userinfo;
        
    }

    public function getCollection($userId)
    {
        $sql = "SELECT bmid from mark where mid = $userId order by mtime desc";
        $res = $this->conn->query($sql);

        $video = array();
        foreach ($res as $key => $value) {
            $vid = $value['bmid'];
            $sql = "SELECT * from videoinfo where id = $vid";
            $res = $this->conn->query($sql, "array");
            
            array_push($video, $res);
        }

        return $video; 
        
    }

    public function setCollection($userId, $videoId)
    {
        // exist
        $sql = "SELECT id from mark where mid = $userId and bmid = $videoId";
        $exist = $this->conn->query($sql, "array");
        if (count($exist) > 0) {
            return array("exist" => "1"); 
        }

        // user
        $sql = "UPDATE user set experience = experience + 20 where id = $userId";
        $userExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $userId";
        $experience1 = $this->conn->query($sql, "array");
        if ($experience1["experience"] >= 0 && $experience1["experience"] < 66) {
            $level = 0;
        } else if ($experience1["experience"] >= 66 && $experience1["experience"] < 666) {
            $level = 1;
        } else if ($experience1["experience"] >= 666 && $experience1["experience"] < 2666) {
            $level = 2;
        } else if ($experience1["experience"] >= 2666 && $experience1["experience"] < 6666) {
            $level = 3;
        } else if ($experience1["experience"] >= 6666 && $experience1["experience"] < 26666) {
            $level = 4;
        } else if ($experience1["experience"] >= 26666 && $experience1["experience"] < 66666) {
            $level = 5;
        } else if ($experience1["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $userId";
        $userLevel = $this->conn->query($sql);

        $sql = "UPDATE user set mark = mark + 1 where id = $userId";
        $userMark = $this->conn->query($sql);

        // video
        $sql = "UPDATE videoinfo set sword = sword + 50 where id = $videoId";
        $videoSword = $this->conn->query($sql);

        $sql = "SELECT sword from videoinfo where id = $videoId";
        $sword1 = $this->conn->query($sql, "array");
        if ($sword1["sword"] >= 0 && $sword1["sword"] < 50) {
            $level = 0;
        } else if ($sword1["sword"] >= 50 && $sword1["sword"] < 200) {
            $level = 1;
        } else if ($sword1["sword"] >= 200 && $sword1["sword"] < 800) {
            $level = 2;
        } else if ($sword1["sword"] >= 800 && $sword1["sword"] < 2000) {
            $level = 3;
        } else if ($sword1["sword"] >= 2000 && $sword1["sword"] < 5000) {
            $level = 4;
        } else if ($sword1["sword"] >= 5000 && $sword1["sword"] < 10000) {
            $level = 5;
        } else if ($sword1["sword"] >= 10000) {
            $level = 6;
        }
        $sql = "UPDATE videoinfo set videolevel = $level where id = $videoId";
        $videoLevel = $this->conn->query($sql);

        $sql = "UPDATE videoinfo set mark = mark + 1 where id = $videoId";
        $videoMark = $this->conn->query($sql);

        // up
        $sql = "SELECT uid from videoinfo where id = $videoId";
        $uid = $this->conn->query($sql, "array");
        $uid = $uid["uid"];

        $sql = "UPDATE user set experience = experience + 50 where id = $uid";
        $upExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $uid";
        $experience2 = $this->conn->query($sql, "array");
        if ($experience2["experience"] >= 0 && $experience2["experience"] < 66) {
            $level = 0;
        } else if ($experience2["experience"] >= 66 && $experience2["experience"] < 666) {
            $level = 1;
        } else if ($experience2["experience"] >= 666 && $experience2["experience"] < 2666) {
            $level = 2;
        } else if ($experience2["experience"] >= 2666 && $experience2["experience"] < 6666) {
            $level = 3;
        } else if ($experience2["experience"] >= 6666 && $experience2["experience"] < 26666) {
            $level = 4;
        } else if ($experience2["experience"] >= 26666 && $experience2["experience"] < 66666) {
            $level = 5;
        } else if ($experience2["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $uid";
        $upLevel = $this->conn->query($sql);

        $sql = "UPDATE user set marked = marked + 1 where id = $uid";
        $upMarked = $this->conn->query($sql);

        // mark 
        $time = date("Y-m-d h:i:s");
        $sql = "INSERT into mark (`mid`, `bmid`, `mtime`) values ($userId, $videoId, '$time')";
        
        $mark = $this->conn->query($sql);

        $this->db->autocommit(false);
        $user = !$userExp || !$userLevel || !$userMark;
        $video = !$videoSword || !$videoLevel || !$videoMark;
        $up = !$upExp || !$upLevel || !$upMarked;
        if ($user || $video || $up || !$mark) {
            $this->db->rollback();
            return array("failed" => "1");
        } else {
            $this->db->commit();
            return array("successed" => "1");
        }
        $this->db->autocommit(true);

        return array("failed" => "1");

    }

    public function cancelCollection($userId, $videoId)
    {
        // exist
        $sql = "SELECT id from mark where mid = $userId and bmid = $videoId";
        $exist = $this->conn->query($sql, "array");
        if (count($exist) == 0) {
            return array("already cancel" => "1");
        }

        // user
        $sql = "UPDATE user set experience = experience - 20 where id = $userId";
        $userExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $userId";
        $experience1 = $this->conn->query($sql, "array");
        if ($experience1["experience"] >= 0 && $experience1["experience"] < 66) {
            $level = 0;
        } else if ($experience1["experience"] >= 66 && $experience1["experience"] < 666) {
            $level = 1;
        } else if ($experience1["experience"] >= 666 && $experience1["experience"] < 2666) {
            $level = 2;
        } else if ($experience1["experience"] >= 2666 && $experience1["experience"] < 6666) {
            $level = 3;
        } else if ($experience1["experience"] >= 6666 && $experience1["experience"] < 26666) {
            $level = 4;
        } else if ($experience1["experience"] >= 26666 && $experience1["experience"] < 66666) {
            $level = 5;
        } else if ($experience1["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $userId";
        $userLevel = $this->conn->query($sql);

        $sql = "UPDATE user set mark = mark - 1 where id = $userId";
        $userMark = $this->conn->query($sql);

        // video
        $sql = "UPDATE videoinfo set sword = sword - 50 where id = $videoId";
        $videoSword = $this->conn->query($sql);

        $sql = "SELECT sword from videoinfo where id = $videoId";
        $sword1 = $this->conn->query($sql, "array");
        if ($sword1["sword"] >= 0 && $sword1["sword"] < 50) {
            $level = 0;
        } else if ($sword1["sword"] >= 50 && $sword1["sword"] < 200) {
            $level = 1;
        } else if ($sword1["sword"] >= 200 && $sword1["sword"] < 800) {
            $level = 2;
        } else if ($sword1["sword"] >= 800 && $sword1["sword"] < 2000) {
            $level = 3;
        } else if ($sword1["sword"] >= 2000 && $sword1["sword"] < 5000) {
            $level = 4;
        } else if ($sword1["sword"] >= 5000 && $sword1["sword"] < 10000) {
            $level = 5;
        } else if ($sword1["sword"] >= 10000) {
            $level = 6;
        }
        $sql = "UPDATE videoinfo set videolevel = $level where id = $videoId";
        $videoLevel = $this->conn->query($sql);

        $sql = "UPDATE videoinfo set mark = mark - 1 where id = $videoId";
        $videoMark = $this->conn->query($sql);

        // up
        $sql = "SELECT uid from videoinfo where id = $videoId";
        $uid = $this->conn->query($sql, "array");
        $uid = $uid["uid"];

        $sql = "UPDATE user set experience = experience - 50 where id = $uid";
        $upExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $uid";
        $experience2 = $this->conn->query($sql, "array");
        if ($experience2["experience"] >= 0 && $experience2["experience"] < 66) {
            $level = 0;
        } else if ($experience2["experience"] >= 66 && $experience2["experience"] < 666) {
            $level = 1;
        } else if ($experience2["experience"] >= 666 && $experience2["experience"] < 2666) {
            $level = 2;
        } else if ($experience2["experience"] >= 2666 && $experience2["experience"] < 6666) {
            $level = 3;
        } else if ($experience2["experience"] >= 6666 && $experience2["experience"] < 26666) {
            $level = 4;
        } else if ($experience2["experience"] >= 26666 && $experience2["experience"] < 66666) {
            $level = 5;
        } else if ($experience2["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $uid";
        $upLevel = $this->conn->query($sql);

        $sql = "UPDATE user set marked = marked - 1 where id = $uid";
        $upMarked = $this->conn->query($sql);

        // mark 
        $sql = "DELETE from mark where mid = $userId and bmid = $videoId";
        $mark = $this->conn->query($sql);

        $this->db->autocommit(false);
        $user = !$userExp || !$userLevel || !$userMark;
        $video = !$videoSword || !$videoLevel || !$videoMark;
        $up = !$upExp || !$upLevel || !$upMarked;
        if ($user || $video || $up || !$mark) {
            $this->db->rollback();
            return array("failed" => "1");
        } else {
            $this->db->commit();
            return array("successed" => "1");
        }
        $this->db->autocommit(true);

        return array("failed" => "1");

    }

    public function getVideoInfo($vid)
    {
        $sql = "SELECT * from videoinfo where id = $vid";
        $video = $this->conn->query($sql, "array");

        $uid = $video["uid"];
        $sql = "SELECT * from user where id = $uid";
        $user = $this->conn->query($sql, "array");

        $res["video"] = $video;
        $res["user"] = $user;
        
        return $res;

    }

    public function alterNick($id, $nick)
    {
        $stmt = $this->db->stmt_init();
        $sql = "UPDATE user set uname = ? where id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nick);

        $res = $stmt->execute();
        $stmt->close();

        if (!$res) {
            return array("failed" => "1");
        }
        return array("successed" => "1");

    }

    public function alterSex($id, $sex)
    {
        $sql = "UPDATE user set sex = $sex where id = $id";
        $res = $this->conn->query($sql);

        if (!$res) {
            return array("failed" => "1");
        }
        return array("successed" => "1");

    }

    public function alterBirth($id, $birth)
    {
        $stmt = $this->db->stmt_init();
        $sql = "UPDATE user set birth = ? where id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $birth);

        $res = $stmt->execute();
        $stmt->close();

        if (!$res) {
            return array("failed" => "1");
        }
        return array("successed" => "1");

    }

    public function alterSignature($id, $signature)
    {
        $stmt = $this->db->stmt_init();
        $sql = "UPDATE user set info = ? where id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $signature);

        $res = $stmt->execute();
        $stmt->close();

        if (!$res) {
            return array("failed" => "1");
        }
        return array("successed" => "1");

    }

    public function alterPassword($id, $password)
    {
        $stmt = $this->db->stmt_init();
        $sql = "UPDATE user set password = ? where id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $password);

        $res = $stmt->execute();
        $stmt->close();

        if (!$res) {
            return array("failed" => "1");
        }
        return array("successed" => "1");

    }

    public function sendDanmu($userId, $videoId, $danmu)
    {   
        $time = date("Y-m-d h:i:s");
        $sql = "INSERT into `danmu` (`parentid`, `danmu`, `pid`, `posttime`) values ($videoId, '$danmu', $userId, '$time')";
        $insert = $this->conn->query($sql);

        // user
        $sql = "UPDATE user set experience = experience + 3 where id = $userId";
        $userExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $userId";
        $experience1 = $this->conn->query($sql, "array");
        if ($experience1["experience"] >= 0 && $experience1["experience"] < 66) {
            $level = 0;
        } else if ($experience1["experience"] >= 66 && $experience1["experience"] < 666) {
            $level = 1;
        } else if ($experience1["experience"] >= 666 && $experience1["experience"] < 2666) {
            $level = 2;
        } else if ($experience1["experience"] >= 2666 && $experience1["experience"] < 6666) {
            $level = 3;
        } else if ($experience1["experience"] >= 6666 && $experience1["experience"] < 26666) {
            $level = 4;
        } else if ($experience1["experience"] >= 26666 && $experience1["experience"] < 66666) {
            $level = 5;
        } else if ($experience1["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $userId";
        $userLevel = $this->conn->query($sql);

        $sql = "UPDATE user set alldanmu = alldanmu + 1 where id = $userId";
        $userDanmu = $this->conn->query($sql);

        // video
        $sql = "UPDATE videoinfo set sword = sword + 3 where id = $videoId";
        $videoSword = $this->conn->query($sql);

        $sql = "UPDATE videoinfo set videodanmu = videodanmu + 1 where id = $videoId";
        $videoDanmu = $this->conn->query($sql);

        $sql = "SELECT sword from videoinfo where id = $videoId";
        $sword1 = $this->conn->query($sql, "array");
        if ($sword1["sword"] >= 0 && $sword1["sword"] < 50) {
            $level = 0;
        } else if ($sword1["sword"] >= 50 && $sword1["sword"] < 200) {
            $level = 1;
        } else if ($sword1["sword"] >= 200 && $sword1["sword"] < 800) {
            $level = 2;
        } else if ($sword1["sword"] >= 800 && $sword1["sword"] < 2000) {
            $level = 3;
        } else if ($sword1["sword"] >= 2000 && $sword1["sword"] < 5000) {
            $level = 4;
        } else if ($sword1["sword"] >= 5000 && $sword1["sword"] < 10000) {
            $level = 5;
        } else if ($sword1["sword"] >= 10000) {
            $level = 6;
        }
        $sql = "UPDATE videoinfo set videolevel = $level where id = $videoId";
        $videoLevel = $this->conn->query($sql);

        // up
        $sql = "SELECT uid from videoinfo where id = $videoId";
        $uid = $this->conn->query($sql, "array");
        $uid = $uid["uid"];

        $sql = "UPDATE user set experience = experience + 3 where id = $uid";
        $upExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $uid";
        $experience2 = $this->conn->query($sql, "array");
        if ($experience2["experience"] >= 0 && $experience2["experience"] < 66) {
            $level = 0;
        } else if ($experience2["experience"] >= 66 && $experience2["experience"] < 666) {
            $level = 1;
        } else if ($experience2["experience"] >= 666 && $experience2["experience"] < 2666) {
            $level = 2;
        } else if ($experience2["experience"] >= 2666 && $experience2["experience"] < 6666) {
            $level = 3;
        } else if ($experience2["experience"] >= 6666 && $experience2["experience"] < 26666) {
            $level = 4;
        } else if ($experience2["experience"] >= 26666 && $experience2["experience"] < 66666) {
            $level = 5;
        } else if ($experience2["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $uid";
        $upLevel = $this->conn->query($sql);

        $sql = "UPDATE user set allbedanmu = allbedanmu + 1 where id = $uid";
        $upDanmu = $this->conn->query($sql);

        $this->db->autocommit(false);
        $user = !$userExp || !$userLevel || !$userDanmu;
        $video = !$videoSword || !$videoLevel || !$videoDanmu;
        $up = !$upExp || !$upLevel || !$upDanmu;
        if ($user || $video || $up || !$insert) {
            $this->db->rollback();
            return array("failed" => "1");
        } else {
            $this->db->commit();
            return array("successed" => "1");
        }
        $this->db->autocommit(true);

        return array("failed" => "1");

    }

    public function getFollow($id)
    {
        $sql = "SELECT bcid from concern where cid = $id order by ctime desc";
        $res = $this->conn->query($sql);

        $user = array();
        foreach ($res as $key => $value) {
            $uid = $value['bcid'];
            $sql = "SELECT * from user where id = $uid";
            $res = $this->conn->query($sql, "array");
            
            array_push($user, $res);
        }

        return $user; 

    }

    public function setFollow($userId, $followId)
    {   
        // exist
        $sql = "SELECT id from concern where cid = $userId and bcid = $followId";
        $exist = $this->conn->query($sql, "array");
        if (count($exist) > 0) {
            return array("exist" => "1"); 
        }

        // insert concern
        $time = date("Y-m-d h:i:s");
        $sql = "INSERT into `concern` (`cid`, `bcid`, `ctime`) values ($userId, $followId, '$time')";
        $insert = $this->conn->query($sql);

        // user
        $sql = "UPDATE user set experience = experience + 20 where id = $userId";
        $userExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $userId";
        $experience1 = $this->conn->query($sql, "array");
        if ($experience1["experience"] >= 0 && $experience1["experience"] < 66) {
            $level = 0;
        } else if ($experience1["experience"] >= 66 && $experience1["experience"] < 666) {
            $level = 1;
        } else if ($experience1["experience"] >= 666 && $experience1["experience"] < 2666) {
            $level = 2;
        } else if ($experience1["experience"] >= 2666 && $experience1["experience"] < 6666) {
            $level = 3;
        } else if ($experience1["experience"] >= 6666 && $experience1["experience"] < 26666) {
            $level = 4;
        } else if ($experience1["experience"] >= 26666 && $experience1["experience"] < 66666) {
            $level = 5;
        } else if ($experience1["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $userId";
        $userLevel = $this->conn->query($sql);

        $sql = "UPDATE user set follow = follow + 1 where id = $userId";
        $userFollow = $this->conn->query($sql);

        // up
        $uid = $followId;

        $sql = "UPDATE user set experience = experience + 50 where id = $uid";
        $upExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $uid";
        $experience2 = $this->conn->query($sql, "array");
        if ($experience2["experience"] >= 0 && $experience2["experience"] < 66) {
            $level = 0;
        } else if ($experience2["experience"] >= 66 && $experience2["experience"] < 666) {
            $level = 1;
        } else if ($experience2["experience"] >= 666 && $experience2["experience"] < 2666) {
            $level = 2;
        } else if ($experience2["experience"] >= 2666 && $experience2["experience"] < 6666) {
            $level = 3;
        } else if ($experience2["experience"] >= 6666 && $experience2["experience"] < 26666) {
            $level = 4;
        } else if ($experience2["experience"] >= 26666 && $experience2["experience"] < 66666) {
            $level = 5;
        } else if ($experience2["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $uid";
        $upLevel = $this->conn->query($sql);

        $sql = "UPDATE user set fans = fans + 1 where id = $uid";
        $upFuns = $this->conn->query($sql);

        // transaction
        $this->db->autocommit(false);
        $user = !$userExp || !$userLevel || !$userFollow;
        $up = !$upExp || !$upLevel || !$upFuns;
        if ($user || $up || !$insert) {
            $this->db->rollback();
            return array("failed" => "1");
        } else {
            $this->db->commit();
            return array("successed" => "1");
        }
        $this->db->autocommit(true);

        return array("failed" => "1");

    }

    public function cancelFollow($userId, $followId)
    {   
        // exist
        $sql = "SELECT id from concern where cid = $userId and bcid = $followId";
        $exist = $this->conn->query($sql, "array");
        if (count($exist) == 0) {
            return array("already cancel" => "1"); 
        }

        // delete concern
        $sql = "DELETE from concern where cid = $userId and bcid = $followId";
        $delete = $this->conn->query($sql);

        // user
        $sql = "UPDATE user set experience = experience - 20 where id = $userId";
        $userExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $userId";
        $experience1 = $this->conn->query($sql, "array");
        if ($experience1["experience"] >= 0 && $experience1["experience"] < 66) {
            $level = 0;
        } else if ($experience1["experience"] >= 66 && $experience1["experience"] < 666) {
            $level = 1;
        } else if ($experience1["experience"] >= 666 && $experience1["experience"] < 2666) {
            $level = 2;
        } else if ($experience1["experience"] >= 2666 && $experience1["experience"] < 6666) {
            $level = 3;
        } else if ($experience1["experience"] >= 6666 && $experience1["experience"] < 26666) {
            $level = 4;
        } else if ($experience1["experience"] >= 26666 && $experience1["experience"] < 66666) {
            $level = 5;
        } else if ($experience1["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $userId";
        $userLevel = $this->conn->query($sql);

        $sql = "UPDATE user set follow = follow - 1 where id = $userId";
        $userFollow = $this->conn->query($sql);

        // up
        $uid = $followId;

        $sql = "UPDATE user set experience = experience - 50 where id = $uid";
        $upExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $uid";
        $experience2 = $this->conn->query($sql, "array");
        if ($experience2["experience"] >= 0 && $experience2["experience"] < 66) {
            $level = 0;
        } else if ($experience2["experience"] >= 66 && $experience2["experience"] < 666) {
            $level = 1;
        } else if ($experience2["experience"] >= 666 && $experience2["experience"] < 2666) {
            $level = 2;
        } else if ($experience2["experience"] >= 2666 && $experience2["experience"] < 6666) {
            $level = 3;
        } else if ($experience2["experience"] >= 6666 && $experience2["experience"] < 26666) {
            $level = 4;
        } else if ($experience2["experience"] >= 26666 && $experience2["experience"] < 66666) {
            $level = 5;
        } else if ($experience2["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $uid";
        $upLevel = $this->conn->query($sql);

        $sql = "UPDATE user set fans = fans - 1 where id = $uid";
        $upFuns = $this->conn->query($sql);

        // transaction
        $this->db->autocommit(false);
        $user = !$userExp || !$userLevel || !$userFollow;
        $up = !$upExp || !$upLevel || !$upFuns;
        if ($user || $up || !$delete) {
            $this->db->rollback();
            return array("failed" => "1");
        } else {
            $this->db->commit();
            return array("successed" => "1");
        }
        $this->db->autocommit(true);

        return array("failed" => "1");

    }

    public function catFood($userId, $videoId, $cat)
    {   
        // exist
        $sql = "SELECT catfood from user where id = $userId";
        $food = $this->conn->query($sql, "array");
        if ($food['catfood'] < $cat) {
            return array("you don't have enough cat food" => "1"); 
        }

        $expUser = 5 * $cat;
        $swordVideo = 5 * $cat;
        $expUp = 5 * $cat;
        $foodUp = intval(0.7 * $cat);   

        // user
        $sql = "UPDATE user set experience = experience + $expUser where id = $userId";
        $userExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $userId";
        $experience1 = $this->conn->query($sql, "array");
        if ($experience1["experience"] >= 0 && $experience1["experience"] < 66) {
            $level = 0;
        } else if ($experience1["experience"] >= 66 && $experience1["experience"] < 666) {
            $level = 1;
        } else if ($experience1["experience"] >= 666 && $experience1["experience"] < 2666) {
            $level = 2;
        } else if ($experience1["experience"] >= 2666 && $experience1["experience"] < 6666) {
            $level = 3;
        } else if ($experience1["experience"] >= 6666 && $experience1["experience"] < 26666) {
            $level = 4;
        } else if ($experience1["experience"] >= 26666 && $experience1["experience"] < 66666) {
            $level = 5;
        } else if ($experience1["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $userId";
        $userLevel = $this->conn->query($sql);

        $sql = "UPDATE user set catfood = catfood - $cat where id = $userId";
        $userFood = $this->conn->query($sql);

        // video
        $sql = "UPDATE videoinfo set sword = sword + $swordVideo where id = $videoId";
        $videoSword = $this->conn->query($sql);

        $sql = "UPDATE videoinfo set catfood = catfood + $cat where id = $videoId";
        $videoFood = $this->conn->query($sql);

        $sql = "SELECT sword from videoinfo where id = $videoId";
        $sword1 = $this->conn->query($sql, "array");
        if ($sword1["sword"] >= 0 && $sword1["sword"] < 50) {
            $level = 0;
        } else if ($sword1["sword"] >= 50 && $sword1["sword"] < 200) {
            $level = 1;
        } else if ($sword1["sword"] >= 200 && $sword1["sword"] < 800) {
            $level = 2;
        } else if ($sword1["sword"] >= 800 && $sword1["sword"] < 2000) {
            $level = 3;
        } else if ($sword1["sword"] >= 2000 && $sword1["sword"] < 5000) {
            $level = 4;
        } else if ($sword1["sword"] >= 5000 && $sword1["sword"] < 10000) {
            $level = 5;
        } else if ($sword1["sword"] >= 10000) {
            $level = 6;
        }
        $sql = "UPDATE videoinfo set videolevel = $level where id = $videoId";
        $videoLevel = $this->conn->query($sql);

        // up
        $sql = "SELECT uid from videoinfo where id = $videoId";
        $uid = $this->conn->query($sql, "array");
        $uid = $uid["uid"];

        $sql = "UPDATE user set experience = experience + $expUp where id = $uid";
        $upExp = $this->conn->query($sql);

        $sql = "SELECT experience from user where id = $uid";
        $experience2 = $this->conn->query($sql, "array");
        if ($experience2["experience"] >= 0 && $experience2["experience"] < 66) {
            $level = 0;
        } else if ($experience2["experience"] >= 66 && $experience2["experience"] < 666) {
            $level = 1;
        } else if ($experience2["experience"] >= 666 && $experience2["experience"] < 2666) {
            $level = 2;
        } else if ($experience2["experience"] >= 2666 && $experience2["experience"] < 6666) {
            $level = 3;
        } else if ($experience2["experience"] >= 6666 && $experience2["experience"] < 26666) {
            $level = 4;
        } else if ($experience2["experience"] >= 26666 && $experience2["experience"] < 66666) {
            $level = 5;
        } else if ($experience2["experience"] >= 66666) {
            $level = 6;
        }
        $sql = "UPDATE user set ulevel = $level where id = $uid";
        $upLevel = $this->conn->query($sql);

        $sql = "UPDATE user set catfood = catfood + $foodUp where id = $uid";
        $upFood = $this->conn->query($sql);

        // transaction
        $this->db->autocommit(false);
        $user = !$userExp || !$userLevel || !$userFood;
        $video = !$videoSword || !$videoLevel || !$videoFood;
        $up = !$upExp || !$upLevel || !$upFood;
        if ($user || $up || $video) {
            $this->db->rollback();
            return array("failed" => "1");
        } else {
            $this->db->commit();
            return array("successed" => "1");
        }
        $this->db->autocommit(true);

        return array("failed" => "1");

    }

    public function getVideoById($userId)
    {
        $sql = "SELECT * from videoinfo where uid = $userId order by uptime desc";
        $res = $this->conn->query($sql, "arrayAll");

        return $res;

    }

    public function alterPic($userId, $tmp_name)
    {
        $path = "/var/www/uploads/headpic/";
        $name = date("Ymdhis") . ".jpg";

        $url = $path . $name;

        $sql = "SELECT headpic from user where id = $userId";
        $oldPic = $this->conn->query($sql, "array");
        $oldPic = "/var/www/" . $oldPic["headpic"];

        // upload
        @move_uploaded_file($tmp_name, $url);
        Db::pictureCompressionOutput($url, $url, 100, 100);
        header("Content-type: text/html");

        $pic = substr($url, strpos($url, "/uploads/headpic"));

        $sql1 = "UPDATE user set `headpic` = '$pic' where id = $userId";
        $res = $this->conn->query($sql1);

        if ($res) {
            @unlink($oldPic);

            return array("successed" => "1");
        }

        return array("failed" => "1");
        
    }

    static function pictureCompressionOutput($file, $new_file, $new_width = 0, $new_height = 0) {
        header("Content-type: image/jpg");
        list($width, $height) = @getimagesize($file);
        
        $thumb = @imagecreatetruecolor($new_width, $new_height);
        $source = @imagecreatefromjpeg($file);
        @imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        @imagejpeg($thumb, $new_file);

        return $new_file;

    }


}