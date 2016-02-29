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
        $res = $this->db->query("SELECT * from videoinfo order by viewcounts limit 0, 4");
        while ($r = $res->fetch_assoc()) {
            array_push($arr, $r);
        }
        $result["!@#$%^&*0!@#$%^&*"] = $arr;
        $arr = array();

        // get every categorys top 4
        foreach ($cat as $name => $id) {

            $res = $this->db->query("SELECT * from videoinfo where fid = $id order by viewcounts limit 0, 4");
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
        $keys = "%" . $key . "%";

        $stmt = $this->db->prepare(" SELECT * FROM videoinfo WHERE description like ? ");
        $stmt->bind_param("s", $keys);
        $stmt->execute();

        $res = $stmt->get_result();
        while ($r = $res->fetch_assoc()) {
            array_push($arr, $r);
        }
    
        return $arr;

    }
    
}