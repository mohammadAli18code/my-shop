<?php

namespace Admin;

use database\DataBase;
use models\Discount;


class DiscountController extends AdminController{

    private $discount_model;


    public function __construct(){
        $pdo = new DataBase();
        $this->discount_model = new Discount($pdo);
    }



    public function index()
    {
        $db = new DataBase();
        $discounts = $db->select('SELECT discounts.* , (SELECT COUNT(*) FROM orders WHERE orders.product_id = discounts.product_id AND orders.status = ?) AS count FROM discounts ' , ['completed'])->fetchAll();
        // $discounts = $db->select('SELECT * FROM discounts')->fetchAll();
        // dd($discounts);
        require_once(BASE_PATH . '/template/panel/discounts/index.php');
    }

    public function create($request)
    {
        // dd($request);
        $db = new DataBase();
        if(!isset($request['product_id']) || $request['product_id'] == '' || 
        !isset($request['discount_percentage']) || $request['discount_percentage'] == '' ||
        !isset($request['start_at']) || $request['start_at'] == ''
        ){
            flash('create_discount_alert' , 'لطفا همه موارد را تکمیل نمایید("عنوان تخفیف" و "زمان پایان الزامی نیست")');
            $this->redirectBack();
        }
        $product = $db->select('SELECT * FROM products WHERE id = ?' ,[$request['product_id']])->fetch();
        $discount = $db->select('SELECT * FROM discounts WHERE product_id = ?' ,[$request['product_id']])->fetch();
        if($product != false){
            if($discount == false)
            {
                $request['discount_amount'] = ($product['price'] / 100) * $request['discount_percentage'];
                // dd($request);
                //insert
                $insert = $db->insert('discounts' , array_keys($request) , $request);
                if($insert)
                {
                    flash('create_discount_alert_successfully' , 'تخفیف مورد نطر با موفقیت انجام شد و در تاریخ مد نظر اعمال خواهد شد');
                    $this->redirectBack();
                }
            }else
            {
                flash('create_discount_alert' , 'برای محصول مورد نظر قبلا تخفیف اعمال شده است!');
                $this->redirectBack();
            }

        }

        $this->redirectBack();
    }


    public function edit($discount_id)
    {
        $db = new DataBase();
        $discount_info = $db->select('SELECT * FROM discounts WHERE id = ?' , [$discount_id])->fetch();
        require_once(BASE_PATH . '/template/panel/discounts/edit.php');
    }

    public function update($request , $discount_id)
    {
        $db = new DataBase();

        // dd($request);
        $discount = $db->select('SELECT * FROM discounts WHERE id = ?' , [$discount_id])->fetch();

        if($discount != false)
        {
            // dd($discount);
            if($discount['discount_amount'] != $request['discount_amount'] && $discount['discount_percentage'] != $request['discount_percentage'])
            {
                flash('update_discount_alert' , ' لطفا یا فقط مقدار تخفیف را تغییر دهید ، یا فقط درصد تخفیف را تغییر دهید! </br> با تغییر یکی از این موارد ، مورد دیگری به صورت خودکار تغییر میکند');
                $this->redirectBack();
            }
            $product_price = $db->select('SELECT price FROM products WHERE id = ?' , [$discount['product_id']])->fetch();
                if($request['discount_amount'] != $discount['discount_amount'])
                {
                    // dd($product_price);
                    if($product_price != false)
                    {
                        $request['discount_percentage'] = 100 / ($product_price['price'] / $request['discount_amount']);
                        // dd($request['discount_percentage']);
                    }
                }
                else if($request['discount_percentage'] != $discount['discount_percentage'])
                {
                    $request['discount_amount'] = ($product_price['price'] / 100) * $request['discount_percentage'];
                    // dd($request['discount_amount']);

                }
            $update = $db->update('discounts' , $discount_id , array_keys($request) , $request);
            if($update == true)
            {
                flash('update_discount_alert_success' , 'ویرایش با موفقیت انجام شد');
                $this->redirectBack();

            }
        }
        $this->redirectBack();
    }

    public function delete($discount_id)
    {
        $db = new DataBase();
        $db->delete('discounts' , $discount_id);
        $this->redirectBack();
    }


}



?>