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
                <li><a href="comments.html" class="is-active"> نظرات</a></li>
            </ul>
        </div>
        <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <div class="main-content">
            <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item is-active" href="<?= url('admin/messages') ?>"> همه پیام ها</a>
                </div>
            </div>
            <div class="bg-white padding-20">
                <!-- <div class="t-header-search">
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
                </div> -->
            </div>

            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>شماره تلفن</th>
                            <th>ایمیل</th>
                            <th>موضوع</th>
                            <th>متن</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($messages as $message){ ?>
                        <tr role="row" class="">
                            <td><a href=""> <?= $message['id'] ?> </a></td>
                            <td><a href=""> <?= $message['first_name'] ?></a></td>
                            <td><a href=""> <?= $message['last_name'] ?> </a></td>
                            <td><a href=""> <?= $message['phone_number'] ?> </a></td>
                            <td><a href=""> <?= $message['email'] ?> </a></td>
                            <td><?= $message['title'] ?></td>
                            <td><?= $message['message'] ?></td>
                            <?php if($message['status'] == 1 || $message['status'] == 2){ ?>
                            <td class="text-error">پاسخ داده نشده</td>
                            <?php } else if($message['status'] == 3){ ?>
                            <td class="text-success">پاسخ داده شده</td>
                            <?php } ?>

                            <td>
                                <a href="<?= url('admin/messages/details/' . $message['id']) ?>" target="_blank" class="item-eye mlg-15" title="مشاهده کامل متن"></a>
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