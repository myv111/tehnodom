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
        'type_product' => ['integer', 'required'],
    ];

    public static $type_products = [
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
//        $query = "SELECT p.id as id, p.scu as scu, p.name as name, p.price as price,
//                   p.type_product as type_product, po.id as pid, po.product_id as product_id,
//                   po.type as type, po.value as value FROM products as p
//                   LEFT JOIN products_options as po ON (p.id = po.product_id)";

        $query = "SELECT p.id as id, p.scu as scu, p.name as name, p.price as price, 
                   p.type_product as type_product, po.id as pid, po.product_id as product_id, 
                   po.type as type, po.value as value FROM products as p, products_options as po 
                   WHERE p.id = po.product_id";

        $result = $this->connect->query($query);

        $array = [];
        foreach ($result as $v){
            $array[$v['id']]['parent'] = ['scu' => $v['scu'], 'name' => $v['name'],
                'price' => $v['price'], 'type_product' => $v['type_product']];
            $array[$v['id']]['child'][] = ['type' => $v['type'], 'value' => $v['value']];
        }

        return $array;
    }

    public function save($data)
    {
//        $data['type_product'] = $data['type'];
//        if($data['type'] != 0)
//            $data['type'] = $data['type' . $data['type']];
        if($this->validate($data)) {
            $this->connect();
            $scu = $data['scu'];
            $name = $data['name'];
            $price = $data['price'];
//            $type = $data['type'];
            $type_product = $data['type_product'];
            $query = "INSERT INTO products (scu, name, price, type_product) VALUES ('$scu', '$name', $price, $type_product)";

            if ($this->connect->exec($query)) {
                $product_id = $this->connect->lastInsertId();
                $products_options_type = ProductsOptions::$products_options_type;
                $ProductsOptions = new ProductsOptions;
                foreach ($products_options_type[$type_product] as $k => $v) {
                    $value = $data['products_options_type'][$type_product][$k];
                    $data_ProductsOptions['product_id'] = $product_id;
                    $data_ProductsOptions['type'] = $k;
                    $data_ProductsOptions['value'] = $value;
                    if($ProductsOptions->validate($data_ProductsOptions)) {
                        $query = "INSERT INTO products_options (product_id, type, value) VALUES ($product_id, $k, '$value')";
                        $this->connect->exec($query);
                    }else{
                        $query = "DELETE FROM products WHERE id = $product_id";
                        $this->connect->exec($query);

                        return $ProductsOptions->error;
                    }
                }
            }
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