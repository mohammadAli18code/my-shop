<?php

namespace Admin;

use database\DataBase;


class User extends Admin{

    public function index(){

        $db = new DataBase();
        // $admin = $this->adminInfo();

        // $this->getAdminInfo();
        // dd($this->adminInfo);
        // dd($_SESSION['adminInfo']['first_name']);
        if(isset($_SESSION['adminInfo']))
        {
            $allUsers = $db->select(' SELECT  id,first_name,last_name,email,phone_number,image,is_active,permission,created_at FROM customers UNION SELECT id,first_name,last_name,email,phone_number,image,is_active,permission,created_at FROM admins');
            require_once(BASE_PATH . '/template/panel/users/index.php');
        }else
        {
            $this->redirect('login/admin');
        } 
    }

    public function admins(){

        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $admins = $db->select('SELECT * FROM admins ORDER BY `id` DESC');
            $activeAdmin = $db->select('SELECT * FROM admins WHERE id = ?' , [$_SESSION['adminInfo']['id']])->fetchAll();
            require_once(BASE_PATH . '/template/panel/users/adminsList.php');
        }else
        {
            $this->redirect('login/admin');
        } 

    }

    public function customers(){

        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $customers = $db->select('SELECT * FROM customers ORDER BY `id` DESC');
            require_once(BASE_PATH . '/template/panel/users/customersList.php');
        }else
        {
            $this->redirect('login/admin');
        }   
    }

    public function a_customers(){

        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $ActiveCustomers = $db->select('SELECT * FROM customers WHERE is_active = 2 ORDER BY `id` DESC');
            require_once(BASE_PATH . '/template/panel/users/ActiveCustomersList.php');
        }else
        {
            $this->redirect('login/admin');
        }

    }

    public function n_a_customers(){

        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $notActiveCustomers = $db->select('SELECT * FROM customers WHERE is_active = 1 ORDER BY `id` DESC');
            require_once(BASE_PATH . '/template/panel/users/notActiveCustomersList.php');
        }else
        {
            $this->redirect('login/admin');
        }

    }


    public function editCustomer($id){
        // dd('hi');
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $customers = $db->select('SELECT * FROM customers WHERE id = ?' , [$id])->fetch();
            require_once(BASE_PATH . '/template/panel/users/customer-info.php');
        }else
        {
            $this->redirect('login/admin');
        }
    }


    public function editAdmin($id){
        // dd('hi');
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $admins = $db->select('SELECT * FROM admins WHERE id = ?' , [$id])->fetch();
            require_once(BASE_PATH . '/template/panel/users/admin-info.php');
        }else
        {
            $this->redirect('login/admin');
        }
    }



    public function updateAdmin($request , $id)
    {
        // dd($request);

            $db = new DataBase();
            // $db->update('customers', $id, array_keys($request), $request);
            // $this->redirect('shop_project/admin/users/1');
            if(isset($_SESSION['adminInfo']))
            {
            $checkPermission = $db->select('SELECT permission FROM customers WHERE id = ' . $id . ' UNION SELECT permission FROM admins WHERE id = ' . $id)->fetch();
                if ($request['image']['tmp_name'] != null)
                {
                    $customer = $db->select('SELECT * FROM admins WHERE id = ?;', [$id])->fetch();
                    $this->removeImage($customer['image']);
                    $request['image'] = $this->saveImage($request['image'] , 'admin-image');
                } else
                {
                    unset($request['image']);
                }
                $db->update('admins', $id, array_keys($request), $request);
                flash('change_info_message' , 'اطلاعات شما با موفقیت تغییر کرد');
                $this->redirectBack();
            }
    }
        
    

    public function updateCustomer($request , $id)
    {
        if(isset($_SESSION['adminInfo']))
        {
        $checkPermission = $db->select('SELECT permission FROM customers WHERE id = ' . $id . ' UNION SELECT permission FROM admins WHERE id = ' . $id)->fetch();
            if ($request['image']['tmp_name'] != null) {
        
                $customer = $db->select('SELECT * FROM customers WHERE id = ?;', [$id])->fetch();
                $this->removeImage($customer['image']);
                $request['image'] = $this->saveImage($request['image'], 'customer-image');
                    // dd('hi2');
            } else
            {
                unset($request['image']);
            }
                // dd('hi3');
            $db->update('customers', $id, array_keys($request), $request);
            $this->redirect('admin/users/1');
                // dd('hi4');
        }else
        {
            $this->redirect('login/admin');
        }
    }
    


    public function deleteAdmin($id)
    {
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $db->delete('admins' , $id);
            $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }
    }



    public function deleteCustomer($id)
    {
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
            $db->delete('customers' , $id);
            $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }
        }


    public function confirmationAdmin($id)
    {
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
        $db->update('admins' , $id ,['is_active'] , [2]);
        $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }
        
    }

    public function confirmationCustomer($id)
    {
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
        $db->update('customers' , $id ,['is_active'] , [2]);
        $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }
        
    }

    public function notConfirmationAdmin($id)
    {
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
        $db->update('admins' , $id ,['is_active'] , [1]);
        $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }
    }

    public function notConfirmationCustomer($id)
    {
        $db = new DataBase();
        if(isset($_SESSION['adminInfo']))
        {
        $d = $db->update('customers' , $id ,['is_active'] , [1]);
        $this->redirectBack();
    }else
    {
        $this->redirect('login/admin');
    }
    }

}