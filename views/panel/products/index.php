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
                <li><a href="index.html" title="پیشخوان">پیشخوان</a></li>
                <li><a href="courses.html" title=" دوره ها" class="is-active">محصولات</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item is-active" href="<?= url('admin/products') ?>">لیست  محصولات</a>
                    <!-- <a class="tab__item" href="">محصولات تایید شده</a>
                    <a class="tab__item" href="">محصولات تایید نشده</a> -->
                    <a class="tab__item" href="<?= url('admin/products/create') ?>">ایجاد محصول جدید</a>
                </div>
            </div>
            <?php if($_SESSION['adminInfo']['is_active'] == 2){ ?>
            <div class="bg-white padding-20">
                <div class="t-header-search">
                    <form action="<?= url('admin/search/product') ?>"  method="POST">
                        <div class="t-header-searchbox font-size-13">
                            <div type="text" class="text search-input__box ">جستجوی محصول</div>
                            <div class="t-header-search-content ">
                                <input type="text"  name="title" class="text" placeholder="نام محصول">
                                <input type="text"  name="id" class="text" placeholder="شناسه">
                                <input type="text"  name="minPrice" class="text" placeholder="کمترین قیمت">
                                <input type="text"  name="maxPrice" class="text" placeholder="بیشترین قیمت">
                                <select name="category_id" id="">
                                    <option value="" selected disabled>انتخاب دسته بندی</option>
                                    <?php foreach ($categoryList as $category) {
                                        ?>
                                        <option value="<?= $category['id'] ?>">
                                            <?= $category['name'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                <button class="btn btn-netcopy_net">جستجو</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php $message = flash('search_filter');
                if(!empty($message)){ ?>
                <h4 style="color:green"><?= $message ?></h4>
                <?php } ?>
            </div>
            <div class="table__box">
                <table class="table">

                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>ردیف</th>
                            <th>عکس</th>
                            <th>عنوان</th>
                            <th>دسته بندی پدر</th>
                            <th>دسته بندی</th>
                            <th>قیمت</th>
                            <th>تعداد</th>
                            <th>نظرات</th>
                            <th>موجود</th>
                            <th>درصد فروش</th>
                            <th>وضعیت محصول</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                         foreach($productsInfo as $productInfo){ ?>
                        <tr role="row">
                            <td><a href=""><?= $productInfo['id'] ?></a></td>
                            <td><a href=""><?= $i ?></a></td>
                            <?php $i++ ?>
                             <td><img class="product-image" src="<?= asset($productInfo['image']) ?>" alt=""></td>
                            <td><a href=""><?= $productInfo['title'] ?></a></td>

                            <td><a href="" class="color-2b4a83"><?= $productInfo['parent_name'] ?></a></td>

                            <td><a href="" class="color-2b4a83"><?= $productInfo['category_name'] ?></a></td>

                            <td><a href="" class="color-2b4a83"><?= number_format($productInfo['price']) ?></a></td>
                            <?php if($productInfo['stock'] == 0 || $productInfo['stock'] == null){ ?>
                            <td><a href="" class="color-2b4a83">0</a></td>
                            <?php }else{ ?>
                            <td><a href="" class="color-2b4a83"><?= $productInfo['stock'] ?></a></td>
                            <?php } ?>
                            <td><?= $productInfo['comment_count'] ?></td>
                            <td><?php
                            $stock = $productInfo['stock'] == null || $productInfo['stock'] == 0  ? 'نیست' : 'هست';
                            echo $stock; 
                            ?></td>
                            <td>در حال بروزرسانی</td>
                            <?php if($productInfo['status'] == 'approved'){ ?>
                            <td class="text-success" >منتشر شده</td>
                            <?php }else if($productInfo['status'] == 'seen'){ ?>
                            <td style="color:#e8e400" >در صف انتشار<br>(منتظر تایید)</td>
                            <?php }else if($productInfo['status'] == 'unseen'){ ?>
                            <td class="text-error" >بررسی نشده</td>
                            <?php } ?>

                            <td>
                                <a href="<?= url('admin/products/delete/' . $productInfo['id']) ?>" class="item-delete mlg-15" title="حذف"></a>
                                <a href="<?= url('admin/products/not-active/' . $productInfo['id']) ?>" class="item-reject mlg-15" title="رد"></a>
                                <!-- <a href="" class="item-lock mlg-15" title="قفل محصول"></a> -->
                                <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="<?= url('admin/products/active/' . $productInfo['id']) ?>" class="item-confirm mlg-15" title="تایید"></a>
                                <a href="<?= url('admin/products/edit/' . $productInfo['id']) ?>" class="item-edit " title="ویرایش"></a>
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