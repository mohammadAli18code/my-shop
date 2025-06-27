<?php

//session start
session_start();
// ob_start();

// use Auth\Auth;
// use App\App;


define('BASE_PATH' , __DIR__);

// dd($_COOKIE);
// dd($_SESSION['customer_id']);
// dd($_SESSION['customerInfo']);



//helpers
require_once 'config/functions.php';

//config
require_once 'config/server.php';

//mail
require_once 'config/mail.php';

//database
require_once 'config/database/DataBase.php';



//admin
require_once 'controllers/AdminController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/CommentController.php';
require_once 'controllers/DiscountController.php';
require_once 'controllers/TransactionController.php';
require_once 'controllers/MessageController.php';

//auth
require_once 'Controllers/AuthController.php';

//app
require_once 'Controllers/AppController.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/ProductsController.php';
require_once 'Controllers/ProductAdminController.php';
require_once 'Controllers/CartController.php';
require_once 'Controllers/CheckoutController.php';
require_once 'Controllers/ClientController.php';


// $auth = new AuthController();
// $auth->sendMail('mohammad18test@gmail.com', 'تست', '<p>test</p>');










spl_autoload_register(function ($className) {
    $basePath = BASE_PATH;
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = $basePath . DIRECTORY_SEPARATOR . $className . '.php';

    if (file_exists($file)) {
        include_once $file;
    } else {
        throw new Exception("File {$file} not found for class {$className}");
    }
});



//cookies 

// if(isset($_SESSION['customer_id']) || isset($_COOKIE['customer_id']))
// {
//     $cookieName = "customer_id"; // نام کوکی
//     $cookieValue = 0;
//     if(isset($_SESSION['customer_id']))
//     {
//         $cookieValue = $_SESSION['customer_id'];   // مقدار کوکی
//         unset($_SESSION['customer_id']);
//     }
//     if(isset($_COOKIE['customer_id']))
//     {
//         $cookieValue = $_COOKIE['customer_id'];   // مقدار کوکی
//     }
//     $cookieExpire = time() + (60 * 60); // تاریخ انقضای 30 روز به ثانیه
//     // ست کردن کوکی
//     setcookie($cookieName, $cookieValue, $cookieExpire, "/"); // مسیر "/" یعنی کوکی برای تمام صفحات سایت معتبر است
// }

// $app = new AppController();
// $app->getCustomerInfo();
// $app->getCustomerCartInfo();
// کوکی سبد خرید :

// function cartCookie()
// {
//     $cartCookieName = 'shopping_cart';
//     if(isset($_SESSION['product_id']))
//     {
//         if (isset($_COOKIE[$cartCookieName]))
//         {
//             // اگر کوکی وجود دارد، آن را به آرایه تبدیل کنید
//             $_SESSION['cart'] = json_decode($_COOKIE[$cartCookieName], true);
//         } else {
//             // اگر کوکی وجود ندارد، یک آرایه خالی ایجاد کنید
//             $_SESSION['cart'] = [];
//         }
//         // فرض کنید کاربر یک محصول با id = 1 را به سبد خرید اضافه کرده است
//         $productId = $_SESSION['product_id'];
//         // dd($productId);
//         // افزودن محصول به آرایه سبد خرید
//         if (!in_array($productId, $_SESSION['cart']) && $productId != -1)
//         {
//             $_SESSION['cart'][] = $productId;
//             unset($_SESSION['product_id']);
//         }else{
//             $array = array_diff($array, [3]); // حذف عدد 3
//             $array = array_values($array); // بازنشانی ایندکس‌ها
//         }
//     }
//     // به‌روزرسانی کوکی
//     setcookie($cartCookieName, json_encode($_SESSION['cart']), time() + (86400 * 30), "/"); // 86400 = 1 روز
// }
// cartCookie();



//uri
require_once 'config/router.php';


//uri addresses:
require_once 'routes/web.php';


?>