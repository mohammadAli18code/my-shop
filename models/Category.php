<?php

namespace models;

use database\DataBase;
use PDO;

class Category
{

    private $category_model;


    public function __construct($pdo){
        $this->category_model = $pdo;
    }


    
    public function CategoryInsert($request)
    {
        $insert = $this->category_model->insert('categories' , array_keys($request) , $request);
        return $insert;
    }

    public function CategoryUpdate($request , $category_id)
    {
        $update = $this->category_model->update('categories' , $category_id , array_keys($request) , $request);
        return $update;
    }

    public function categoryDelete($id)
    {
        $delete = $this->category_model->delete('categories' , $id);
        return $delete;
    }


    public function getCategories()
    {
        $results = $this->category_model->select('SELECT * FROM categories')->fetchAll();
        return $results;
    }

    
    public function mainCategories()
    {
        $results = $this->category_model->select('SELECT * FROM categories WHERE parent_id IS NULL LIMIT 0,10')->fetchAll();
        return $results;      
    }

    public function getCategoryByParentId($parent_ids)
    {
        $parent_ids = implode(', ' , $parent_ids);
        $results = $this->category_model->select("SELECT * FROM categories WHERE parent_id IS NOT NULL AND parent_id IN ($parent_ids)")->fetchAll();
        // dd($results);
       
        // if (!is_array($parent_ids)) {
        //     $parent_ids = [$parent_ids]; // تبدیل مقدار تکی به آرایه
        // }
    
        // $placeholders = implode(',', array_fill(0, count($parent_ids), '?'));
        // $query = "SELECT * FROM categories WHERE parent_id IS NOT NULL AND parent_id IN ($placeholders)";
        // $results = $this->category_model->select($query, $parent_ids)->fetchAll();

        return $results;      
    }


    public function getParentId($id){
        $results = $this->category_model->select('SELECT parent_id FROM categories WHERE id = ?' , [$id])->fetch();
        return $results;
    }

    public function getParents(){
        $results = $this->category_model->select('SELECT * FROM categories WHERE parent_id IS NULL ORDER BY `id` DESC')->fetchAll();
        return $results;
    }

    public function getCategoryNameOfProduct($id){
        $results = $this->category_model->select('SELECT name FROM categories WHERE parent_id IS NOT NULL AND id = ?' , [$id])->fetch();
        return $results;
    }

    public function getCategoryById($id){
        $categoryInfo = $this->category_model->select('SELECT c1.* , c2.name AS parent FROM categories c1 LEFT JOIN categories c2 ON c1.parent_id = c2.id WHERE c1.id = ?' , [$id])->fetch();     
        return $results;
    }

    public function getAllCategoriesWithParents(){
        $results = $this->category_model->select('SELECT c1.* , c2.name AS parent FROM categories c1 LEFT JOIN categories c2 ON c1.parent_id = c2.id');
        return $results;
    }
    
}

?>