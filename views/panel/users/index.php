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
                <li><a href="courses.html" class="is-active">کاربران</a></li>
            </ul>
        </div>
        <div class="main-content font-size-13">
            <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item is-active" href="<?= url('admin/users/all') ?>">همه کاربران</a>
                    <a class="tab__item" href="<?= url('admin/users/admins') ?>">مدیران</a>
                    <a class="tab__item" href="<?= url('admin/users/customers') ?>">مشتریان</a>
                    <a class="tab__item" href="<?= url('admin/users/not-active-customers') ?>">کاربران تاییده نشده</a>
                    <a class="tab__item" href="<?= url('admin/users/active-customers') ?>">کاربران تایید شده</a>
                </div>
            </div>
        <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>

            <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
                <div class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <div class="t-header-searchbox font-size-13">
                            <input type="text" class="text search-input__box font-size-13" placeholder="جستجوی کاربر">
                            <div class="t-header-search-content ">
                                <input type="text" class="text" placeholder="ایمیل">
                                <input type="text" class="text" placeholder="شماره">
                                <input type="text" class="text" placeholder="آی پی">
                                <input type="text" class="text margin-bottom-20" placeholder="نام و نام خانوادگی">
                                <btutton class="btn btn-netcopy_net">جستجو</btutton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>عکس</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل </th>
                            <th>شماره موبایل </th>
                            <th>سطح کاربری </th>
                            <th> تاریخ عضویت</th>
                            <th>ای پی</th>
                            <th>وضعیت حساب</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr style="background-color:#189bc3" role="row" class="">
                            <td><a href=""><?= $_SESSION['adminInfo']['id'] ?></a></td>
                            <td><img class="profile-pic" src="<?= asset($_SESSION['adminInfo']['image']) ?>" alt=""></td>
                            <td><?= $_SESSION['adminInfo']['first_name'] ?></td>
                            <td><?= $_SESSION['adminInfo']['last_name'] ?></td>
                            <td><?= $_SESSION['adminInfo']['email'] ?></td>
                            <td><?= $_SESSION['adminInfo']['phone_number'] ?></td>
                            <td>ادمین</td>
                            <td><?= $_SESSION['adminInfo']['created_at'] ?></td>
                            <td>1.1.1.1</td>
                            <td class="text-success">تایید شده</td>
                            <td>
                                <a href="<?= url('admin/profile/admin/edit/' . $_SESSION['adminInfo']['id']) ?>" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                    <?php
                        foreach($allUsers as $allUser){ ?>
                            <tr role="row" class="">
                            <td><a href=""><?= $allUser['id'] ?></a></td>
                            <td><img class="profile-pic" src="<?= asset($allUser['image']) ?>" alt=""></td>
                            <td><?= $allUser['first_name'] ?></td>
                            <td><?= $allUser['last_name'] ?></td>
                            <td><?= $allUser['email'] ?></td>
                            <td><?= $allUser['phone_number'] ?></td>
                            <?php if($allUser['permission'] == 'admin'){ ?>
                            <td>ادمین</td>
                            <?php }else if($allUser['permission'] == 'user'){ ?>
                            <td>مشتری</td>
                            <?php } ?>
                            <td><?= $allUser['created_at'] ?></td>
                            <td>1.1.1.1</td>
                            <?php if($allUser['is_active'] == 1){ ?>
                            <td class="text-error">تایید نشده</td>
                            <?php }else if($allUser['is_active'] == 2){ ?>
                            <td class="text-success">تایید شده</td>
                            <?php } } ?>
                            </tr>
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