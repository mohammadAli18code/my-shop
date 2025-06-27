<?php

namespace Admin;

use database\DataBase;
use models\Comment;


class CommentController extends AdminController{

    private $comment_model;


    public function __construct(){
        $pdo = new DataBase();
        $this->comment_model = new Comment($pdo);
    }



    public function index()
    {
        $comments = $this->comment_model->getAllComments();
        require_once(BASE_PATH . '/views/panel/comments/index.php');
    }

    public function delete($id)
    {

        $this->comment_model->commentDelete();
        $this->redirectBack();

    }

    public function toActive($id)
    {
        $comment['status'] = ['approved'];
        $this->comment_model->commentUpdate($id , $comment);
        $this->redirectBack();
    }

    public function toNotActive($id)
    {
        $comment['status'] = ['seen'];
        $this->comment_model->commentUpdate($id , $comment);
        $this->redirectBack();
    }

}


?>