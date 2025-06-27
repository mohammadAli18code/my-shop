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
                <li><a href="<?= url('admin/dashboard') ?>">پیشخوان</a></li>
                <li><a href="<?= url('admin/banner/create') ?>" class="is-active">ایجاد بنر جدید</a></li>
            </ul>
        </div>
        <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <div class="main-content  ">
        <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item" href="<?= url('admin/banner') ?>">لیست بنر ها ها</a>
                    <a class="tab__item is-active" href="<?= url('admin/banner/create') ?>">ایجاد بنر جدید</a>

                </div>
            </div>
            <div class="user-info bg-white padding-30 font-size-13">
                <form action="<?= url('admin/banner/store') ?>" method="POST" enctype="multipart/form-data">
                    <div class="profile__info border cursor-pointer text-center">
                       <div class="avatar__img"><img src="" class="avatar___img">
                            <input type="file" name="image" accept="image/*" class="hidden avatar-img__input">
                            <div class="v-dialog__container" style="display: block;"></div>
                            <div class="box__camera default__avatar"></div>
                        </div>
                        <span class="profile__name">عنوان</span>
                    </div><br>
                    <input class="text"            name="title" placeholder="عنوان">
                    <input class="text text-right" name="url"   placeholder="آدرس url">
                    <br><br>
                    <button class="btn btn-netcopy_net">ایجاد بنر</button>
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







<!-- <form action="<?= url('admin/profile/update/' . $customers['id']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="profile__info border cursor-pointer text-center">
                       <div class="avatar__img"><img src="<?= asset($customers['image']) ?>" class="avatar___img">
                            <input type="file" name="image" accept="image/*" class="hidden avatar-img__input">
                            <div class="v-dialog__container" style="display: block;"></div>
                            <div class="box__camera default__avatar"></div>
                        </div>
                        <span class="profile__name"><?= $customers['first_name'] . ' ' . $customers['last_name'] ?></span>
                    </div><br>
                    <input class="text"            name="title" placeholder="عنوان"     value="<?= $customers['title'] ?>">
                    <input class="text text-right" name="url"   placeholder="آدرس url"  value="<?= $customers['url'] ?>">
                    <br><br>
                    <button class="btn btn-netcopy_net">ذخیره تغییرات</button>
                </form> -->