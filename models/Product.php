<?php

namespace models;

use database\DataBase;
use PDO;

class Product
{

    private $product_model;


    public function __construct($pdo){
        $this->product_model = $pdo;
    }


    public function productInsert($request){
        $insert = $this->product_model->insert('products' , array_keys($request) , $request);
        return $insert;
    }

    public function attributeInsert($product_id , $attribute_name , $attribute_value){
        $insert = $this->product_model->insert('product_attributes' , ['product_id' , 'name' , 'value'] , [$product_id['id'] , $attribute_name , $attribute_value]);
        return $insert;
    }

    public function imageInsert($product_id , $image_address){
        $insert = $this->product_model->insert('product_images' , ['product_id' , 'url'] , [$product_id['id'] , $image_address]);
        return $insert;
    }

    public function productUpdate($id , $request){
        $update = $this->product_model->update('products' , $id , array_keys($request) , $request);
        return $update;
    }

    public function updateProductPriceByExternalId($externalId, $newPrice)
    {
        // $results = $this->product_model->update('products' , $externalId , ['price' , 'last_synced_at'] , [$newPrice , NOW()]);
        $sql = "UPDATE products SET price = :price, last_synced_at = NOW() WHERE external_id = :external_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':price', $newPrice);
        $stmt->bindParam(':external_id', $externalId);
        $stmt->execute();
    }


    public function productDelete($id){
        $delete = $this->product_model->delete('products' , $id);
        return $delete;
    }

    public function getLatestProduct(){
        $result = $this->product_model->select('SELECT * FROM products ORDER BY id DESC LIMIT 1')->fetch();
        return $result;
    }

