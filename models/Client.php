<?php

namespace models;

use database\DataBase;
use PDO;

class Client
{

    private $client_model;


    public function __construct($pdo){
        $this->client_model = $pdo;
    }

    public function getClientInfo(){
       $results = $this->client_model->select('SELECT * FROM customers WHERE id = ?' , [$_SESSION['customerInfo']['id']])->fetch();
       return $results;
    }
    // db->select('SELECT * FROM customers WHERE id = ?', [$_SESSION['customer']])->fetch();

    public function getAllClientInfo(){
        $results = $this->client_model->select('SELECT customers.account_balance , customers.points , COUNT(orders.customer_id) AS all_order_count FROM customers LEFT JOIN orders ON customers.id = orders.customer_id WHERE customers.id = ? AND orders.customer_id = ?' , [$_SESSION['customerInfo']['id'] , $_SESSION['customerInfo']['id']])->fetch();
        return $results;
    }

    public function getClientById($id){
        $results = $this->client_model->select('SELECT * FROM customers WHERE id = ?' , [$id])->fetch();
        return $results;
    }

    public function getClientByEmail($email){
        $results = $this->client_model->select('SELECT * FROM customers WHERE email = ?' , [$email])->fetch();
        return $results;
    }

    public function getClientByPhone($phone_number){
        $results = $this->client_model->select('SELECT * FROM customers WHERE phone_number = ?' , [$phone_number])->fetch();
        return $results;
    }

    public function insertClient($request){
        $insert = $this->client_model->insert('customers', array_keys($request), $request);
        return $insert;
    }


    public function updateClientInfo($id , $request){
        $update = $this->client_model->update('customers', $id, array_keys($request), $request);
        if($update){
            return true;
        }else{
            return false;
        }
    }


    public function getOrders(){
        $results = $this->client_model->select('SELECT orders.* , DATE(orders.created_at) AS date , TIME(orders.created_at) AS time , COUNT(orders.id) AS order_count , SUM(products.price) AS total_order_price FROM orders LEFT JOIN products ON products.id = orders.product_id GROUP BY DATE(orders.created_at) HAVING customer_id = ?' , [$_SESSION['customerInfo']['id']])->fetchALL();
        return $results;
    }


    public function getCountOfCompletedOrders(){
        $results = $this->client_model->select('SELECT COUNT(customer_id) AS completed_orders_count FROM orders WHERE status = ? AND customer_id = ?' , ['completed' , $_SESSION['customerInfo']['id']])->fetch();
        return $results;
    }


    public function getProductsInCurrentOrder(){
        $results = $this->client_model->select('SELECT o.product_id, SUM(o.discount_amount) AS discount_amount , p.* , COUNT(o.product_id) AS product_count , SUM(p.price) AS total_price FROM orders o JOIN products p ON o.product_id = p.id WHERE o.customer_id = ? AND DATE(o.created_at) = ? GROUP BY o.product_id , p.title' , [$_SESSION['customerInfo']['id'] , $order_date])->fetchAll();
        return $results;
    }


    public function getAddresses(){
        $results = $this->client_model->select('SELECT customers.* , addresses.* FROM customers LEFT JOIN addresses ON addresses.customer_id = customers.id WHERE customers.id = ? LIMIT 0,1' , [$_SESSION['customerInfo']['id']])->fetchAll();
        return $results;
    }

    public function getAddressById(){
        $results = $this->client_model->select('SELECT * FROM addresses WHERE id = ? AND customer_id = ?' , [$address_id , $_SESSION['customerInfo']['id']]);
        return $results;
    }

    public function updateAddressById($id , $request){
        $update = $this->client_model->update('addresses' , $id , array_keys($request) , $request);
        if($update){
            return true;
        }else{
            return false;
        }
    }

    public function deleteAddressById($id){
        $delete = $this->client_model->delete('addresses' , $address_id);
        if($delete){
            return true;
        }else{
            return false;
        }
    }

    public function getFavoriteProducts(){
        $results = $this->client_model->select('SELECT f.product_id , p.* , p_i.image_url , d.discount_amount , d.discount_percentage FROM favorites f LEFT JOIN discounts d ON f.product_id = d.product_id LEFT JOIN products p ON p.id = f.product_id LEFT JOIN (SELECT product_id, MIN(url) AS image_url FROM product_images GROUP BY product_id) p_i ON p.id = p_i.product_id WHERE customer_id = ? GROUP BY f.product_id , p.title' , [$_SESSION['customerInfo']['id']])->fetchAll();
        return $results;
    }





}