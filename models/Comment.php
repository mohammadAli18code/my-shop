<?php

namespace models;

use database\DataBase;
use PDO;

class Comment
{

    private $comment_model;


    public function __construct($pdo){
        $this->comment_model = $pdo;
    }



    public function getAllComments(){
        $results = $this->comment_model->select('SELECT comments.* , customers.first_name , customers.last_name , products.title FROM comments
        LEFT JOIN customers ON comments.customer_id = customers.id
        LEFT JOIN products ON comments.product_id = products.id ')->fetchAll();
        return $results;
    }

    public function commentUpdate($id , $request){
        $update = $this->comment_model->update('comments' , $id , array_keys($request) , $request);
        return $update;
    }


    public function commentDelete($id){
        $delete = $this->comment_model->delete('comments' , $id);
        return $delete;
    }


    public function getCommentsByProductId($id){
        $results = $this->comment_model->select('SELECT co.* , cu.first_name , cu.last_name FROM comments co JOIN customers cu ON cu.id = co.customer_id WHERE co.product_id = ? AND co.status = ? GROUP BY co.customer_id' , [$id , 'approved'])->fetchAll();
        return $results;
    }

    public function getCommentsCount($id){
        $results = $this->comment_model->select('SELECT COUNT(product_id) AS comment_count FROM comments WHERE product_id = ? AND status = ?', [$id , 'approved'])->fetch();
        return $results;
    }
}


?>