    public function productsBySearch($request){
       $results = $this->product_model->select('SELECT
        i.url , p.* , COUNT(c.product_id) AS comment_count , c1.name AS category_name, 
        c2.name AS parent_name FROM products AS p
        LEFT JOIN comments c ON p.id = c.product_id 
        LEFT JOIN categories c1 ON p.category_id = c1.id 
        LEFT JOIN categories c2 ON c1.parent_id = c2.id 
        LEFT JOIN product_images i ON p.id = i.product_id
        WHERE 1=1
        AND (p.id = ? OR ? IS NULL)
        AND (p.title LIKE ? OR ? IS NULL)
        AND (p.price BETWEEN ? AND ? OR ( ? IS NULL AND ? IS NULL))
        AND (p.category_id = ? OR ? IS NULL) 
        AND (c1.parent_id = ? OR ? IS NULL) 
        GROUP BY p.id' , [ 
        $request['id'] , $request['id'] ,
        '%' . $request['title'] . '%' , $request['title'] , 
        $request['minPrice'] , $request['maxPrice'] , $request['minPrice'] , $request['maxPrice'] ,
        $request['category_id'] , $request['category_id'] ,
        $parent_id['parent_id'], $parent_id['parent_id']])->fetchAll();

    }


    public function getProductAttributes($id){
        $results = $this->product_model->select('SELECT * FROM product_attributes WHERE product_id = ?' , [$id])->fetchAll();
        return $results;
    }


    public function getAllProducts(){

        $results = $this->product_model->select('SELECT 
        p.* , 
        COUNT(c.product_id) AS comment_count , 
        c1.name AS category_name, 
        c2.name AS parent_name ,
        p.id AS product_id ,
        p_i.url AS image ,
        d.discount_amount ,
        d.discount_percentage 
        FROM products AS p
        LEFT JOIN comments c ON p.id = c.product_id 
        LEFT JOIN categories c1 ON p.category_id = c1.id 
        LEFT JOIN categories c2 ON c1.parent_id = c2.id 
        LEFT JOIN product_images p_i ON p.id = p_i.product_id 
        LEFT JOIN discounts d ON p.id = d.product_id 
        GROUP BY p.id ')->fetchAll();


        // $results = $this->product_model->select('SELECT
        //  p.* ,
        //   p.id AS product_id ,
        //    p_i.url AS image ,
        //     d.discount_amount ,
        //      d.discount_percentage 
        //   FROM products p 
        //   LEFT JOIN product_images p_i ON p.id = p_i.product_id 
        //   LEFT JOIN discounts d ON p.id = d.product_id 
        //   WHERE p.status = ? GROUP BY p.id' , ['approved'])->fetchAll();
        return $results;
    }

    public function getProductById($id){
        $results = $this->product_model->select('SELECT p.* , p.id , a.value , a.name  FROM products p JOIN product_attributes a ON a.product_id = p.id WHERE p.id = ?' , [$id])->fetchAll();
        return $results;
    }

    public function getDiscountOfProduct($id){
        $results = $this->product_model->select('SELECT * FROM discounts WHERE product_id = ?' , [$id])->fetchAll();
        return $results;
    }

    public function timeFeeProducts()
    {
        $results = $this->product_model->select('SELECT p.* , p.title AS product_title , d.* , p_i.url AS image FROM discounts d LEFT JOIN products p ON d.product_id = p.id LEFT JOIN product_images p_i ON d.product_id = p_i.product_id WHERE d.expire_at IS NOT NULL GROUP BY d.product_id')->fetchAll();
        return $results;
    }


    public function popularProducts()
    {
       $results = $this->product_model->select('SELECT p.* , p.id AS product_id , COUNT(f.product_id) AS FavoriteCount , p_i.url AS image , d.discount_amount , d.discount_percentage FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id LEFT JOIN discounts d ON p.id = d.product_id LEFT JOIN favorites f ON p.id = f.product_id WHERE p.status = ? GROUP BY p.id ORDER BY FavoriteCount DESC' , ['approved'])->fetchAll();  
       return $results;      
    }

    public function newestProducts()
    {
        $results = $this->product_model->select('SELECT p.* , p_i.url AS image , d.discount_amount , d.discount_percentage FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id LEFT JOIN discounts d ON p.id = d.product_id WHERE p.status = ? GROUP BY p.id ORDER BY created_at DESC LIMIT 8' , ['approved'])->fetchAll();
        return $results;      
    }

    public function wonderFullProducts()
    {
        $results = $this->product_model->select('SELECT p.* , p.id AS product_id , p_i.url AS image , d.discount_amount , d.discount_percentage FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id LEFT JOIN discounts d ON p.id = d.product_id WHERE p.status = ? AND d.discount_percentage != 0 GROUP BY p.id ORDER BY d.discount_percentage DESC' , ['approved'])->fetchAll();
        return $results;      
    }


    public function getCountOfProductsByCategoryId($id){
        $result = $this->product_model->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id = ? AND status = ?' , [$id , 'approved'])->fetch();
        return $result;
    }


    public function getProductsByCategoryId($id){
        $results = $this->product_model->select('SELECT p.* , p.id AS product_id , p_i.url AS image , d.discount_amount , d.discount_percentage FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id LEFT JOIN discounts d ON p.id = d.product_id WHERE p.category_id = ? AND p.status = ? GROUP BY p.id' , [$id , 'approved'])->fetchAll();
        return $results;
    }


    public function getProductsByParentOfCategoryId($id){
        $results = $this->product_model->select('SELECT p.* , p.id AS product_id , d.discount_amount , d.discount_percentage , c.id , c.parent_id , p_i.url AS image FROM categories c LEFT JOIN products p ON p.category_id = c.id LEFT JOIN product_images p_i ON p.id = p_i.product_id LEFT JOIN discounts d ON p.id = d.product_id WHERE c.parent_id = ? AND p.status = ? GROUP BY p.id' , [$id , 'approved'])->fetchAll();
        return $results;
    }

    public function getProductColors($id){
        $results = $this->product_model->select('SELECT value FROM product_attributes WHERE product_id = ? AND type = ?' , [$id , 'رنگ'])->fetchAll();
        return $results;
    }

    public function getProductImages($id){
        $results = $this->product_model->select('SELECT * FROM product_images WHERE product_id = ?' , [$id])->fetchAll();
        return $results;
    }

    public function checkProductIsFavorite($product_id){
        $results = $this->product_model->select('SELECT id FROM favorites WHERE product_id = ? AND customer_id = ?' , [$product_id , $_SESSION['customerInfo']['id']])->fetch();
        return $results;
    }
}  



?>