<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 27.09.2019
 * Time: 0:18
 */

namespace app\models;

use app\controllers\engine\Model;

class Products extends Model
{
    public $rules = [
        'scu' => ['string', 'required', 'unique'],
        'name' => ['string', 'required'],
        'price' => ['integer', 'required'],
        'type' => ['string', 'required'],
    ];

    public function get()
    {
        $this->connect();
        $query = "SELECT * FROM products";

        $result = mysqli_query($this->connect, $query);

        return $result;
    }

    public function save($data)
    {
        if($data['type'] != 0)
            $data['type'] = $data['type' . $data['type']];
        if($this->validate($data)) {
            $this->connect();
            $scu = $data['scu'];
            $name = $data['name'];
            $price = $data['price'];
            $type = $data['type'];
            $query = "INSERT INTO products (scu, name, price, type) VALUES ('$scu', '$name', $price, '$type')";

            if (mysqli_query($this->connect, $query))
                return 1;
        }
        else
            return $this->error;
    }

    public function delete($array)
    {
        $this->connect();
        $array = implode(',' ,$array);
        $query = "DELETE FROM products WHERE id in ($array)";

        mysqli_query($this->connect, $query);
    }
}