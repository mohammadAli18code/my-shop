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
    require_once(BASE_PATH . '/views/panel/layouts/sidebar.php');
    ?>

    <div class="content">

    <!-- header -->
    <?php
    require_once(BASE_PATH . '/views/panel/layouts/header.php');
    ?>
        <div class="breadcrumb">
            <ul>
                <li><a href="index.html">پیشخوان</a></li>
                <li><a href="user-information.html" class="is-active">اطلاعات کاربری</a></li>
            </ul>
        </div>
        <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <div class="main-content  ">
            <div class="user-info bg-white padding-30 font-size-13">
            <?php $message = flash('update_alert');
            if(!empty($message)){
            ?>
            <h3 class="text-error"><?= $message ?></h3>


            <?php } ?>
                <form action="<?= url('admin/products/update/' . $product['id']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="profile__info border cursor-pointer text-center">
                       <div class="avatar__img"><img src="<?= asset($product['url']) ?>" class="avatar___img">
                            <input type="file" name="image" accept="image/*" class="hidden avatar-img__input">
                            <div class="v-dialog__container" style="display: block;"></div>
                            <div class="box__camera default__avatar"></div>
                        </div>
                    </div><br>
                    <label for="">عنوان</label>
                    <input class="text"            name="title" placeholder="عنوان" value="<?= $product['title'] ?>">
                    <label for="">توضیحات</label>
                    <input class="text"            name="description" placeholder="توضیحات" value="<?= $product['description'] ?>">
                    <label for="">تعداد</label>
                    <input class="text"            name="stock" placeholder="تعداد" value="<?= $product['stock'] ?>">
                    <label for="">قیمت</label>
                    <input class="text text-right" name="price"   placeholder="قیمت(تومان)"  value="<?= $product['price']?>">
                    <label for="">دسته بندی</label>
                    <select name="category_id" id="">
                    <?php foreach ($categoryList as $category) { ?>
                        <option value="<?= $category['id'] ?>" <?php if ($category['id'] == $product['category_id'])
                              echo "selected"; ?>>
                            <?= $category['name'] ?>
                        </option>
                    <?php } ?>

                    <?php foreach ($categoryList as $category) {
                        if($category['parent_id'] != null){  
                            ?>
                        
                            <option value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </option>
                    <?php }else if($category['parent_id'] == null){ ?>
                        <option value="<?= $category['id'] ?>">
                                <?= $category['name'] . '/اصلی' ?>
                            </option>
                            <?php } } ?>
                        </select>
                    <br><br>
                        <h2 style="color:black">ویژگی ها:</h2><br>
                    <!-- <label for="">ویژگی ها</label> -->
                    <?php foreach($product_attributes as $attributes){ ?>
                            <label for=""><?= $attributes['name'] ?></label>
                        <input class="text" name="value" placeholder="مقدار ویژگی" value="<?= $attributes['value'] ?>">
                    <?php } ?>
                    <br><br>
                    <h2 style="color:black">افزودن ویژگی</h2><br>
                    <label for="">عنوان ویژگی</label>
                    <input class="text" name="name" placeholder="نام ویژگی">
                    <label for="">مقدار ویژگی</label>
                    <input class="text" name="value" placeholder="مقدار ویژگی">
                    <br><br>
                    <button class="btn btn-netcopy_net">ذخیره تغییرات</button>
                </form>
            </div>

        </div>
    </div>
    <?php }else{ ?>
        <h4 style="color:red" ><?php echo '* توجه : ' . $_SESSION['adminInfo']['first_name'] . ' ' . 'جان ، ابتدا نسبت به فعالسازی حساب کاربری خود اقدام کنید' ; ?></h4>
    <?php } ?>
</body>
<script src="  <?= asset('public/admin-panel/js/jquery-3.4.1.min.js') ?> "></script>
<script src="  <?= asset('public/admin-panel/js/js.js') ?> "></script>

</html>

