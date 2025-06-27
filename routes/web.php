<?php

//ادمین بعد از عملیات لاگین حتما باید به این صفحه هدایت شود :
    uri('admin/dashboard'    ,   'Admin\DashboardController'   ,   'index');

//Admin
    //admin-category    
    uri('admin/categories'                      ,   'Admin\CategoryController'    ,   'index');
    uri('category/create'                       ,   'Admin\CategoryController'    ,   'create' , 'POST');
    uri('admin/category/delete/{id}'            ,   'Admin\CategoryController'    ,   'delete');
    uri('admin/category/edit/{id}'              ,   'Admin\CategoryController'    ,   'edit');
    uri('admin/category/update/{category_id}'   ,   'Admin\CategoryController'    ,   'update' , 'POST');
    
    //admin-users    
    uri('admin/users/all'                       ,   'Admin\UserController'   ,  'index');
    uri('admin/users/admins'                    ,   'Admin\UserController'   ,  'admins');
    uri('admin/users/customers'                 ,   'Admin\UserController'   ,  'customers');
    uri('admin/users/active-customers'          ,   'Admin\UserController'   ,  'a_customers');
    uri('admin/users/not-active-customers'      ,   'Admin\UserController'   ,  'n_a_customers');
    uri('admin/admins/delete/{id}'              ,   'Admin\UserController'   ,  'deleteAdmin');
    uri('admin/customers/delete/{id}'           ,   'Admin\UserController'   ,  'deleteCustomer');
    uri('admin/admins/confirm/{id}'             ,   'Admin\UserController'   ,  'confirmationAdmin');
    uri('admin/customers/confirm/{id}'          ,   'Admin\UserController'   ,  'confirmationCustomer');
    uri('admin/admins/not-confirm/{id}'         ,   'Admin\UserController'   ,  'notConfirmationAdmin');
    uri('admin/customers/not-confirm/{id}'      ,   'Admin\UserController'   ,  'notConfirmationCustomer');
    uri('admin/profile/customer/edit/{id}'      ,   'Admin\UserController'   ,  'editCustomer');
    uri('admin/profile/admin/edit/{id}'         ,   'Admin\UserController'   ,  'editAdmin');
    uri('admin/profile/update/admin/{id}'       ,   'Admin\UserController'   ,  'updateAdmin' , 'POST');
    uri('admin/profile/update/customer/{id}'    ,   'Admin\UserController'   ,  'updateCustomer' , 'POST');
    
    //admin-banners    
    uri('admin/banners'                          ,  'Admin\BannerController'  ,  'index');
    uri('admin/banner/create'                   ,  'Admin\BannerController'  ,  'create');
    uri('admin/banner/store'                    ,  'Admin\BannerController'  ,  'store' , 'POST');
    uri('admin/banner/edit/{id}'                ,  'Admin\BannerController'  ,  'edit');
    uri('admin/banner/update/{id}'              ,  'Admin\BannerController'  ,  'update' , 'POST');
    uri('admin/banner/delete/{id}'              ,  'Admin\BannerController'  ,  'delete');
    uri('admin/banner/active/{id}'              ,  'Admin\BannerController'  ,  'toActive');
    uri('admin/banner/not-active/{id}'          ,  'Admin\BannerController'  ,  'toNotActive');
       
    //admin-comments     
    uri('admin/comments'                        , 'Admin\CommentController'   ,   'index');
    uri('admin/comment/delete/{id}'             , 'Admin\CommentController'   ,   'delete');
    uri('admin/comment/active/{id}'             , 'Admin\CommentController'   ,   'toActive');
    uri('admin/comment/not-active/{id}'         , 'Admin\CommentController'   ,   'toNotActive');
    
    //admin-products    
    uri('admin/products'                        , 'Admin\ProductAdminController'     ,   'index');
    uri('admin/search/product'                  , 'Admin\ProductAdminController'     ,   'searchProduct' , 'POST');
    
    uri('admin/products/create'                 , 'Admin\ProductAdminController'     ,   'create');
    uri('admin/products/store'                  , 'Admin\ProductAdminController'     ,   'store' , 'POST');
    uri('admin/products/edit/{id}'              , 'Admin\ProductAdminController'     ,   'edit');
    uri('admin/products/update/{id}'            , 'Admin\ProductAdminController'     ,   'update' , 'POST');
    uri('admin/products/delete/{id}'            , 'Admin\ProductAdminController'     ,   'delete');
    uri('admin/products/active/{id}'            , 'Admin\ProductAdminController'     ,   'toActive');
    uri('admin/products/not-active/{id}'        , 'Admin\ProductAdminController'     ,   'toNotActive');
    
    //admin-discounts      
    uri('admin/discounts'                       , 'Admin\DiscountController'  ,   'index');
    uri('admin/discounts/create'                , 'Admin\DiscountController'  ,   'create' , 'POST');
    uri('admin/discounts/edit/{discount_id}'    , 'Admin\DiscountController'  ,   'edit');
    uri('admin/discounts/update/{discount_id}'  , 'Admin\DiscountController'  ,   'update' , 'POST');
    uri('admin/discounts/delete/{discount_id}'  , 'Admin\DiscountController'  ,   'delete');
  
    //admin-transactions  
    uri('admin/transactions', 'Admin\TransactionController', 'index');  
  
    //admin-messages  
    uri('admin/messages'                        , 'Admin\MessageController'   ,   'index');
    uri('admin/messages/details/{message_id}'   , 'Admin\MessageController'   ,   'details');
    uri('admin/message/answer/{message_id}'     , 'Admin\MessageController'   ,   'toAnswer' , 'POST');
