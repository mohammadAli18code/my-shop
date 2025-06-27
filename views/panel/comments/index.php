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
                <li><a href="index.html">پیشخوان</a></li>
                <li><a href="comments.html" class="is-active"> نظرات</a></li>
            </ul>
        </div>
        <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <div class="main-content">
            <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item is-active" href="comments.html"> همه نظرات</a>
                </div>
            </div>
            <div class="bg-white padding-20">
                <div class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <div class="t-header-searchbox font-size-13">
                            <input type="text" class="text search-input__box font-size-13"
                                placeholder="جستجوی در نظرات">
                            <div class="t-header-search-content ">
                                <input type="text" class="text" placeholder="قسمتی از متن">
                                <input type="text" class="text" placeholder="ایمیل">
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
                            <th>ارسال کننده</th>
                            <th>شناسه کاربر</th>
                            <th>نام محصول</th>
                            <th>شناسه محصول</th>
                            <th>دیدگاه</th>
                            <th>تاریخ</th>
                            <!-- <th>تعداد پاسخ ها</th> -->
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($comments as $comment){ ?>
                        <tr role="row" class="">
                            <td><a href=""> <?= $comment['id'] ?> </a></td>
                            <td><a href=""> <?= $comment['first_name'] . ' ' . $comment['last_name'] ?> </a></td>
                            <td><a href=""> <?= $comment['customer_id'] ?> </a></td>
                            <td><a href=""> <?= $comment['title'] ?> </a></td>
                            <td><a href=""> <?= $comment['product_id'] ?> </a></td>
                            <td><?= $comment['comment'] ?></td>
                            <td><?= $comment['created_at'] ?></td>
                            <?php if($comment['status'] == 'seen' || $comment['status'] == 'unseen'){ ?>
                            <td class="text-error">تایید نشده</td>
                            <?php } else if($comment['status'] == 'approved'){ ?>
                            <td class="text-success">تایید شده</td>
                            <?php } ?>

                            <td>
                                <a href="<?= url('admin/comment/delete/' . $comment['id']) ?>" class="item-delete mlg-15" title="حذف"></a>
                                <a href="<?= url('admin/comment/not-active/' . $comment['id']) ?>" class="item-reject mlg-15" title="رد"></a>
                                <a href="<?= url('admin/comment/active/' . $comment['id']) ?>" class="item-confirm mlg-15" title="تایید"></a>
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