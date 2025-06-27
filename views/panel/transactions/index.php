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
    <!-- sidebar -->
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
            <li><a href="<?= url('admin/transactions') ?>" class="is-active">تراکنش ها</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  margin-bottom-10">
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>کل فروش ۳۰ روز گذشته  سایت </p>
                <p><?= number_format($all_sold_30_days_age['all_price'])  ?> تومان</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <h6 style="color:red"> در حال بروز رسانی</h6>
                <p>درامد خالص ۳۰ روز گذشته سایت</p>
                <p>2,500,000 تومان</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>کل فروش سایت</p>
                <p><?= number_format($all_sold['all_price']) ?> تومان</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-bottom-10">
            <h6 style="color:red"> در حال بروز رسانی</h6>
                <p> کل درآمد خالص سایت</p>
                <p>2,500,000 تومان</p>
            </div>
        </div>
        <div class="row no-gutters border-radius-3 font-size-13">
            <div class="col-12 bg-white padding-30 margin-bottom-20">
                محل نمودار درامد سی روز گذاشته
            </div>

        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
            <p class="margin-bottom-15">همه تراکنش ها</p>
            <div class="t-header-search">
                <form action="" onclick="event.preventDefault();">
                    <div class="t-header-searchbox font-size-13">
                        <input type="text" class="text search-input__box font-size-13" placeholder="جستجوی تراکنش">
                        <div class="t-header-search-content ">
                            <input type="text" name="card_number" class="text"  placeholder="شماره کارت / بخشی از شماره کارت">
                            <input type="text" name="email"  class="text"  placeholder="ایمیل">
                            <input type="text" name="total_price"  class="text"  placeholder="مبلغ به تومان">
                            <input type="text" name=""  class="text" placeholder="شماره">
                            <input type="text"  class="text" placeholder="از تاریخ : 1399/10/11">
                            <input type="text" class="text margin-bottom-20"  placeholder="تا تاریخ : 1399/10/12">
                            <btutton class="btn btn-netcopy_net">جستجو</btutton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table__box">
            <table width="100%" class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه پرداخت</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل پرداخت کننده</th>
                    <th>مبلغ (تومان)</th>
                    <th>تاریخ و ساعت</th>
                    <th>زمان ارسال کالا(ها)</th>
                    <th>زمان دریافت کالا(ها)</th>
                    <th>وضعیت</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($transactions as $transaction){ ?>
                <tr role="row">
                    <td><a href=""><?= $transaction['payment_identifier'] ?></a></td>
                    <td><a href=""><?= $transaction['first_name'] . ' ' . $transaction['last_name'] ?></a></td>
                    <td><a href=""><?= $transaction['email'] ?></a></td>
                    <td><a href=""><?= number_format($transaction['total_price']) ?></a></td>
                    <td><a href=""><?= $transaction['created_at'] ?></a></td>
                    <td><a href=""><?= $transaction['shipping_date'] ?></a></td>
                    <td><a href=""><?= $transaction['delivery_date'] ?></a></td>

                    <?php if($transaction['status'] == 'Completed'){ ?>
                    <td><a href="" class="text-success">موفق</a></td>
                    <?php }else if($transaction['status'] == 'Processing'){ ?>
                    <td><a href="" style="color:yellow">در حال انجام</a></td>
                    <?php }else if($transaction['status'] == 'Canceled'){ ?>
                    <td><a href="" class="text-error">لغو شده</a></td>
                    <?php } ?>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="<?= url('public/admin-panel/js/jquery-3.4.1.min.js') ?>"></script>
<script src="<?= url('public/admin-panel/js/js.js') ?>"></script>
</html>