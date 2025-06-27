<?php

namespace Admin;

use database\DataBase;
use models\Category;


class CategoryController extends AdminController{

    private $category_model;


    public function __construct(){
        $pdo = new DataBase();
        $this->category_model = new Category($pdo);
    }

    public function index()
    {
        if(isset($_SESSION['adminInfo']))
        {
            $categories = $this->category_model->getAllCategoriesWithParents();
            $categoryList = $this->category_model->getParents();
            $category = $this->category_model->getCategories();

            require_once(BASE_PATH . '/views/panel/categories/index.php');
        }else
        {
            $this->redirect('login/admin');
        }
        
    }
    
    public function create($request)
    {
        if(isset($_SESSION['adminInfo']))
        {
            if($request['parent_id'] == ''){
                $request['parent_id'] = null;
            }

            $insert = $this->category_model->CategoryInsert($request);
            if($insert){
                flash('create_category' , 'دسته بندی جدید با موفقیت ایجاد و اضافه شد.');
                $this->redirectBack();
            }else{
                flash('create_category' , 'مشکلی پیش آمد. لطفا دوباره تلاش کنید.');
                $this->redirectBack();
            }
            $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }
    }

    public function edit($category_id)
    {
        if(isset($_SESSION['adminInfo']))
        {
            $categoryList = $this->category_model->getParents();
            // dd($categoryList);
            $categoryInfo = $this->category_model->getCategoryById($category_id);
            // dd($categoryInfo);
            require_once(BASE_PATH . '/views/panel/categories/edit.php');
        }else
        {
            $this->redirect('login/admin');
        }
    }

    public function update($request , $category_id)
    {
        // dd($request);
        if(isset($_SESSION['adminInfo']))
        {
            $update = $this->category_model->categoryUpdate($request , $category_id);
            if($update){
                flash('edit_category' , 'دسته بندی مورد نظر با موفقیت ویرایش شد.');
                $this->redirectBack();
            }else{
                flash('edit_category' , 'عملیات با خطا مواجه شد. لطفا دوباره تلاش کنید.');
                $this->redirectBack();
            }
            $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }

    }

    public function delete($id)
    {
        if(isset($_SESSION['adminInfo']))
        {
            $delete = $this->category_model->categoryDelete($id);
            if($delete){
                flash('delete_category' , 'دسته بندی مورد نظر با موفقیت حذف شد.');
                $this->redirectBack();
            }else{
                flash('delete_category' , 'دسته بندی مورد نظر با موفقیت حذف شد.');
                $this->redirectBack();
            }
            $this->redirectBack();
        }else
        {
            $this->redirect('login/admin');
        }

    }



}




?>