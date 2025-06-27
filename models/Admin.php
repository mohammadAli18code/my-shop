<?php

namespace models;

use database\DataBase;
use PDO;

class Admin
{

    private $admin_model;


    public function __construct($pdo){
        $this->admin_model = $pdo;
    }




    public function checkAdminByEmailAndId($email , $id){
        $result = $this->admin_model->select("SELECT * FROM admins WHERE email = ? AND id = ?", [$email , $id])->fetch();
        return $result;
     }


    public function getAdminById($id){
        $results = $this->admin_model->select('SELECT * FROM admins WHERE id = ?' , [$id])->fetch();
        return $results;
     }


    public function getAdminByEmail(){
        $results = $this->admin_model->select('SELECT * FROM customers WHERE id = ?' , [$_SESSION['customerInfo']['id']])->fetch();
        return $results;
     }


    public function getAdminByPhone(){
        $results = $this->admin_model->select('SELECT * FROM customers WHERE id = ?' , [$_SESSION['customerInfo']['id']])->fetch();
        return $results;
     }


}

?>