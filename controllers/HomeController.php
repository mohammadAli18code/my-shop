<?php

namespace App;

use database\DataBase;
use models\Home;
use models\Product;
use models\Category;


class HomeController extends AppController{


    private $home_model;
    private $product_model;
    private $category_model;

    public function __construct()
    {
        $pdo = new DataBase();
        $this->home_model = new Home($pdo);
        $this->product_model = new Product($pdo);
        $this->category_model = new Category($pdo);
    }

    public function Error_404()
    {
        $categories = $this->home_model->getCategories();
        require_once(BASE_PATH . '/404.php');
    }

    public function welcome()
    {
        $app = new AppController();
        $app->getCustomerInfo();
        $app->getCustomerCartInfo();
        require_once(BASE_PATH . '/views/app/welcome.php');
    }

    public function index()
    {
        // dd($_COOKIE);
        $banners = $this->home_model->getBanners();
        $categories = $this->category_model->getCategories();
        $products = $this->product_model->timeFeeProducts();
        $favorite_products = $this->product_model->popularProducts();
        $newest_products = $this->product_model->newestProducts();
        $mainCategories = $this->category_model->mainCategories();
        require_once(BASE_PATH . '/views/app/index.php');
    }

    public function searchBox()
    {
        $db = new Database();
        //
        $categories = $this->category_model->getCategories();
        //
        $productCountResult['product_count'] = 0;
        //
        $products = 0;
        //
        if(!empty($_GET['search']))
        {
            $products = $db->select('SELECT p.* , p.id AS product_id , p_i.url AS image , d.discount_amount , d.discount_percentage FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id LEFT JOIN discounts d ON p.id = d.product_id WHERE p.title LIKE ? AND p.status = ? GROUP BY p.id' , [ '%' . $_GET['search'] . '%' , 'approved'])->fetchAll();
        }else
        {
            // dd('hi');
            $products = 0;
        }
        // dd($products);
        if($products != 0)
        {
            if(!empty($products))
            {
                $_SESSION['default_products'] = $products;
                $_SESSION['products'] = $products;
                $productCountResult['product_count'] = count($_SESSION['products']);
            }else
            {
                flash('search_bar' , 'موردی پیدا نشد!');
            }
        }else
        {
            flash('search_bar' , 'موردی پیدا نشد!');
        }

        require_once(BASE_PATH . '/views/app/search.php');
        //
    }

    public function wonderFullProducts()
    {
        $categories = $this->category_model->getCategories();
        $productCountResult['product_count'] = 0;
        $products = $this->product_model->wonderFullProducts();

        if(!empty($products))
        {
            $_SESSION['default_products'] = $products;
            $_SESSION['products'] = $products;
            $productCountResult['product_count'] = count($_SESSION['products']);
        }else
        {
            flash('search_bar' , 'موردی پیدا نشد!');
        }

        require_once(BASE_PATH . '/views/app/incredible-offers.php');
    }


    public function time_limited_discounts()
    {
        $categories = $this->home_model->getCategories();
        $products = $this->home_model->timeFeeProducts();
        $_SESSION['products'] = $products;
        $productCountResult['product_count'] = count($_SESSION['products']);

        require_once(BASE_PATH . '/views/app/time-limited-discounts.php');
    }

    
    public function contactUs()
    {
        $categories = $this->category_model->getCategories();
        require_once(BASE_PATH . '/views/app/contactUs.php');
    }

