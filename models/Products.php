<?php 


namespace App;

use database\DataBase;

class Product extends App{


    public function electronic_devices($id){
        $db = new DataBase();
        $mainCategories = $db->select('SELECT * FROM  categories WHERE parent_id IS NULL')->fetchAll();
        $childCategories = $db->select('SELECT * FROM categories')->fetchAll();
        $childCategories2 = $db->select('SELECT * FROM categories')->fetchAll();

        $children = $db->select('SELECT * FROM categories WHERE parent_id = ?' , [$id]);
        dd($children);
        $grandChildren = $db->select('SELECT * FROM categories WHERE parent_id = ?' , [$children['id']]);
        $electronic_devices_products = $db->select('SELECT * FROM products WHERE category_id = ?' , [$grandChildren['id']]);



    }


}





?>