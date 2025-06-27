<?php

namespace App;

use database\DataBase;
use models\Category;
use models\Checkout;


class CheckoutController extends AppController{


    private $checkout_model;


    public function __construct(){
        $pdo = new DataBase();
        $this->checkout_model = new Checkout($pdo);
    }


    

    public function saveNewSales(){
        $db = new Database();
        if(isset($_SESSION['customerInfo']['id']))
        {
            if(isset($_SESSION['cart']))
            {
                if(isset($_SESSION['cart_all_price']))
                {
                    $insert = $db->insert('sales' , ['customer_id' , 'sale_date' , 'total_amount'] , [$_SESSION['customerInfo']['id'] , NOW() , $_SESSION['cart_all_price']] );
                    if($insert)
                    {
                        $last_sale = $db->select('SELECT * FROM sales LIMIT 1')->fetch(); 
                        foreach($_SESSION['cart'] as $product)
                        {
                            $db->insert('sales_details' , ['sale_id' , 'product_id' , 'quantity' , 'price'] , [$last_sale['sale_id'] , $product['id'] , $product['quantity'] , $product['total_price']]);
                        }
                        $this->redirect('---');
                    }
                    $this->redirect('---');
                }
                $this->redirect('---');
            }
            $this->redirect('---');
        }
        $this->redirect('---');
    }

    
    public function index()
    {
        $db = new dataBase();
        $categories = $db->select('SELECT * FROM categories')->fetchAll();
        if(isset($_SESSION['customerInfo']['id']))
        {
           $cart = $_SESSION['cart'];

        // $cart = $db->select('SELECT 
        //                             p.price AS per_product_price,
        //                             (p.price * c.quantity) AS product_price,
        //                             (p.price * c.quantity) - (COALESCE(d.discount_amount , 0) * c.quantity) AS total_price,
        //                             (c.quantity * d.discount_amount) AS total_discount
        //                             FROM 
        //                                 cart c
        //                             JOIN 
        //                                 products p ON c.product_id = p.id
        //                             JOIN 
        //                                 discounts d ON p.id = d.product_id
        //                             WHERE 
        //                                 c.customer_id = ?
        //                             GROUP BY
        //                                 p.id, c.quantity ' , [$_SESSION['customerInfo']['id']])->fetchAll();
        
        $address = $db->select('SELECT * FROM addresses WHERE customer_id = ? LIMIT 1' , [$_SESSION['customerInfo']['id']])->fetch();
        // dd($_SESSION['cart']);
        require_once(BASE_PATH. '/views/app/checkout/checkout.php');
    }

}
}

?>