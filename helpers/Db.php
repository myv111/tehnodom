<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 26.09.2019
 * Time: 23:54
 */

namespace app\helpers;


class Db
{
    private static $instance;
    private $connection;
    private $host = '';
    private $user = '';
    private $password = '';
    private $database = '';

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host,$this->user,$this->password, $this->database);

        return $this->connection;
    }

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new Db();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}