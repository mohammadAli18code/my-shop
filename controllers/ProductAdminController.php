<?php

namespace Admin;

use database\DataBase;
use models\Product;
use models\Category;
use models\Comment;
use models\Home;


class ProductAdminController extends AdminController{

    private $product_model;
    private $category_model;
    private $comment_model;
    private $home_model;

    public function __construct()
    {
        $pdo = new DataBase();
        $this->product_model = new Product($pdo);
        $this->category_model = new Category($pdo);
        $this->comment_model = new Comment($pdo);
        $this->home_model = new Home($pdo);
    }




    public function index()
    {

        $categoryList = $this->category_model->getCategories();

        $productsInfo = $this->product_model->getAllProducts();

        require_once(BASE_PATH . '/views/panel/products/index.php');

    }

    public function searchProduct($request)
    {
        $parent_id['parent_id'] = null;
        $categoryList = $this->category_model->getCategories();

        if(!isset($request['id']) || $request['id'] == '')
        {
            $request['id'] = null;
        }
        if(!isset($request['title']) || $request['title'] == '')
        {
            $request['title'] = null;
        }
        if(!isset($request['minPrice']) || $request['minPrice'] == '')
        {
            $request['minPrice'] = null;
        }
        if(!isset($request['maxPrice']) || $request['maxPrice'] == '')
        {
            $request['maxPrice'] = null;
        }
        if(!isset($request['category_id']) || $request['category_id'] == '')
        {
            $request['category_id'] = null;
        }else{
            $parent_id = $this->category_model->getParentId($request['category_id']);
            if($parent_id['parent_id'] == null){
                // dd('hi1');
                $parent_id['parent_id'] = $request['category_id'];
                $request['category_id'] = null;
            }else{
                // dd('hi2');
                $parent_id['parent_id'] = null;
            }
        }
        $productsInfo = $this->product_model->productsBySearch($request);

        // $productsInfo = $db->select('SELECT
        // i.url , p.* , COUNT(c.product_id) AS comment_count , c1.name AS category_name, 
        // c2.name AS parent_name FROM products AS p
        // LEFT JOIN comments c ON p.id = c.product_id 
        // LEFT JOIN categories c1 ON p.category_id = c1.id 
        // LEFT JOIN categories c2 ON c1.parent_id = c2.id 
        // LEFT JOIN product_images i ON p.id = i.product_id
        // WHERE 1=1
        // AND (p.id = ? OR ? IS NULL)
        // AND (p.title LIKE ? OR ? IS NULL)
        // AND (p.price BETWEEN ? AND ? OR ( ? IS NULL AND ? IS NULL))
        // AND (p.category_id = ? OR ? IS NULL) 
        // AND (c1.parent_id = ? OR ? IS NULL) 
        // GROUP BY p.id' , [ 
        // $request['id'] , $request['id'] ,
        // '%' . $request['title'] . '%' , $request['title'] , 
        // $request['minPrice'] , $request['maxPrice'] , $request['minPrice'] , $request['maxPrice'] ,
        // $request['category_id'] , $request['category_id'] ,
        // $parent_id['parent_id'], $parent_id['parent_id']])->fetchAll();
        // dd($productsInfo);
        if(empty($productsInfo))
        {
            flash('search_filter' , 'موردی پیدا نشد!');
        }
        require_once(BASE_PATH . '/views/panel/products/index.php');
    }

    public function create(){

        $categoryList = $this->category_model->getCategories();
        
        require_once(BASE_PATH . '/views/panel/products/create.php');

    }

    public function store($request)
    {

        if($request['category_id'] == null){
            
            flash('create_error' , 'لطفا دسته بندی معتبری را وارد کنید');
            $this->redirectBack();
        }
        if(!isset($request['title']) || $request['title'] == '' ||
           !isset($request['description']) || $request['description'] == '')
        {
            flash('sending_error' , 'پر کردن فیلد "عنوان" و " توضیحات" الزامی هستند');
            $this->redirectBack();
        }
        if(!isset($request['image']['tmp_name']) || $request['image']['tmp_name'] == ''){
            flash('sending_error' , 'لطفا یک عکس برای محصول ایجاد کنید!');
            $this->redirectBack();
        }
        if(!isset($request['name']) && $request['name'] == '' || !isset($request['value']) || $request['value'] == '')
        {
            flash('sending_error' , 'لطفا حداقل یک ویژگی برای محصول اضافه کنید');
            $this->redirectBack();
        }

        //insert 
        $attribute_name = $request['name'];
        $attribute_value = $request['value'];
        unset($request['name']);
        unset($request['value']);

        $image_address = $this->saveImage($request['image'], 'product-image');
        unset($request['image']);

        $createNewProduct = $this->product_model->productInsert($request);
        if($createNewProduct == true)
        {
            // dd('hi');
            $product_id = $this->product_model->getLatestProduct();
            if($product_id != null)
            {
              $attribute_insert = $this->product_model->attributeInsert($product_id['id'] , $attribute_name , $attribute_value);
              $image_insert = $this->product_model->imageInsert($product_id['id'] , $image_address);
            }
        }

        $this->redirect('admin/products');

    }

    public function edit($id)
    {

        $product = $this->product_model->getProductById($id);
        $product_attributes = $this->product_model->getProductAttributes($id);
        // $category = $db->select('SELECT products.* , categories FROM categories where id = ?' , [$id]);
        $categoryList = $this->category_model->getCategories();
        require_once(BASE_PATH . '/views/panel/products/edit.php');

    }

    public function update($request , $id)
    {

        $product_images = $this->product_model->getProductImages($id);

        if($request['image']['tmp_name'] != null)
        {
            $request['image'] = $this->saveImage($request['image'] , 'product-image');

            //insert image
            $this->product_model->imageInsert($id , $request['image']);

            unset($request['image']);

        }else{
            if($product_images != true)
            {
                flash('update_alert' , 'لطفا یک عکس برای محصول انتخاب کنید');
                $this->redirectBack();
            }
        }
        if(isset($request['name']) && $request['name'] != '' && isset($request['value']) && $request['value'] != '')
        {
            //insert attributes
            $this->product_model->attributeInsert($id , $request['name'] , $request['value']);
            unset($request['name']);
            unset($request['value']);
        }
        unset($request['image']);
        unset($request['name']);
        unset($request['value']);

        //update
        $update = $this->product_model->productUpdate($id , $request);

        $this->redirect('admin/products');

        // if($request['image']['tmp_name'] != null){
        //     // dd('hi1');
        //     $product = $db->select('SELECT * FROM products WHERE  id = ? ' , [$id]);
        //     $this->removeImage($product['image']);
        //     $request['image'] = saveImage($request['image'] , 'product-image');
        // }else{
        //     // dd('hi2');
        //     unset($request['image']);
        // }
        // // dd('hi3');
        // $product = $db->update('products' , $id , array_keys($request) , $request);
        // $this->redirect('admin/products');
    }


    public function toActive($id)
    {
        $product['status'] = ['approved'];
        $this->product_model->productUpdate($id , $product);
        $this->redirectBack();
    }


    public function toNotActive($id)
    {
        $product['status'] = ['seen'];
        $this->product_model->productUpdate($id , $product);
        $this->redirectBack();
    }



    public function delete($id)
    {
        $this->product_model->productDelete($id);
        $this->redirectBack();
    }

}


?>