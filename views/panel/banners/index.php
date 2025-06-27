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
       <!-- side bar -->
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
                <li><a href="<?= url('admin/banners') ?>" class="is-active">بنر ها</a></li>
            </ul>
        </div>


        <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <!-- alerts -->
        <?php $failed_update_message = flash('update_banner_failed');
        if(!empty($failed_update_message)){
        ?>
        <h3 class="text-error"><?= $failed_update_message ?></h3>
    
        <?php } $success_update_message = flash('update_banner_success');
        if(!empty($success_update_message)){
        ?>
        <h3 class="text-success"><?= $success_update_message ?></h3>
    
        <?php } $failed_delete_message = flash('delete_banner_failed');
        if(!empty($failed_delete_message)){
        ?>
        <h3 class="text-error"><?= $failed_delete_message ?></h3>

        <?php } $success_delete_message = flash('delete_banner_success');
        if(!empty($success_delete_message)){
        ?>
        <h3 class="text-success"><?= $success_delete_message ?></h3>
        <?php } ?>
        <!-- end alerts -->

    <div class="main-content font-size-13">
            <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item is-active" href="<?= url('admin/banners') ?>">لیست بنر ها ها</a>
                    <a class="tab__item " href="<?= url('admin/banner/create') ?>">ایجاد بنر جدید</a>

                </div>
            </div>
            <div class="table__box">
                <table class="table">

                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th class="p-r-90">شناسه</th>
                            <th>عنوان</th>
                            <th>تصویر</th>
                            <th>لینک</th>
                            <th>تاریخ ایجاد</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($banners as $banner){ ?>
                        <tr role="row" class="">
                            <td><a href=""> <?= $banner['id'] ?> </a></td>
                            <td><a href=""> <?= $banner['title'] ?> </a></td>
                            <td><a href=""><img class="img__slideshow" src="<?= asset($banner['image']) ?>" alt=""></a>
                            </td>
                            <td><a href=""> <?= $banner['url'] ?> </a></td>
                            <td><?= $banner['created_at'] ?></td>
                            <?php if($banner['is_active'] == 1){ ?>
                            <td class="text-error">تایید نشده</td>
                            <?php } else if($banner['is_active'] == 2){ ?>
                            <td class="text-success">تایید شده</td>
                            <?php } ?>

                            <td>
                                <a href="<?= url('admin/banner/delete/' . $banner['id']) ?>" class="item-delete mlg-15" title="حذف"></a>
                                <a href="<?= url('admin/banner/not-active/' . $banner['id']) ?>" class="item-reject mlg-15" title="رد"></a>
                                <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="<?= url('admin/banner/active/' . $banner['id']) ?>" class="item-confirm mlg-15" title="تایید"></a>
                                <a href="<?= url('admin/banner/edit/' . $banner['id']) ?>" class="item-edit" title="ویرایش"></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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