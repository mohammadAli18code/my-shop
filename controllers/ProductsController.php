<?php

namespace App;

use database\DataBase;
use models\Product;
use models\Category;
use models\Comment;
use models\Home;
use models\Cart;


class ProductsController extends AppController{

    private $product_model;
    private $category_model;
    private $comment_model;
    private $home_model;
    private $cart_model;

    public function __construct()
    {
        $pdo = new DataBase();
        $this->product_model = new Product($pdo);
        $this->category_model = new Category($pdo);
        $this->comment_model = new Comment($pdo);
        $this->home_model = new Home($pdo);
        $this->cart_model = new Cart($pdo);
    }



    

//products :

    public function allProducts()
    {
        $categories = $this->category_model->getCategories();
        $productCountResult = 0;
        $products = $this->product_model->getAllProducts();
        
        $_SESSION['default_products'] = $products;
        $_SESSION['products'] = $products;
        $productCountResult = count($_SESSION['products']);
        $title = flash('title' , 'همه محصولات');
        $title = flash('title');
        // dd(flash('title'));
        require_once(BASE_PATH . '/views/app/products/allProducts.php');
    }


    public function products($category_id)
    {
        // dd('hi');
        $products = 0;
        $categories = $this->category_model->getCategories();
        $brands = $this->category_model->getCategoryByParentId([$category_id]);
        // dd($brands);
        $productCountResult = 0;
        //
        $parent_id = $this->category_model->getParentId($category_id);

        if($parent_id['parent_id'] != null)
        {
            // dd('hi1');
            $productCountResult = $this->product_model->getCountOfProductsByCategoryId($category_id);
            $products = $this->product_model->getProductsByCategoryId($category_id);
        }
        else if($parent_id['parent_id'] == null)
        {
            $productCountResult = $this->product_model->getCountOfProductsByCategoryId($category_id);
            $products = $this->product_model->getProductsByParentOfCategoryId($category_id);
        }

        $_SESSION['default_products'] = $products;
        $_SESSION['products'] = $products;
        // dd($products);
        require_once(BASE_PATH . '/views/app/products/products.php');

    }


    public function productsSort()
    {
        // dd($_GET);
        $products = [];
        $categories = $this->category_model->getCategories();
        $productCountResult['product_count'] = 0;
        $sort = 0;
        //
        if(isset($_GET['sort']))
        {
        $sort = $_GET['sort'];
        unset($_GET['sort']);
        }
        //
            if(isset($_SESSION['products']))
            {
                $productCountResult['product_count'] = count($_SESSION['products']);
                switch ($sort) {
                    case '0':
                        if(isset($_SESSION['default_products']))
                        {
                            $products = $_SESSION['default_products'];
                        }else
                        {
                            $products = $_SESSION['products'];
                        }
                        break;
                        //
                        case 'cheap':
                            usort($_SESSION['products'], function($a, $b) {
                                return $a['price'] <=> $b['price'];
                            });
                            $products = $_SESSION['products'];
                            // dd($products);
                            break;
                            //
                            case 'expensive':
                                usort($_SESSION['products'], function($a, $b) {
                                    return $b['price'] <=> $a['price'];
                                });                                    
                                // dd($products);
                            $products = $_SESSION['products'];
                                break;
                                //
                                case 'most_discount':
                                    usort($_SESSION['products'], function($a, $b) {
                                        return $b['discount_percentage'] <=> $a['discount_percentage'];
                                    });
                                    $products = $_SESSION['products'];
                                    // dd($products);
                                    break;
                                    //
                                    case 'most_sold':
                                        usort($_SESSION['products'], function($a, $b) {
                                            return $a['price'] <=> $b['price'];
                                        });
                                        $products = $_SESSION['products'];
                                        // dd($products);
                                        break;
                                        //
                    default:
                        $this->redirect('404_error');
                        break;
                }
            // dd($products);

            }

        require_once(BASE_PATH . '/views/app/products/products.php');

    }

    public function productDetails($product_id)
    {
        $checkProductIsFavorite = 0;
        $cart = 0;
        $categories = $this->category_model->getCategories();
        $productInfo = $this->product_model->getProductById($product_id);
        //dd($productInfo);
        $productDiscount = $this->product_model->getDiscountOfProduct($product_id);
        //dd($productDiscount);
        $product_colors = $this->product_model->getProductColors($product_id);


        //
        $comments = $this->comment_model->getCommentsByProductId($product_id);
        $comment_count = $this->comment_model->getCommentsCount($product_id);
        $category = $this->category_model->getCategoryNameOfProduct($productInfo[0]['category_id']);
        $product_images = $this->product_model->getProductImages($product_id);

        if(isset($_SESSION['customerInfo']['id']))
        {
            $cart = $this->cart_model->getCartInfo($product_id , $_SESSION['customerInfo']['id']);
            $checkProductIsFavorite = $this->product_model->checkProductIsFavorite($product_id);
        }
        require_once(BASE_PATH. '/views/app/products/product-details.php');
    }




    public function filter()
    {
        // دریافت برندهای مربوط به دسته‌بندی‌های انتخاب‌شده
        $categories = $this->category_model->getCategoryByParentId([82 , 83]);
    // dd($categories);
        if (!$categories) {
            echo json_encode(['error' => 'هیچ دسته‌بندی یافت نشد']);
            return;
        }
    
        // ساخت خروجی HTML برای برندها
        // $output = "";
        // foreach ($categories as $category) {
        //     $output .= '
        //     <li>
        //         <div class="flex w-full items-center gap-x-2 pr-4 bg-gray-50 rounded-md">
        //             <input id="brand-'.$category['id'].'" type="checkbox" value="'.$category['id'].'" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
        //             <label for="brand-'.$category['id'].'" class="flex w-full cursor-pointer items-center justify-between py-2 pl-4 font-medium text-zinc-600">
        //                 <span>'.$category['name'].'</span>
        //                 <span>'.$category['name'].'</span>
        //             </label>
        //         </div>
        //     </li>';
        // }
    
        // ارسال خروجی به Ajax
        header('Content-Type: application/json');
        echo json_encode(['brands' => $categories]);
    }
    
    


















    // public function electronic_devices($id){
    //     $db = new DataBase();
    //     $mainCategories = $db->select('SELECT * FROM  categories WHERE parent_id IS NULL')->fetchAll();
    //     $childCategories = $db->select('SELECT * FROM categories')->fetchAll();
    //     $childCategories2 = $db->select('SELECT * FROM categories')->fetchAll();

    //     $children = $db->select('SELECT * FROM categories WHERE parent_id = ?' , [$id]);
    //     dd($children);
    //     $grandChildren = $db->select('SELECT * FROM categories WHERE parent_id = ?' , [$children['id']]);
    //     $electronic_devices_products = $db->select('SELECT * FROM products WHERE category_id = ?' , [$grandChildren['id']]);



    // }


}





?>