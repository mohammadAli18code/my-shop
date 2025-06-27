<?php

namespace models;

use database\DataBase;
use PDO;

class Banner
{

    private $banner_model;


    public function __construct($pdo){
        $this->banner_model = $pdo;
    }


    public function bannerInsert($request){
       $insert = $this->banner_model->insert('banners' , array_keys($request) , $request);
        return $insert;
    }

    public function bannerUpdate($id , $request){
        $update = $this->banner_model->update('banners' , $id , array_keys($request) , $request);
        return $update;
    }

    public function bannerDelete($id){
        $delete = $this->banner_model->delete('banners' , $id);
        return $delete;
    }

    public function getAllBanners(){
        $results = $this->banner_model->select('SELECT * FROM banners ORDER BY `id` DESC')->fetchAll();
        return $results;
    }

    
    public function getBannerById($id){
        $result = $this->banner_model->select('SELECT * FROM banners WHERE id = ?' , [$id])->fetch();
        return $result;
    }
    


}


?>