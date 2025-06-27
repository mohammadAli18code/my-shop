<?php

namespace models;

use database\DataBase;
use PDO;

class Cart
{

    private $cart_model;


    public function __construct($pdo){
        $this->cart_model = $pdo;
    }



    
    public function cartInsert($customer_id , $product_id , $quantity)
    {
        $insert = $this->cart_model->insert('cart' , ['customer_id' , 'product_id' , 'quantity'] , [$customer_id , $product_id , $quantity]);
        return $insert;
    }

    public function cartUpdate($customer_id , $request)
    {
        $update = $this->cart_model->update('cart' , $customer_id , array_keys($request) , $request);
        return $update;
    }


    public function cartDelete($id)
    {
        $delete = $this->cart_model->delete('cart' , $id);
        return $delete;
    }

    public function getCartInfo($product_id , $customer_id)
    {
        $results = $this->cart_model->select('SELECT * FROM cart WHERE product_id = ? AND customer_id = ?' , [$product_id , $customer_id])->fetch();
        return $results;
    }


    public function getCartByCustomerId($customer_id)
    {
        $results = $this->cart_model->select('SELECT * FROM cart WHERE customer_id = ?' , [$customer_id])->fetchAll();
        return $results;
    }



    public function customerCart($customer_id)
    {
        $results = $this->cart_model->select("SELECT 
        p.id AS product_id,
        p.title AS product_title,
        p.price AS per_product_price,
        (p.price * c.quantity) AS product_price,
        d.discount_amount AS discount_amount,
        p.stock AS product_stock,
        (p.price * c.quantity) - (COALESCE(d.discount_amount , 0) * c.quantity) AS total_price,
        (c.quantity * d.discount_amount) AS total_discount,
        c.quantity AS quantity,
        SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT pi.url ORDER BY pi.url SEPARATOR ','), ',', 1) AS product_image ,
        GROUP_CONCAT(DISTINCT CONCAT(pa.name , ':' , pa.value)) AS attribute
        FROM 
            cart c
        JOIN 
            products p ON c.product_id = p.id
        LEFT JOIN 
            product_images pi ON p.id = pi.product_id
        LEFT JOIN 
            discounts d ON p.id = d.product_id
        LEFT JOIN 
            product_attributes pa ON p.id = pa.product_id
        WHERE 
            c.customer_id = ?
        GROUP BY
            p.id, c.quantity " , [$customer_id])->fetchAll();

        return $results;
    }
  

    public function cartCount()
    {
        $result = $this->cart_model->select('SELECT COUNT(*) AS count FROM cart WHERE customer_id = ?' , [$_SESSION['customerInfo']['id']])->fetch();
        return $result;
    }

}



?>



