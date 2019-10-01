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
        1 => [
            1 => 'Размер (в МБ)',
            2 => 'Тип',
            3 => 'Производитель',
        ],
        2 => [
            1 => 'Вес (в кг)',
//            3 => 'Количество1',
//            4 => 'Количество2',
        ],
        3 => [
            1 => 'Длина',
            2 => 'Ширина',
            3 => 'Высота',
//            5 => 'Длина1',
//            6 => 'Ширина1',
//            7 => 'Высота1',
        ],
//        4 => [
//            1 => 'Диагональ',
//            2 => 'Цвет',
//        ],
        'type'=> [
            3 => [
                [1, 2, 3, 'name' => 'Размеры (HxWxL)', 'separator' => 'x'],
//                [6, 7, 'name' => 'XXX', 'separator' => ' ']
            ],
//            2 => [
//                [3, 4, 'name' => 'Количество...', 'separator' => 'xxx'],
//            ],
        ],
    ];
}