<div class="sidebar__nav border-top border-left  ">
        <span class="bars d-none padding-0-18"></span>
        <a class="header__logo  d-none" href="https://netcopy.ir"></a>
        <div class="profile__info border cursor-pointer text-center">
            <div class="avatar__img">
                <?php if(isset($_SESSION['adminInfo']['image'])){ ?>
                <img src="<?= asset($_SESSION['adminInfo']['image']) ?>" class="avatar___img">
                <?php } ?>
                <input type="file" accept="image/*" class="hidden avatar-img__input">
                <div class="v-dialog__container" style="display: block;"></div>
                <div class="box__camera default__avatar"></div>
            </div>
            <span class="profile__name"><?= $_SESSION['adminInfo']['first_name'] . ' ' . $_SESSION['adminInfo']['last_name']  ?></span>
        </div><br>

        <ul>
            <li class="item-li i-dashboard is-active"><a href="<?= url('admin/dashboard') ?>">پیشخوان</a></li>
            <li class="item-li i-users"><a href="<?= url('admin/users/all') ?>"> کاربران</a></li>
            <li class="item-li i-categories"><a href="<?= url('admin/categories') ?>">دسته بندی ها</a></li>
            <li class="item-li i-banners"><a href="<?= url('admin/banners') ?>">بنر ها</a></li>
            <li class="item-li i-comments"><a href="<?= url('admin/comments') ?>"> نظرات</a></li>
            <li class="item-li i-comments"><a href="<?= url('admin/products') ?>"> محصولات</a></li>
            <li class="item-li i-discounts"><a href="<?= url('admin/discounts') ?>">تخفیف ها</a></li>
            <li class="item-li i-transactions"><a href="<?= url('admin/transactions') ?>">تراکنش ها</a></li>
            <li class="item-li i-discounts"><a href="<?= url('admin/messages') ?>">پیام ها</a></li>
            <li class="item-li i-user__inforamtion"><a href="<?= url('admin/profile/admin/edit/' . $_SESSION['adminInfo']['id']) ?>">اطلاعات کاربری</a></li>



            <li class="item-li "><a class="logout" href="<?= url('logout') ?>">خروج</a></li>

        </ul>

    </div>