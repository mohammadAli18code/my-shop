<?php

namespace Admin;
use database\DataBase;
use models\Admin;
use Auth\AuthController;

class AdminController{

     public $currentDomain;
     public $basePath;
     private $admin_model;

     // protected $adminInfo = [];

     function __construct()
     {
                $pdo = new DataBase();
                $auth = new AuthController();
                $auth->checkAdminPermission();
                $this->currentDomain = CURRENT_DOMAIN;
                $this->basePath = BASE_PATH;
                $this->admin_model = new Admin($pdo);
     }


     
     public function getAdminInfo()
     {  
             if(isset($_SESSION['admin_id']))
             {
                $_SESSION['adminInfo'] = $this->admin_model->getAdminById($_SESSION['admin_id']);
             }
        //      foreach ($admin as $key => $value) {
        //              $this->adminInfo[$key] = $value;
        //          }
     }
       

    protected function redirect($url)
    {
            header('Location: ' . trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
            exit;
    }

    protected function redirectBack()
    {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
    }

    protected function saveImage($image, $imagePath, $imageName = null)
    {

            if ($imageName) {
                    $extension = explode('/', $image['type'])[1];
                    $imageName = $imageName . '.' . $extension;
            } else {
                    $extension = explode('/', $image['type'])[1];
                    $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
            }

            $imageTemp = $image['tmp_name'];
            $imagePath = 'public/' . $imagePath . '/';

            if (is_uploaded_file($imageTemp)) {
                    if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                            return $imagePath . $imageName;
                    } else {
                            return false;
                    }
            } else {
                    return false;
            }

    }

    protected function removeImage($path)
    {
            $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
            if (file_exists($path)) {
                    unlink($path);
            }
    }




}


?>