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
            <?php 
            $sending_answer = flash('sending_answer');
            $sending_answer_alert = flash('sending_answer_alert');
            if(!empty($sending_answer)){ ?>
                <h3 class="text-success"><?= $sending_answer ?></h3>
            <?php } ?>
            <?php 
            if(!empty($sending_answer_alert)){ ?>
                <h3 class="text-error"><?= $sending_answer_alert ?></h3>
            <?php } ?>


            
            
                <form action="<?= url('admin/message/answer/' . $details['id']) ?>" method="POST">
                    <div class="profile__info border cursor-pointer text-center">
                        <span class="profile__name"></span>
                    </div><br>
                    <label for="">شناسه</label>
                    <input class="text"            name="id" value="<?= $details['id'] ?>" disabled>
                    <label for="">نام</label>
                    <input class="text"            name="first_name" value="<?= $details['first_name'] ?>" disabled>
                    <label for="">نام خانوادگی</label>
                    <input class="text"            name="last_name" value="<?= $details['last_name'] ?>" disabled>
                    <label for="">ایمیل</label>
                    <input class="text"            name="email" value="<?= $details['email'] ?>" disabled>
                    <label for=""> شماره تلفن</label>
                    <input class="text"            name="phone_number" value="<?= $details['phone_number'] ?>" disabled>
                    <label for="">موضوع</label>
                    <input class="text"            name="title" value="<?= $details['title'] ?>" disabled>
                    <label for="">متن پیام</label>
                    <textarea class="text" name="message" id="" disabled><?= $details['message'] ?></textarea>
                    <br><br>
                    <label for="">پاسخ شما</label>
                    <textarea class="text" name="answer" id=""><?= $details['answer'] ?></textarea>
                    <br><br>
                    <button class="btn btn-netcopy_net">ارسال پاسخ</button>
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

