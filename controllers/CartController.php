<?php

namespace App;

use App\AppController;
use database\DataBase;
use models\Cart;
use models\Category;


class CartController extends AppController{

    private $cart_model;
    private $category_model;


    public function __construct(){
        $pdo = new DataBase();
        $this->cart_model = new Cart($pdo);
        $this->category_model = new Category($pdo);
    }

    

    // show cart page
    public function cart()
    {
        $categories = $this->category_model->getCategories();
        if(isset($_SESSION['customerInfo']['id']))
        {
            $cart = $this->cart_model->customerCart($_SESSION['customerInfo']['id']);
            if($cart == null)
            {
                require_once(BASE_PATH. '/views/app/cart/cartEmpty.php');
            }else
            {
                require_once(BASE_PATH. '/views/app/cart/index.php');
            }
        }else
        {
            $this->redirect('login/customer');

            // if($cart == null)
            // {
            //     require_once(BASE_PATH. '/views/app/cart/cartEmpty.php');
            // }else
            // {
            //     $productIdsString = implode(',', array_map('intval', $_SESSION['cart']));
            //     // dd($productIdsString);
            //     $cart = $db->select('SELECT * FROM products WHERE id IN ' , [$productIdsString])->fetchAll();
            //     require_once(BASE_PATH. '/views/app/cart/index.php');
            // }
        }
    }


    public function increment($product_id)
    {
        if(isset($_SESSION['customerInfo']))
        {
            $quantityAndId = $this->cart_model->getCartInfo($product_id , $_SESSION['customerInfo']['id']);
            if($quantityAndId != false)
            {
                $quantity['quantity'] = $quantityAndId['quantity'] += 1;
                //update
                $this->cart_model->cartUpdate($quantityAndId['id'] , $quantity);
                $this->redirectBack();
            }
            $this->redirectBack(); 
        }else
        {
            $this->redirect('404_error');
        }
     // 404
    }


    public function decrement($product_id)
    {
        if(isset($_SESSION['customerInfo']))
        {
            $quantityAndId = $this->cart_model->getCartInfo($product_id , $_SESSION['customerInfo']['id']);
            if($quantityAndId != false)
            {
                $quantity['quantity'] = $quantityAndId['quantity'] -= 1;
                //update
                $this->cart_model->cartUpdate($quantityAndId['id'] , $quantity);
                $this->redirectBack();
            }
            $this->redirectBack(); 
        }else
        {
            $this->redirect('404_error');
        }
     
    }


    public function delete($product_id)
    {
        if(isset($_SESSION['customerInfo']))
        {
            $check_exist = $this->cart_model->getCartInfo($product_id);

            if($check_exist != false)
            {
                //delete
                $this->cart_model->cartDelete($check_exist['id']);
                $check_cart_empty = $this->cart_model->getCartByCustomerId($_SESSION['customerInfo']['id']);

                if($check_cart_empty == null)
                {
                    $this->redirect('cartEmpty');
                }
                $this->redirectBack();
            }
            $this->redirectBack();
        }else
        {
            $this->redirect('404_error');
        }
    }


    // add or delete
    public function addToCart($product_id)
    {
        $categories = $this->category_model->getCategories();
        if(isset($_SESSION['customerInfo']))
        {
            $check_exist = $this->cart_model->getCartInfo($product_id , $_SESSION['customerInfo']['id']);
            if($check_exist == null)
            {
                $insert = $this->cart_model->cartInsert($_SESSION['customerInfo']['id'] , $product_id , 1);
                if($insert == true)
                {
                    flash('add_to_cart', 'محصول با موفقیت به سبد خرید شما اضافه شد');
                    $this->redirectBack();
                }else
                {
                    flash('add_to_cart', 'خطایی پیش آمد. لطفا مجدد تلاش کنید');
                    $this->redirectBack();
                }
            }else
            {
                $delete = $this->cart_model->cartDelete($check_exist['id']);
                if($delete == true)
                {
                    flash('add_to_cart', 'محصول با موفقیت از سبد خرید شما حذف شد');
                    $this->redirectBack();
                }
            }

        }else{
            // dd('hi');
            flash('add_to_cart', 'لطفا ابتدا وارد حساب کاربری خود شوید');
            $this->redirectBack();
            // if (!in_array($productId, $_SESSION['cart']))
            // {
            // $_SESSION['product_id'] = $product_id;
            // flash('add_to_cart', 'محصول با موفقیت به سبد خرید شما اضافه شد');
            // $this->redirectBack();
            // }else
            // {
            //     flash('add_to_cart', 'محصول با موفقیت از سبد خرید شما حذف شد');
            // }
        }

        require_once(BASE_PATH. '/views/app/profile/addresses.php');

    }

    // update quantity





}