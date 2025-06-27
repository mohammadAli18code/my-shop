<?php

namespace Admin;

use database\DataBase;

class MessageController extends AdminController{


    public function index(){
        $db = new DataBase();
        $messages = $db->select('SELECT * FROM contact_messages')->fetchAll();
        require_once(BASE_PATH . '/template/panel/messages/index.php');
    }

    public function details($message_id){

        $db = new DataBase();
        $details = $db->select('SELECT * FROM contact_messages WHERE id = ?' , [$message_id])->fetch();
        // dd($details);
        require_once(BASE_PATH . '/template/panel/messages/message-details.php');

    }
    public function toAnswer($request , $message_id){
        $db = new DataBase();
        // dd($request);
        $details = $db->select('SELECT * FROM contact_messages WHERE id = ?' , [$message_id])->fetch();
        if($details['answer'] == null)
        {
            $db->update('contact_messages' , $message_id , ['answer' , 'status'] , [$request['answer'] , 3]);
            //ارسال متن پاسخ به کاربر مربوطه
            flash('sending_answer' , 'پاسخ شما با موفقیت ثبت شد و به ایمیل کاربر مربوطه ارسال شد');
            $this->redirectBack();
        }else{
            flash('sending_answer_alert' , 'این پیام قبلا پاسخ داده شده است!');
            $this->redirectBack();
        }
        $this->redirectBack();


    }


}