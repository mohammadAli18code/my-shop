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
                <li><a href="<?= url('admin/categories') ?>" class="is-active">دسته بندی ها</a></li>
            </ul>
        </div>
        <?php $message = flash('create_category');
        if(!empty($create_message)){
        ?>
        <h3 class="text-success"><?= $create_message ?></h3>
    
        <?php } $delete_message = flash('delete_category');
        if(!empty($delete_message)){
        ?>
        <h3 class="text-success"><?= $delete_message ?></h3>

        <?php } if($_SESSION['adminInfo']['is_active'] == 2){ ?>

        <div class="main-content padding-0 categories">
            <div class="row no-gutters  ">
                <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                    <p class="box__title">دسته بندی ها</p>
                    <div class="table__box">
                        <table class="table">
                            <thead role="rowgroup">
                                <tr role="row" class="title-row">
                                    <th>شناسه</th>
                                    <th>نام دسته بندی</th>
                                    <th>نام انگلیسی دسته بندی</th>
                                    <th>دسته پدر</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
            <?php foreach ($categories as $category) { ?>
               
                                <tr role="row" class="">
                                    <td><a href=""><?= $category['id'] ?></a></td>
                                    <td><a href=""><?= $category['name'] ?> </a></td>
                                    <td><?= $category['english_name'] ?></td>

                                    <?php if($category['parent'] != null){ ?>
                                    <td><?= $category['parent'] ?></td>
                                    <?php }else{ ?>
                                    <td>اصلی</td>
                                    <?php } ?>

                                    <td>
                                        <a href="<?= url('admin/category/delete/'. $category['id'])  ?>" class="item-delete mlg-15" title="حذف"></a>
                                        <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                        <a href="<?= url('admin/category/edit/'. $category['id'])  ?>" class="item-edit " title="ویرایش"></a>

                                    </td>
                                </tr>
                                <?php } ?>
                                
                                
                               

                            </tbody>
                        </table>
                    </div>
                    <!-- check empty category list -->
                    <?php if(empty($category)){ ?>
                        <h3 style="color:white;font-family:serif;margin-top:10px">هیچ دسته بندی ای یافت نشد!</h3>
                    <?php } ?>
                </div>
                <div class="col-4 bg-white">
                    <p class="box__title">ایجاد دسته بندی جدید</p>
                    <form action="<?= url('category/create') ?>" method="post" class="padding-30">
                        <input type="text" name="name" placeholder="نام دسته بندی" class="text">
                        <input type="text" name="english_name" placeholder="نام انگلیسی دسته بندی" class="text">
                        <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

                        <select name="parent_id" id="">

                        <option value="">اصلی</option>

                    <?php foreach ($categoryList as $category) { ?>
                            <option value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </option>
                    <?php } ?>
                        </select>


                        <button class="btn btn-netcopy_net">اضافه کردن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <h4 style="color:red" ><?php echo '* توجه : ' . $_SESSION['adminInfo']['first_name'] . ' ' . 'جان ، ابتدا نسبت به فعالسازی حساب کاربری خود اقدام کنید' ; ?></h4>
    <?php } ?>
</body>
<script src="<?= asset('public/admin-panel/js/jquery-3.4.1.min.js') ?>"></script>
<script src="<?= asset('public/admin-panel/js/js.js') ?>"></script>
<script src="<?= asset('public/admin-panel/js/tagsInput.js') ?>"></script>

</html>