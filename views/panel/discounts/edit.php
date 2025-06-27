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
                <li><a href="<?= url('admin/dashboard') ?>">پیشخوان</a></li>
                <li><a href="<?= url('admin/discounts/edit/' . $discount_id) ?>" class="is-active">ویرایش تخفیف</a></li>
            </ul>
        </div>
        <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <div class="main-content  ">
            <div class="user-info bg-white padding-30 font-size-13">
            <?php $message = flash('update_discount_alert');
                  $success_message = flash('update_discount_alert_success');
            if(!empty($message)){
            ?>
            <h3 class="text-error"><?= $message ?></h3>
            <?php }
            if(!empty($success_message)){
            ?>
            <h3 class="text-success"><?= $success_message ?></h3>
            <?php } ?>
            <br><br>
            <h3 style="color:black">ویرایش تخفیف</h3>
            <br>
            <h4 style="color:blue">محصول شماره <?= $discount_info['product_id'] ?></h4>
            <br><br>

                <form action="<?= url('admin/discounts/update/' . $discount_id) ?>" method="POST" enctype="multipart/form-data">
                    <label for="">شناسه محصول</label>
                    <input class="text"            name="product_id" placeholder="شناسه محصول" value="<?= $discount_info['product_id'] ?>" disabled>
                    <label for="">عنوان</label>
                    <input class="text"            name="title" placeholder="عنوان" value="<?= $discount_info['title'] ?>">
                    <?php 
                    if(!empty($message)){
                    ?>
                    <h4 style="color:red"> لطفا از موارد ستاره دار زیر فقط و فقط یکی از آنها را تغییر دهید:</h4>
                    <h5 style="color:red">*</h5>
                    <?php } ?>
                    <label for="">مقدار تخفیف</label>
                    <input class="text"            name="discount_amount" placeholder="مقدار تخفیف" value="<?= $discount_info['discount_amount'] ?>">
                    <?php 
                    if(!empty($message)){
                    ?>
                    <h5 style="color:red">*</h5>
                    <?php } ?>
                    <label for="">درصد تخفیف</label>
                    <input class="text text-right" name="discount_percentage"   placeholder="درصد تخفیف"  value="<?= $discount_info['discount_percentage']?>">
                    <label for="">شروع زمان تخفیف</label>
                    <input class="text text-right" name="start_at"   placeholder="زمان شروع"  value="<?= $discount_info['start_at']?>">
                    <label for="">پایان زمان تخفیف</label>
                    <input class="text text-right" name="expire_at"   placeholder="زمان پایان"  value="<?= $discount_info['expire_at']?>">
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

