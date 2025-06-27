<div class="header d-flex item-center width-100 border-bottom padding-12-30"
            style="background-color: rgb(0, 0, 0);">
            <div class="header__right d-flex flex-grow-1 item-center">
                <span class="bars"></span>
                <a class="header__logo" href="" style="color: aliceblue;"> پنل مدیریتی </a>

            </div>
            <div class="header__left d-flex flex-end item-center margin-top-2">
                <span class="account-balance font-size-12" style="color: aliceblue;">موجودی : 2,500,000 تومان</span>
                <div class="notification margin-15">
                    <a class="notification__icon"></a>
                    <div class="dropdown__notification">
                        <div class="content__notification">
                            <span class="font-size-13">موردی برای نمایش وجود ندارد</span>
                        </div>
                    </div>
                </div>
                <a href="<?= url('logout') ?>" class="logout" title="خروج"></a>
            </div>
        </div>

                        <div class="tab__box">
                <div class="tab__items"><br>
                <?php if($_SESSION['adminInfo']['is_active'] == 1 ){ ?>


                    <h4 style="color:red" ><?php echo ' * توجه : ' . $_SESSION['adminInfo']['first_name'] . ' ' . 'عزیز ، جهت دسترسی به همه بخش های پنل ادمین باید ابتدا نسبت به فعالسازی حساب خود اقدام کنید' ; ?></h4>
                    <h4 style="color:green" ><?php echo ' راهنمایی: لینک فعالسازی حسابتان به ایمیل شما ارسال شده است؛ لطفا به  ایمیل ارسال شده مراجعه فرمایید ' ; ?></h4>
                    <h4 style="color:green" ><?php echo 'تذکر:  تا مادامی که فعالسازی حساب انجام نشود به بخش های پنل ادمین دسترسی نخواهید داشت؛متشکر از همراهی شما.' ; ?></h4><br>

                    <?php } if (
                        !isset($_SESSION['adminInfo']['age'])
                     || !isset($_SESSION['adminInfo']['address'])
                     || !isset($_SESSION['adminInfo']['image'])
                     || !isset($_SESSION['adminInfo']['major'])
                     || !isset($_SESSION['adminInfo']['city'])
                     || !isset($_SESSION['adminInfo']['country'])
                     || !isset($_SESSION['adminInfo']['additional_info'])  ) { ?>

                        <h4 style="color:red" ><?php echo '* توجه : ' . $_SESSION['adminInfo']['first_name'] . ' ' . 'عزیز لطفا جهت تکمیل حساب کاربری خود از طریق لینک زیر اقدام کنید' ; ?></h4>
                        <a class="tab__item is-active" href="<?= url('admin/profile/admin/edit/' . $_SESSION['adminInfo']['id']) ?>">تکمیل حساب کاربری</a>

                        <?php } if(!isset($_SESSION['adminInfo']['phone_number']) ){ ?>

                            <h4 style="color:red" ><?php echo '* توجه : ' . $_SESSION['adminInfo']['first_name'] . ' ' . 'جان ، لطفا جهت ثبت شماره تلفن خود سریعا اقدام کنید' ; ?></h4>
                            <a class="tab__item is-active" href="<?= url('admin/profile/admin/edit/' . $_SESSION['adminInfo']['id']) ?>">تکمیل حساب کاربری</a>
                           
                            <?php } ?>
                </div>
            </div>
