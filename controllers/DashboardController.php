<?php

namespace Admin;

use database\DataBase;

class DashboardController extends AdminController{

    
    public function index(){

        $db = new DataBase();
        
        $this->getAdminInfo();

        // dd($_SESSION['adminInfo']);
       
        require_once(BASE_PATH . '/views/panel/index.php');
    }

}


?>