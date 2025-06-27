<?php

namespace models;

use database\DataBase;
use PDO;

class Checkout
{

    private $checkout_model;


    public function __construct($pdo){
        $this->checkout_model = $pdo;
    }


    
    public function CategoryInsert($request)
    {
        $insert = $this->category_model->insert('categories' , array_keys($request) , $request);
        return $insert;
    }

}

?>