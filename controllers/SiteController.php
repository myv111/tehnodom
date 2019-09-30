<?php
namespace app\controllers;

use app\controllers\engine\Controller;
use app\models\Products;

class SiteController extends Controller
{
    public function Index()
    {
        $product = new Products();
        $products = $product->get();

        $this->view('index', $products, $product);
    }

    public function Addproducts()
    {
        if(isset($_POST['name'])){
            $product = new Products();
            $result = $product->save($_POST);

            $array = [];
            if($result == 1){
                $array['success'] = 1;
                echo json_encode($array);
            }else{
                $result['success'] = 0;
                echo json_encode($result);
            }
            die;
        }

        $this->view('add-products');
    }

    public function Deleteproduct()
    {
        $products = new Products();
        $products->delete($_GET['arr']);
    }
}
