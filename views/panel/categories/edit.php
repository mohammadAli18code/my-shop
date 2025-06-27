<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>قالب پنل مدیریت |نت کپی</title>
    <link rel="stylesheet" href="<?= asset('public/admin-panel/css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/admin-panel/css/responsive_991.css') ?>" media="(max-width:991px)">
    <link rel="stylesheet" href="<?= asset('public/admin-panel/css/responsive_768.css') ?>" media="(max-width:768px)">
    <link rel="stylesheet" href="<?= asset('public/admin-panel/css/font.css') ?>">
</head>

<body>
<?php
    require_once(BASE_PATH . '/template/panel/layouts/sidebar.php');
    ?>

    <div class="content">

    <!-- header -->
    <?php
    require_once(BASE_PATH . '/template/panel/layouts/header.php');
    ?>
        <div class="breadcrumb">
            <ul>
                <li><a href="index.html">پیشخوان</a></li>
                <li><a href="<?= url('admin/category/edit/' . $category_id) ?>" class="is-active">اطلاعات کاربری</a></li>
            </ul>
        </div>
        <?php $message = flash('edit_category');
        if(!empty($message)){
        ?>
        <h3 class="text-success"><?= $message ?></h3>

        <?php } if(isset($_SESSION['adminInfo'])){
                     if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <div class="main-content  ">
            <div class="user-info bg-white padding-30 font-size-13">
                <form action="<?= url('admin/category/update/' . $categoryInfo['id']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="profile__info border cursor-pointer text-center">
                        <span class="profile__name"><?= $categoryInfo['name'] ?></span>
                    </div><br>
                    <label for="">شناسه</label>
                    <input class="text"            name="category_id" placeholder="نام" value="<?= $categoryInfo['id'] ?>" disabled>
                    <label for="">نام دسته بندی</label>
                    <input class="text"            name="name" placeholder="نام" value="<?= $categoryInfo['name'] ?>">
                    <label for="">نام انگلیسی دسته بندی</label>
                    <input class="text"            name="english_name" placeholder="نام انگلیسی" value="<?= $categoryInfo['english_name'] ?>">
                    <label for="">نام دسته بندی پدر</label>
                    <select name="parent_id" id="">
                    <?php if($categoryInfo['parent_id'] == null){ 
                    ?> 
                        <option value="0">اصلی</option>
                    <?php }else{ ?>
                        <option value="<?= $categoryInfo['parent_id'] ?>"><?= $categoryInfo['parent'] ?></option>
                    <?php } ?>

                    <?php foreach ($categoryList as $category) { ?>
                        
                        <option value="<?= $category['id'] ?>">
                      
                  
                            <?= $category['name'] ?>
                        </option>
                    <?php } ?>
                        </select>
                    <br><br>
                    <button class="btn btn-netcopy_net">ذخیره تغییرات</button>
                </form>
            </div>

        </div>
    </div>
    <?php }else{ ?>
        <h4 style="color:red" ><?php echo '* توجه : ' . $_SESSION['adminInfo']['first_name'] . ' ' . 'جان ، ابتدا نسبت به فعالسازی حساب کاربری خود اقدام کنید' ; ?></h4>
    <?php } } ?>
</body>
<script src="  <?= asset('public/admin-panel/js/jquery-3.4.1.min.js') ?> "></script>
<script src="  <?= asset('public/admin-panel/js/js.js') ?> "></script>

</html>