    public function sendMessage($request)
    {
        // dd($request['phone_number'][1]);
        $db = new DataBase();
        if( isset($request['first_name']) && $request['first_name'] != '' &&
            isset($request['last_name']) && $request['last_name'] != '' &&
            isset($request['phone_number']) && $request['phone_number'] != '' &&
            isset($request['email']) && $request['email'] != '' &&
            isset($request['title']) && $request['title'] != '' &&
            isset($request['message']) && $request['message'] != ''
            ){
                if(strlen($request['phone_number']) < 11 || $request['phone_number'][0] != 0 || $request['phone_number'][1] != 9){
                    flash('sending_message' , 'شماره تلفن معتبر نیست. لطفا شماره تلفن را به صورت صحیح وارد نمایید.');
                    $this->redirectBack();
                }
                //insert
                $db->insert('contact_messages' , array_keys($request) , $request);
                flash('sending_message_done' , 'پیام شما با موفقیت ارسال شد. همکاران ما در سریع ترین زمان ممکن به پیام شما پاسخ خواهند داد. متشکر از شما.');
                $this->redirectBack();
        }else{
            flash('sending_message' , 'لطفا همه موارد را تکمیل نمایید');
            $this->redirectBack();
        }
        $this->redirectBack();
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//feedback :

        public function addComment($request , $product_id)
        {
            // dd($request);
            $db = new DataBase();
            if(isset($_SESSION['customerInfo']))
            {
                $title = $request['title'];
                $comment = $request['comment'];
                $insert = $db->insert('comments' , ['customer_id' , 'product_id' , 'title' , 'comment'] , [$_SESSION['customerInfo']['id'] , $product_id , $title , $comment]);
                flash('add_comment' , 'نظر شما با موفقیت ثبت شد و در حال بررسی است');
                $this->redirectBack();
            }else
            {
                flash('login' , 'لطفا ابتدا وارد حساب کاربری خود شوید');
                $this->redirectBack();
            }
            $this->redirectBack();
        }
        
        public function addPositive($comment_id)
        {
            $db = new dataBase();
            $comment = $db->select('SELECT comment , positive_feedback FROM comments WHERE id = ?' , [$comment_id])->fetch();
            if($comment != null)
            {
                $count = $comment['positive_feedback'];
                $count++;
                $db->update('comments' , $comment_id , ['positive_feedback'] , [$count]);
                $this->redirectBack();
            }
            $this->redirectBack();
        }
        public function addNegative($comment_id)
        {
            $db = new dataBase();
            $comment = $db->select('SELECT comment , negative_feedback FROM comments WHERE id = ?' , [$comment_id])->fetch();
            if($comment != null)
            {
                $count = $comment['negative_feedback'];
                $count++;
                $db->update('comments' , $comment_id , ['negative_feedback'] , [$count]);
                $this->redirectBack();
            }
            $this->redirectBack();
        }

        public function addFavorite($product_id)
        {
            $db = new dataBase();
            // dd('hi');
            if(isset($_SESSION['customerInfo']))
            {
            $isFavorite = $db->select('SELECT id FROM favorites WHERE product_id = ? AND customer_id = ?' , [$product_id , $_SESSION['customerInfo']['id']])->fetch();
                if($isFavorite == null){
                    $add_favorite = $db->insert('favorites' , ['product_id' , 'customer_id'] , [$product_id , $_SESSION['customerInfo']['id']]);
                    if($add_favorite == true)
                    {
                    flash('add_favorite' , 'محصول با موفقیت به علاقه مندی های شما اضافه شد');
                    }
                }else{
                    $id = $isFavorite['id'];
                    $delete = $db->delete('favorites' , $id);
                    if($delete == true)
                    {
                    flash('add_favorite' , 'محصول با موفقیت از لیست علاقه مندی های شما حذف شد');
                    }
                }
                $this->redirectBack();
            }else{
                flash('login' , 'لطفا ابتدا وارد شوید');
                $this->redirectBack();
            }
        }

}

// public function products($category_id)
//         {
//             $db = new Database();
//             //
//             $products = 0;
//             $categories = $db->select('SELECT * FROM categories')->fetchAll();
//             $productCountResult = 0;
//             $sort = 0;
//             //
//             if(isset($_GET['sort']))
//             {
//             $sort = $_GET['sort'];
//             unset($_GET['sort']);
//             }
//             //
//             switch ($sort) {
//                 case '0':
//                     $parent_id = $db->select('SELECT parent_id FROM categories WHERE id = ?' , [$category_id])->fetch();

//                     if($parent_id['parent_id'] != null)
//                     {
//                     $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id = ? AND status = ?' , [$category_id , 'approved'])->fetch();
//                     $products = $db->select('SELECT p.* , p.id AS product_id , p_i.url AS image FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE p.category_id = ? AND p.status = ? GROUP BY p.id' , [$category_id , 'approved'])->fetchAll();
//                     }
//                     else if($parent_id['parent_id'] == null)
//                     {
//                     $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id IN (SELECT id FROM categories WHERE parent_id = ?) AND status = ?' , [$category_id , 'approved'])->fetch();
//                     $products = $db->select('SELECT p.* , p.id AS product_id , c.id , c.parent_id , p_i.url AS image FROM categories c LEFT JOIN products p ON p.category_id = c.id LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE c.parent_id = ? AND p.status = ? GROUP BY p.id' , [$category_id , 'approved'])->fetchAll();
//                     }
                    
//                     break;
//                     //
//                     case 'cheap':
//                         $parent_id = $db->select('SELECT parent_id FROM categories WHERE id = ?' , [$category_id])->fetch();

//                         if($parent_id['parent_id'] != null)
//                         {
//                         $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id = ? AND status = ?' , [$category_id , 'approved'])->fetch();
//                         $products = $db->select('SELECT p.* , p.id AS product_id , p_i.url AS image FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE p.category_id = ? AND p.status = ? GROUP BY p.id ORDER BY p.price ASC' , [$category_id , 'approved'])->fetchAll();
//                         }
//                         else if($parent_id['parent_id'] == null)
//                         {
//                         $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id IN (SELECT id FROM categories WHERE parent_id = ?) AND status = ?' , [$category_id , 'approved'])->fetch();
//                         $products = $db->select('SELECT p.* , p.id AS product_id , c.id , c.parent_id , p_i.url AS image FROM categories c LEFT JOIN products p ON p.category_id = c.id LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE c.parent_id = ? AND p.status = ? GROUP BY p.id ORDER BY p.price ASC' , [$category_id , 'approved'])->fetchAll();
//                         }
                        
//                         break;
//                         //
//                         case 'expensive':
//                             $parent_id = $db->select('SELECT parent_id FROM categories WHERE id = ?' , [$category_id])->fetch();

//                             if($parent_id['parent_id'] != null)
//                             {
//                             $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id = ? AND status = ?' , [$category_id , 'approved'])->fetch();
//                             $products = $db->select('SELECT p.* , p.id AS product_id , p_i.url AS image FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE p.category_id = ? GROUP BY p.id ORDER BY p.price DESC' , [$category_id , 'approved'])->fetchAll();
//                             }
//                             else if($parent_id['parent_id'] == null)
//                             {
//                             $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id IN (SELECT id FROM categories WHERE parent_id = ?) AND status = ?' , [$category_id , 'approved'])->fetch();
//                             $products = $db->select('SELECT p.* , p.id AS product_id , c.id , c.parent_id , p_i.url AS image FROM categories c LEFT JOIN products p ON p.category_id = c.id LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE c.parent_id = ? GROUP BY p.id ORDER BY p.price DESC' , [$category_id , 'approved'])->fetchAll();
//                             }
                            
//                             break;
//                             //
//                             case 'popular':
//                                 $parent_id = $db->select('SELECT parent_id FROM categories WHERE id = ?' , [$category_id])->fetch();

//                                 if($parent_id['parent_id'] != null)
//                                 {
//                                 $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id = ? AND status = ?' , [$category_id , 'approved'])->fetch();
//                                 $products = $db->select('SELECT p.* , p.id AS product_id , p_i.url AS image FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE p.category_id = ? AND p.status = ? GROUP BY p.id' , [$category_id  , 'approved'])->fetchAll();
//                                 }
//                                 else if($parent_id['parent_id'] == null)
//                                 {
//                                 $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id IN (SELECT id FROM categories WHERE parent_id = ?) AND status = ?' , [$category_id , 'approved'])->fetch();
//                                 $products = $db->select('SELECT p.* , p.id AS product_id , c.id , c.parent_id , p_i.url AS image FROM categories c LEFT JOIN products p ON p.category_id = c.id LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE c.parent_id = ? AND p.status = ? GROUP BY p.id' , [$category_id  , 'approved'])->fetchAll();
//                                 }
                                
//                                 break;
//                                 //
//                                 case 'most_sold':
//                                     $parent_id = $db->select('SELECT parent_id FROM categories WHERE id = ?' , [$category_id])->fetch();

//                                     if($parent_id['parent_id'] != null)
//                                     {
//                                     $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id = ? AND status = ?' , [$category_id , 'approved'])->fetch();
//                                     $products = $db->select('SELECT p.* , p.id AS product_id , p_i.url AS image FROM products p LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE p.category_id = ? AND p.status = ? GROUP BY p.id' , [$category_id  , 'approved'])->fetchAll();
//                                     }
//                                     else if($parent_id['parent_id'] == null)
//                                     {
//                                     $productCountResult = $db->select('SELECT COUNT(*) AS product_count FROM products WHERE category_id IN (SELECT id FROM categories WHERE parent_id = ?) AND status = ?' , [$category_id , 'approved'])->fetch();
//                                     $products = $db->select('SELECT p.* , p.id AS product_id , c.id , c.parent_id , p_i.url AS image FROM categories c LEFT JOIN products p ON p.category_id = c.id LEFT JOIN product_images p_i ON p.id = p_i.product_id WHERE c.parent_id = ? AND p.status = ? GROUP BY p.id' , [$category_id  , 'approved'])->fetchAll();
//                                     }
                    
//                                     break;
//                                     //
//                 default:
//                     $this->redirect('404_error');
//                     break;
//             }
//             $_SESSION['products'] = $products;
//             // dd($_SESSION['products']);
//             require_once(BASE_PATH . '/template/app/products/products.php');

//         } 

?>



