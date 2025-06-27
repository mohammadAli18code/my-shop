<?php

namespace Admin;

use database\DataBase;


class TransactionController extends AdminController{

    public function index()
    {
        $db = new DataBase();
        // $transactions = $db->select('SELECT * FROM orders GROUP BY created_at');
        $transactions = $db->select('SELECT o.id , o.status , o.payment_identifier , SUM(o.total_price) AS total_price , o.created_at , o.shipping_date , o.delivery_date , d.discount_amount , cu.first_name , cu.last_name , cu.email FROM orders o 
        JOIN customers cu ON cu.id = o.customer_id 
        JOIN discounts d ON d.product_id = o.product_id 
        GROUP BY DATE(o.created_at) , o.customer_id')->fetchAll();
        $all_sold_30_days_age = $db->select('SELECT SUM(total_price) AS all_price FROM orders WHERE status = ? AND created_at >= NOW() - INTERVAL 30 DAY' , ['Completed'])->fetch();
        $all_sold = $db->select('SELECT SUM(total_price) AS all_price FROM orders WHERE status = ?' , ['Completed'])->fetch();
    
        // dd($all_sold_30_days_age);
        // dd($transactions);
        require_once(BASE_PATH . '/template/panel/transactions/index.php');

    }
}



?>