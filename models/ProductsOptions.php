<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 01.10.2019
 * Time: 15:09
 */

namespace app\models;


use app\controllers\engine\Model;

class ProductsOptions extends Model
{
    public $rules = [
        'product_id' => ['integer', 'required'],
        'type' => ['integer', 'required'],
        'value' => ['string', 'required_all', 255],
    ];

    public static $products_options_type = [
        1 => [1 => 'Размер (в МБ)'],
        2 => [1 => 'Вес (в кг)'],
        3 => [
            1 => 'Длина',
            2 => 'Ширина',
            3 => 'Высота',
        ],
    ];
}