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
        'scu' => ['string', 'required', 'unique', 255],
        'name' => ['string', 'required', 255],
        'price' => ['integer', 'required'],
        'type' => ['string', 'required', 255],
        'type_product' => ['integer', 'required'],
    ];

    public $type_products = [
        1 => 'DVD диск',
        2 => 'Книга',
        3 => 'Мебель',
    ];

    public $types = [
        1 => 'Размер (в МБ)',
        2 => 'Вес (в кг)',
        3 => 'Размеры (HxWxL)',
    ];

    public function get()
    {
        $this->connect();
        $query = "SELECT * FROM products";

        $result = $this->connect->query($query);

        return $result;
    }

    public function save($data)
    {
        $data['type_product'] = $data['type'];
        if($data['type'] != 0)
            $data['type'] = $data['type' . $data['type']];
        if($this->validate($data)) {
            $this->connect();
            $scu = $data['scu'];
            $name = $data['name'];
            $price = $data['price'];
            $type = $data['type'];
            $type_product = $data['type_product'];
            $query = "INSERT INTO products (scu, name, price, type, type_product) VALUES ('$scu', '$name', $price, '$type', $type_product)";

            if ($this->connect->exec($query))
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

        $this->connect->exec($query);
    }
}