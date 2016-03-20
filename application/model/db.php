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
            return "[{\"res\":\"1\"}]";
        }
        return "[{\"res\":\"0\"}]";

    }

    public function register($user, $password)
    {
        $stmt = $this->db->stmt_init();
        $sql = "SELECT id, user from `user` where user = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->bind_result($id, $name);
        $stmt->execute();

        $res = array();
        while($stmt->fetch()){
            $res = array('id' => $id, 'user' => $name);
        }
        $stmt->free_result();
        

        // user exists
        if (count($res) > 0) {
            return "[{\"res\":\"0\"}]";
        }

        // insert
        $sql = "INSERT into user (`user`, `password`) values (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();

        // select
        $sql = "SELECT id, user from `user` where user = ? and password = ?";
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

        return $res;

    }

    public function check($user, $password)
    {

        $stmt = $this->db->stmt_init();
        $sql = "SELECT id, user from `user` where user = ? and password = ?";
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

    public function collection()
    {
        
    }



}