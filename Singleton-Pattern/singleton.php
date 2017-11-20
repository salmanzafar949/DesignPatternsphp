<?php
/**
 * Created by Salman zafar.
 * User: sam
 * Date: 11/20/17
 * Time: 1:48 PM
 */

// Signleton design pattern
// it allows user have to one and only instance of a class in the project/script
// it is considered to be the granddadday of all the design patterns
// Singleton is nothin more than a fancy name for global variable..

class DbConn{

    public static $instance;
    protected $server = "localhost";
    protected $uname  = "root";
    protected $pass   = "";
    protected $db     = "lrs";
    public    $conn   = "";

    private function __construct()
    {
        $this->connect($this->server, $this->uname,$this->pass,$this->db);
    }

    public static function get_instance()
    {
        if(!isset(DbConn::$instance))
        DbConn::$instance = new DbConn();
        return DbConn::$instance;
    }

    public function connect($server, $user,$pass, $db)
    {
        $this->conn = new mysqli($server,$user,$pass,$db);
        if($this->conn->connect_error)
        {
            die("Connection failed: ".$this->conn->connect_error);
        }
    }
}

$db = DbConn::get_instance();
//$db2 = DbConn::get_instance();
//$db3 = DbConn::get_instance();
//echo "<pre>";
//var_dump($db);
//var_dump($db2);
//var_dump($db3);