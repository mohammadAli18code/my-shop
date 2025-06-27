<?php

namespace App;
use database\DataBase;
use models\Client;
use models\Cart;

class AppController{

    public $currentDomain;
    public $basePath;
    private $client_model;
    private $cart_model;

    // protected $adminInfo = [];

    function __construct()
    {
        $pdo = new DataBase();
        $this->currentDomain = CURRENT_DOMAIN;
        $this->basePath = BASE_PATH;
        $this->client_model = new Client($pdo);
        $this->cart_model = new Cart($pdo);

    }




    public function getCustomerInfo()
    {              
        if (isset($_SESSION['customer_id']))
        {
                $customer_id = $_SESSION['customer_id'];
                $_SESSION['customerInfo'] = $this->client_model->getClientById($customer_id);
             
        }else {
                if(isset($_SESSION['customerInfo']))
                {
                        unset($_SESSION['customerInfo']);
                }
                if(isset($_SESSION['cart']))
                {
                        unset($_SESSION['cart']);
                }
                if(isset($_SESSION['cart_count']))
                {
                        unset($_SESSION['cart_count']);
                }
             }
        //      foreach ($admin as $key => $value) {
        //              $this->adminInfo[$key] = $value;
        //          }
    }
    
    public function getCustomerCartInfo()
    {  
        if(isset($_SESSION['customerInfo']))
        {
            $_SESSION['cart'] = $this->cart_model->customerCart($_SESSION['customerInfo']['id']);
        
            $_SESSION['cart_count'] = $this->cart_model->cartCount();
            $total_all_price = 0;
            foreach($_SESSION['cart'] as $price)
            {
                $total_all_price += $price['total_price']; 
            }
            $_SESSION['cart_all_price'] = $total_all_price;
        //     dd($_SESSION['cart_all_price']);
        }
    }

    protected function redirect($url)
    {
            header('Location: ' . trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
            exit;
    }

    protected function redirectBack()
    {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
    }

    protected function saveImage($image, $imagePath, $imageName = null)
    {

            if ($imageName) {
                    $extension = explode('/', $image['type'])[1];
                    $imageName = $imageName . '.' . $extension;
            } else {
                    $extension = explode('/', $image['type'])[1];
                    $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
            }

            $imageTemp = $image['tmp_name'];
            $imagePath = 'public/' . $imagePath . '/';

            if (is_uploaded_file($imageTemp)) {
                    if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                            return $imagePath . $imageName;
                    } else {
                            return false;
                    }
            } else {
                    return false;
            }

    }

    protected function removeImage($path)
    {
            $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
            if (file_exists($path)) {
                    unlink($path);
            }
    }




}


?>