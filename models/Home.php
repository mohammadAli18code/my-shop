<?php

namespace models;

use database\DataBase;
use PDO;

class Home
{

    private $home_model;


    public function __construct($pdo){
        $this->home_model = $pdo;
    }



    public function getBanners()
    {
        $results = $this->home_model->select('SELECT * FROM banners WHERE is_active = 2')->fetchAll();
        return $results;
    }


  

}



?>



