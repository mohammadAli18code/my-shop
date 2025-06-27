<?php

namespace Admin;

use database\DataBase;

class Dashboard extends Admin{

    
    public function index(){

        $db = new DataBase();
        
        $this->getAdminInfo();

        // dd($_SESSION['adminInfo']);
       
        require_once(BASE_PATH . '/template/panel/index.php');
    }

}


?>