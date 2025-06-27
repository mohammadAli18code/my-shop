<?php

namespace App;

use database\DataBase;
use models\Client;
use models\Home;
use models\Category;


class ClientController extends AppController{


    private $client_model;
    private $home_model;
    private $category_model;

    public function __construct()
    {
        $pdo = new DataBase();
        $this->client_model = new Client($pdo);
        $this->home_model = new Home($pdo);
        $this->category_model = new Category($pdo);
    }

//account :

    //profile
    public function profile()
    {
        if(isset($_SESSION['customerInfo']))
        {
            $categories = $this->category_model->getCategories();
            $orders = $this->client_model->getOrders();
            $account_info = $this->client_model->getAllClientInfo();
            $completed_orders_count = $this->client_model->getCountOfCompletedOrders();

            require_once(BASE_PATH. '/views/app/profile/index.php');
        }else
        {
            $this->redirect('404_error');
        }
    }

    //orders
    public function orders()
    {
        if(isset($_SESSION['customerInfo']))
        {
            $categories = $this->category_model->getCategories();
            $orders = $this->client_model->getOrders();

            require_once(BASE_PATH. '/views/app/profile/orders.php');
        }else
        {
            $this->redirect('404_error');
        }

    }

    public function orderDetails($order_date)
    {
        if(isset($_SESSION['customerInfo']))
        {
            $categories = $this->category_model->getCategories();
            $addresses =  $this->client_model->getAddresses();
            // $productsInCurrentOrder = $db->select('SELECT products.* , COUNT(orders.product_id) AS product_count , SUM(products.price) AS total_price , orders.product_id , orders.status AS status , orders.discount_amount FROM orders LEFT JOIN products ON products.id = orders.product_id GROUP BY orders.product_id HAVING DATE(created_at) = ?' , [$order_date])->fetchAll();
            //    $productsInCurrentOrder = $db->select('SELECT orders.* ,
            //     (SELECT title FROM products WHERE products.id = orders.product_id) AS product_title ,
            //     (SELECT description FROM products WHERE products.id = orders.product_id) AS product_description 
            //      FROM orders WHERE DATE(orders.created_at) = ? AND orders.customer_id = ?' , [$order_date , $_SESSION['customerInfo']['id']])->fetchAll();


            //    $count = $db->select('SELECT COUNT(product_id) FROM orders GROUP BY product_id HAVING customer_id = ? AND created_at = ?' , [$_SESSION['customerInfo']['id'] ,$order_date])->fetchAll();
                // $c = $db->select('SELECT product_id, COUNT(product_id) AS product_count FROM orders WHERE customer_id = ? AND DATE(created_at) = ? GROUP BY product_id' , [$_SESSION['customerInfo']['id'] ,$order_date])->fetchAll();
            
            
            $productsInCurrentOrder = $this->client_model->getProductsInCurrentOrder();
            $total_price = 0;
            $discount_amount = 0;
            foreach($productsInCurrentOrder as $per_type_product)
            {
                $total_price += $per_type_product['total_price'];
                $discount_amount += $per_type_product['discount_amount'];
            }
            // dd($productsInCurrentOrder);
            // $discount_amount = $db->select('SELECT SUM(discount_amount) FROM orders WHERE customer_id = ? AND created_at = ? GROUP BY ' , [$_SESSION['customerInfo']['id'] ,$order_date])->fetch();
            //   dd($discount_amount);
            require_once(BASE_PATH. '/views/app/profile/order-details.php');

        }else
        {
            $this->redirect('404_error');
        }
    }

    //favorites
    public function favorites()
    {
        if(isset($_SESSION['customerInfo']))
        {
            $categories = $this->category_model->getCategories();
            $favorites = $this->client_model->getFavoriteProducts();
            
            require_once(BASE_PATH. '/views/app/profile/favorites.php');
        }else
        {
            $this->redirect('404_error');
        }
    }

    //messages
    public function messages()
    {
        if(isset($_SESSION['customerInfo']))
        {
            $categories = $this->category_model->getCategories();

            require_once(BASE_PATH. '/views/app/profile/messages.php');
        }else
        {
            $this->redirect('404_error');
        }
    }

    //address
    public function addresses()
    {
        if(isset($_SESSION['customerInfo']))
        {
            $categories = $this->category_model->getCategories();
            $addresses = $this->client_model->getAddresses();

            require_once(BASE_PATH. '/views/app/profile/addresses.php');
        }else
        {
            $this->redirect('404_error');
        }
    }

    public function updateAddress($request)
    {
        if(isset($_SESSION['customerInfo']))
        {
            $id = $request['address_id'];
            unset($request['address_id']);
            // dd($request);
            $update = $this->client_model->updateAddressById($id , $request);
            // dd($update);
            if($update == true)
            {
            flash('successful_change_address' , 'تغییرات با موفقیت اعمال شد');
            $this->redirectBack();
            }else
            {
            flash('failed_change_address' , 'عملیات با خطا مواجه شد! لطفا دوباره امتحان کنید');
            $this->redirectBack();
            }
        }else
        {
        $this->redirect('404_error');
        }
    }


    public function deleteAddress($address_id)
    {

        if(isset($_SESSION['customerInfo']))
        {
            $currentAddress = $this->client_model->getAddressById();
            if($currentAddress != null)
            {
            $db->deleteAddressById($address_id);
            $this->redirectBack();
            }
            $this->redirectBack();
        }else
        {
            $this->redirect('404_error');
        }

        $this->redirectBack();
    }

    //personal-info
    public function personalInfo()
    {

        if(isset($_SESSION['customerInfo']))
        {
            $categories = $this->category_model->getCategories();
            require_once(BASE_PATH. '/views/app/profile/personal-info.php');
        }else
        {
            $this->redirect('404_error');
        }
    }

    
    public function updateInfo($request)
    {
        if(isset($_SESSION['customerInfo']))
        {
            $id = $_SESSION['customerInfo']['id'];
            if($request['image'] != null)
            {
                $customer = $this->client_model->getClientInfo();
                $this->removeImage($customer['image']);
                $request['image'] = $this->saveImage($request['image'] , 'customer-image' );
            }else
            {
                unset($request['image']);
            }

            $change = $db->updateClientInfo($id , $request);

            if($change == true)
            {
                $this->getCustomerInfo();
                flash('change_info_result' , 'اطلاعات شما با موفقیت تغییر کرد');
                $this->redirectBack();
            }else
            {
                flash('change_info_result' , 'عملیات با خطا مواجه شد!');
            }
            
        }else
        {
            $this->redirect('404_error');
        }
    }
}