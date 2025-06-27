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
            <li><a href="<?= url('admin/discounts') ?>" class="is-active">تخفیف ها</a></li>
        </ul>
    </div>
    <div class="main-content padding-0 discounts">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <div class="table-box">
                        <table class="table">
                            <thead role="rowgroup">
                            <tr role="row" class="title-row">
                                <th>شناسه محصول</th>
                                <th>درصد</th>
                                <th>مقدار(تومان)</th>
                                <th>محدودیت زمانی</th>
                                <th>توضیحات</th>
                                <th>استفاده شده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($discounts as $details){ ?>
                            <tr role="row" class="">
                                <td><a href=""><?= $details['product_id'] ?></a></td>
                                <td><a href=""><?= $details['discount_percentage'] ?></a></td>
                                <td><a href=""><?= number_format($details['discount_amount'])  ?></a></td>
                                <td>از<?= ' ' . $details['expire_at'] ?> <br>تا<?= ' ' . $details['start_at'] ?></td>
                                <td><?= $details['title'] ?></td>
                                <td><?= $details['count'] ?> نفر</td>
                                <td>
                                    <a href="<?= url('admin/discounts/delete/' . $details['id']) ?>" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="<?= url('admin/discounts/edit/' . $details['id']) ?>" class="item-edit " title="ویرایش"></a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4 bg-white">
                <?php $message = flash('create_discount_alert');
                      $success_message = flash('create_discount_alert_successfully');
                if(!empty($message)){
                ?>
                <h4 class="text-error"><?= $message ?></h4>
                <?php }
                if(!empty($success_message)){
                    ?>
                <h4 class="text-success"><?= $success_message ?></h4>
                <?php } ?>
                <p class="box__title">ایجاد تخفیف جدید</p>
                <form action="<?= url('admin/discounts/create') ?>" method="post" class="padding-30">
                    <label for="">برای چه محصولی؟</label>
                    <input type="text" placeholder="شناسه محصول" name="product_id" class="text">
                    <label for="">چند درصد تخفیف؟</label>
                    <input type="text" placeholder="درصد تخفیف" name="discount_percentage" class="text">
                    <label for="">زمان شروع اعمال تخفیف؟</label>
                    <input type="text" placeholder="زمان شروع" name="start_at" class="text">
                    <label for="">زمان از بین رفتن تخفیف؟</label>
                    <input type="text" placeholder="زمان پایان" name="expire_at" class="text">
                    <h6 for="" style="color:red">* اگر میخواهید تخفیف همیشگی باشد "زمان پایان" را وارد نکنید.</h6>
                    <br>
                    <label for="">آیا این تخفیف مناسبتی دارد؟ اینجا بنویسید:</label>
                    <input type="text" placeholder="عنوان تخفیف" name="title" class="text margin-bottom-15">

                    <!-- <p class="box__title">این تخفیف برای</p>
                    <div class="notificationGroup">
                        <input id="discounts-field-1" class="discounts-field-pn" name="discounts-field" type="radio"/>
                        <label for="discounts-field-1">همه دوره ها</label>
                    </div>
                    <div class="notificationGroup">
                        <input id="discounts-field-2" class="discounts-field-pn" name="discounts-field" type="radio"/>
                        <label for="discounts-field-2">دوره خاص</label>
                    </div>
                    <select name="">
                        <option value="0">انتخاب دوره</option>
                        <option value="1">دوره لاراول</option>
                        <option value="2">دوره ری اکت</option>
                        <option value="3">دوره جی اس</option>
                    </select>
                    <input type="text" placeholder="لینک اطلاعات بیشتر" class="text"> -->
                    <button class="btn btn-netcopy_net">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="<?= url('public/admin-panel/js/jquery-3.4.1.min.js') ?>"></script>
<script src="<?= url('public/admin-panel/js/js.js') ?>"></script>
<script src="<?= url('public/admin-panel/js/tagsInput.js') ?>"></script>
</html>