//end-admin

//clients
    //account
    uri('customer/profile'                            , 'App\ClientController'   ,   'profile');
    uri('customer/profile-orders'                     , 'App\ClientController'   ,   'orders');
    uri('customer/profile-order-details/{order_date}' , 'App\ClientController'   ,   'orderDetails');
    uri('customer/profile-favorites'                  , 'App\ClientController'   ,   'favorites');
    uri('customer/profile-messages'                   , 'App\ClientController'   ,   'messages');
    uri('customer/profile-addresses'                  , 'App\ClientController'   ,   'addresses');
    uri('customer/profile-addresses/edit'             , 'App\ClientController'   ,   'editAddress');
    uri('customer/profile-addresses/update'           , 'App\ClientController'   ,   'updateAddress' , 'POST');
    uri('customer/profile-addresses/delete/{id}'      , 'App\ClientController'   ,   'deleteAddress');
    uri('customer/profile-personal-info'              , 'App\ClientController'   ,   'personalInfo');
    uri('customer/profile/update'                     , 'App\ClientController'   ,   'updateInfo' , 'POST');

    uri('customer/change-info', 'App\Home', 'changeInfo' , 'POST');
//end-clients

//auth
    uri('register'              ,     'Auth\AuthController'    ,    'register');
    uri('register/store'        ,     'Auth\AuthController'    ,    'registerStore' , 'POST');
    uri('login/customer'        ,     'Auth\AuthController'    ,    'customerLogin');
    uri('check-login'           ,     'Auth\AuthController'    ,    'checkLogin' , 'POST');
    uri('login/admin'           ,     'Auth\AuthController'    ,    'adminLogin');
    uri('check-admin'           ,     'Auth\AuthController'    ,    'checkAdmin' , 'POST');

    //logout
    uri('logout'                                      , 'Auth\AuthController'            , 'logout');
//end-auth

//welcome page
    uri('welcome', 'App\HomeController', 'welcome');


//app
    //main
    uri('main'                    ,   'App\HomeController'   ,   'index');
    uri('/'                       ,   'App\HomeController'   ,   'index');
    uri('contact-us'              ,   'App\HomeController'   ,   'contactUs');
    uri('contact-us/sendMessage'  ,   'App\HomeController'   ,   'sendMessage' , 'POST');

    //products  
    uri('products'                                                ,   'App\ProductsController'   ,   'allProducts');
    uri('product/{category_id}'                                   ,   'App\ProductsController'   ,   'products');
    uri('product/details/{product_id}'                            ,   'App\ProductsController'   ,   'productDetails');
    uri('product/add-comment/{product_id}'                        ,   'App\ProductsController'   ,   'addComment' , 'POST');
    uri('product/details/comments/add-positive/{comment_id}'      ,   'App\ProductsController'   ,   'addPositive');
    uri('product/details/comments/add-negative/{comment_id}'      ,   'App\ProductsController'   ,   'addNegative');
    uri('product/details/product/add-favorite/{product_id}'       ,   'App\ProductsController'   ,   'addFavorite');
    uri('product/add-cart/{product_id}'                           ,   'App\CartController'   ,   'addToCart');
    uri('product/add-comment/{product_id}'                        ,   'App\CommentController'   ,   'addComment' , 'POST');

    //wonderFullProducts
    uri('products/incredible-offers'                              ,   'App\HomeController'   ,   'wonderFullProducts');
    uri('products/time_limited_discounts'                         ,   'App\HomeController'   ,   'time_limited_discounts');

    //sort
    uri('products/sort'                                           ,   'App\ProductsController'   ,    'productsSort');

    //filter
    uri('products/filter'                                           ,   'App\ProductsController'   ,    'filter');


    //cart
    uri('cart'                                                    , 'App\CartController'   ,    'cart');
    uri('cart/increment/{product_id}'                             , 'App\CartController'   ,    'increment');
    uri('cart/decrement/{product_id}'                             , 'App\CartController'   ,    'decrement');
    uri('cart/delete/{product_id}'                                , 'App\CartController'   ,    'delete');

    //checkout
    uri('checkout'        , 'App\CheckoutController'  ,   'index');

    //search box
    uri('search'          , 'App\HomeController'      ,   'searchBox');

    //404_error
    uri('404_error'       , 'App\HomeController'      ,   'Error_404');

// uri('products/{categoryId}', 'App\Home', 'products');


echo '404 - page not found';

?>