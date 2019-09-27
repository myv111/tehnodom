<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 26.09.2019
 * Time: 19:04
 */

namespace app\controllers;

use app\controllers\engine\Controller;
use app\models\Products;

class AddproductsController extends Controller
{
    public function Index()
    {
        $products = new Products();
        $products = $products->get();

        $this->view('addproducts/index', $products);
    }
}