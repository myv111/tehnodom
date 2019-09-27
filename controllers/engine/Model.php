<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 27.09.2019
 * Time: 4:45
 */

namespace app\controllers\engine;

use app\helpers\Db;

class Model
{
    public $connect;
    public $rules;
    public $error = [];

    public function connect()
    {
        $instance = Db::getInstance();
        $this->connect = $instance->getConnection();
    }

    public function validate($model)
    {
        foreach ($this->rules as $k => $val){
            foreach($val as $v){
                if($v == 'string'){
                    if(!is_string($model[$k]))
                        $this->error[$k] = $k." должно быть строкой!";
                }
                if($v == 'integer'){
                    if(iconv_strlen((int)$model[$k]) != iconv_strlen($model[$k]))
                        $this->error[$k] = $k." должно быть целым числом!";
                }
                if($v == 'required'){
                    if(empty($model[$k]))
                        $this->error[$k] = $k." нужно заполнить!";
                }
                if($v == 'unique'){
                    $this->connect();
                    $query = "SELECT * FROM products WHERE $k = '".$model[$k]."'";
                    $result = mysqli_query($this->connect, $query);
                    if(mysqli_num_rows($result))
                        $this->error[$k] = $k." должно быть уникальным!";
                }
            }
        }
        if(count($this->error))
            return false;
        else
            return true;
    }
}