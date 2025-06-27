<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>پروفایل</title>

  <link rel="stylesheet" href="<?= url('public/app/assets/css/main.css') ?>">

</head>
<body class="mx-auto bg-[#fcfcfc]">
	<!-- header -->
	<?php
	require_once (BASE_PATH . '/views/app/layouts/header.php')
	?>
	<!-- end header -->
  <main class="pt-24 md:pt-36 max-w-[1600px] mx-auto px-3 md:px-6">
    <div class="p-3 md:p-5 md:flex gap-5">
      <!-- sidebar -->
      <div class="md:w-3/12 bg-white shadow-lg rounded-2xl py-3 h-fit">
        <svg class="fill-zinc-700 mx-auto" xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="" viewBox="0 0 256 256"></svg>
        <div class="text-center font-semibold text-lg md:text-xl text-zinc-700">
          <img style="border:2px solid black;border-radius:50%;margin-top:-200px;width:120px;height:120px;margin-right:118px" src="<?= asset($_SESSION['customerInfo']['image']) ?>" alt="">
          <?= $_SESSION['customerInfo']['first_name'] . ' ' . $_SESSION['customerInfo']['last_name'] ?>
        </div>
        <ul class="px-5 py-3 space-y-1">
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-0 group-hover:h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-zinc-700 my-1 w-full" href="<?= url('customer/profile') ?>">
              <svg class="fill-zinc-600 group-hover:fill-zinc-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
              پروفایل
            </a>
          </li>
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-sky-700 my-1 w-full" href="<?= url('customer/profile-orders') ?>">
              <svg class="fill-zinc-600 group-hover:fill-zinc-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
              سفارش ها
            </a>
          </li>
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-0 group-hover:h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-zinc-700 hover:text-zinc-600 my-1 w-full" href="<?= url('customer/profile-favorites') ?>">
              <svg class="fill-zinc-600 group-hover:fill-zinc-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
              علاقه مندی ها
            </a>
          </li>
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-0 group-hover:h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-zinc-700 hover:text-zinc-600 my-1 w-full" href="<?= url('customer/profile-messages') ?>">
              <svg class="fill-zinc-600 group-hover:fill-zinc-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"><path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z"/></svg>              پیام ها
            </a>
          </li>
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-0 group-hover:h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-zinc-700 hover:text-zinc-600 my-1 w-full" href="<?= url('customer/profile-addresses') ?>">
              <svg class="fill-zinc-600 group-hover:fill-zinc-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>              آدرس های من
            </a>
          </li>
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-0 group-hover:h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-zinc-700 hover:text-zinc-600 my-1 w-full" href="<?= url('customer/profile-personal-info') ?>">
              <svg class="fill-zinc-600 group-hover:fill-zinc-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>              اطلاعات شخصی
            </a>
          </li>
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-0 group-hover:h-7 transition-all rounded-md bg-red-700">
            </span>
            <a class="flex gap-x-1 items-center text-red-600 my-1 w-full group-hover:text-red-700" href="<?= url('logout') ?>">
              <svg class="fill-red-500 group-hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16"><path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z"/></svg>
              خروج
            </a>
          </li>
        </ul>
      </div>
      <!-- end sidebar -->
      <div class="md:w-9/12 bg-white shadow-lg rounded-2xl p-5 mt-5 md:mt-0">
        <div>
          <div class="text-zinc-800 text-lg mb-4 font-semibold">
            جزئیات سفارش:
          </div>
          <!-- product -->
           <?php
           foreach($productsInCurrentOrder as $product){
             ?>
          <div class="mt-7 flex flex-col md:flex-row border-b pb-4">
            <div class="w-10/12 mx-auto md:max-w-32">
              <img src="./assets/image/products/1.webp" alt="">
            </div>
            <div class="mr-2 md:mr-5 w-full">
              <!-- title -->
              <div class="text-xs sm:text-sm text-zinc-700">
                <?= $product['title'] ?>
              </div>
              <div class="w-full space-y-2 mt-5">
                <!-- attribute -->
                <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <span class="h-4 w-4 rounded-full bg-gray-900"></span>
                    <span>
                <?= $product['description'] ?>
                    </span>
                  </div>
                </div>
                <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <svg class="fill-zinc-600" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M245.57,117.78l-14-35a13.93,13.93,0,0,0-13-8.8H182V64a6,6,0,0,0-6-6H24A14,14,0,0,0,10,72V184a14,14,0,0,0,14,14H42.6a30,30,0,0,0,58.8,0h53.2a30,30,0,0,0,58.8,0H232a14,14,0,0,0,14-14V120A6,6,0,0,0,245.57,117.78ZM182,86h36.58a2,2,0,0,1,1.86,1.26L231.14,114H182ZM22,72a2,2,0,0,1,2-2H170v68H22ZM72,210a18,18,0,1,1,18-18A18,18,0,0,1,72,210Zm82.6-24H101.4a30,30,0,0,0-58.8,0H24a2,2,0,0,1-2-2V150H170v15.48A30.1,30.1,0,0,0,154.6,186ZM184,210a18,18,0,1,1,18-18A18,18,0,0,1,184,210Zm50-26a2,2,0,0,1-2,2H213.4A30.05,30.05,0,0,0,184,162c-.67,0-1.34,0-2,.07V126h52Z"></path></svg>
                    <span>
                        <?php
                        if($product['status'] == 'Processing' || $product['status'] == 'completed')
                        {
                           echo 'ارسال پست پیشتاز' ;
                        }
                        ?>
                    </span>
                  </div>
                </div>
                <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M208,42H48A14,14,0,0,0,34,56v58.77c0,88.24,74.68,117.52,89.65,122.49a13.5,13.5,0,0,0,8.7,0c15-5,89.65-34.25,89.65-122.49V56A14,14,0,0,0,208,42Zm2,72.79c0,80-67.84,106.59-81.44,111.1a1.55,1.55,0,0,1-1.12,0C113.84,221.38,46,194.79,46,114.79V56a2,2,0,0,1,2-2H208a2,2,0,0,1,2,2Z"></path></svg>
                    <span>گارانتی 36 ماهه حامی خدمات رایانه و همراه پارت</span>
                  </div>
                </div>
                <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M230,96a6.19,6.19,0,0,0-.22-1.65l-14.34-50.2A14.07,14.07,0,0,0,202,34H54A14.07,14.07,0,0,0,40.57,44.15L26.23,94.35A6.19,6.19,0,0,0,26,96v16A38,38,0,0,0,42,143V208a14,14,0,0,0,14,14H200a14,14,0,0,0,14-14V143A38,38,0,0,0,230,112ZM52.11,47.45A2,2,0,0,1,54,46H202a2,2,0,0,1,1.92,1.45L216.05,90H40ZM102,102h52v10a26,26,0,0,1-52,0Zm-64,0H90v10a26,26,0,0,1-52,0ZM202,208a2,2,0,0,1-2,2H56a2,2,0,0,1-2-2V148.66a38,38,0,0,0,42-16.21,37.95,37.95,0,0,0,64,0,38,38,0,0,0,42,16.21Zm-10-70a26,26,0,0,1-26-26V102h52v10A26,26,0,0,1,192,138Z"></path></svg>
                    <span>مای کامپیوتر</span>
                  </div>
                </div>
                <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <svg class="fill-orange-700" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M243.6,148.8a6,6,0,0,1-8.4-1.2A53.58,53.58,0,0,0,192,126a6,6,0,0,1,0-12,26,26,0,1,0-25.18-32.5,6,6,0,0,1-11.62-3,38,38,0,1,1,59.91,39.63A65.69,65.69,0,0,1,244.8,140.4,6,6,0,0,1,243.6,148.8ZM189.19,213a6,6,0,0,1-2.19,8.2,5.9,5.9,0,0,1-3,.81,6,6,0,0,1-5.2-3,59,59,0,0,0-101.62,0,6,6,0,1,1-10.38-6A70.1,70.1,0,0,1,103,182.55a46,46,0,1,1,50.1,0A70.1,70.1,0,0,1,189.19,213ZM128,178a34,34,0,1,0-34-34A34,34,0,0,0,128,178ZM70,120a6,6,0,0,0-6-6A26,26,0,1,1,89.18,81.49a6,6,0,1,0,11.62-3,38,38,0,1,0-59.91,39.63A65.69,65.69,0,0,0,11.2,140.4a6,6,0,1,0,9.6,7.2A53.58,53.58,0,0,1,64,126,6,6,0,0,0,70,120Z"></path></svg>
                    <span>ارسال فروشنده</span>
                  </div>
                </div>
                <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <svg class="fill-orange-700" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M243.6,148.8a6,6,0,0,1-8.4-1.2A53.58,53.58,0,0,0,192,126a6,6,0,0,1,0-12,26,26,0,1,0-25.18-32.5,6,6,0,0,1-11.62-3,38,38,0,1,1,59.91,39.63A65.69,65.69,0,0,1,244.8,140.4,6,6,0,0,1,243.6,148.8ZM189.19,213a6,6,0,0,1-2.19,8.2,5.9,5.9,0,0,1-3,.81,6,6,0,0,1-5.2-3,59,59,0,0,0-101.62,0,6,6,0,1,1-10.38-6A70.1,70.1,0,0,1,103,182.55a46,46,0,1,1,50.1,0A70.1,70.1,0,0,1,189.19,213ZM128,178a34,34,0,1,0-34-34A34,34,0,0,0,128,178ZM70,120a6,6,0,0,0-6-6A26,26,0,1,1,89.18,81.49a6,6,0,1,0,11.62-3,38,38,0,1,0-59.91,39.63A65.69,65.69,0,0,0,11.2,140.4a6,6,0,1,0,9.6,7.2A53.58,53.58,0,0,1,64,126,6,6,0,0,0,70,120Z"></path></svg>
                    <span>تعداد : <?= $product['product_count'] ?></span>
                  </div>
                </div>
                
                <!-- price -->
                <div class="text-gray-700 pt-4">
                  <span class="text-xl font-bold"> <?= number_format($product['total_price']) ?> </span>
                  <span class="text-sm">تومان</span>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

          <!-- details -->
          <div class="px-2 sm:px-6 py-3 rounded-xl border mx-auto my-5 max-w-md">
            <div class="flex gap-x-1 justify-center items-center text-zinc-700">
              <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>         
              اطلاعات پرداخت
            </div>
            <div class="flex gap-x-1 justify-between items-center text-zinc-600 mt-5 bg-gray-100 rounded-lg px-2 py-3 text-sm">
              <div>
                قیمت کالاها (<?= $product['product_count'] ?>)
              </div>
              <div class="flex gap-x-1">
                <div>
                <?= number_format($total_price) ?>
                </div>
                <div>
                  تومان
                </div>
              </div>
            </div>
            <div class="flex gap-x-1 justify-between items-center text-zinc-600 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
              <div>
                تخفیف
              </div>
              <div class="flex gap-x-1">
                <div>
                <?= number_format($discount_amount) ?>
                </div>
                <div>
                  تومان
                </div>
              </div>
            </div>
            <div class="flex gap-x-1 justify-between items-center text-zinc-600 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
              <div>
                تاریخ
              </div>
              <div class="flex gap-x-1">
                <div>
               <?= $order_date ?>
                </div>
              </div>
            </div>
            <?php if($product['status'] == 'processing' || $product['status'] == 'completed'){ ?>
            <div class="flex gap-x-1 justify-between items-center text-zinc-600 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
              <div>
                شماره پیگیری
              </div>
              <div class="flex gap-x-1">
                <div>
                  f4hdf5TG34F
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="flex gap-x-1 justify-between items-center text-zinc-800 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
              <div>
                جمع سبد خرید
              </div>
              <div class="flex gap-x-1">
                <div>
                  3,400,000
                </div>
                <div>
                  تومان
                </div>
              </div>
            </div> -->
            <div class="flex gap-x-1 justify-between items-center text-zinc-800 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
              <div>
                آدرس
              </div>
              <div>
                <?= $addresses['address_line'] ?>
              </div>
            </div>
            <button class="mx-auto w-full px-2 py-3 mt-5 text-sm bg-gradient-to-bl from-sky-600 to-sky-700 hover:opacity-80 transition text-gray-100 rounded-lg">
              چاپ
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
	<!-- footer -->
	<?php
	require_once (BASE_PATH . '/views/app/layouts/footer.php')
	?>
	<!-- end footer -->
</body>
  <!-- main javaScript code -->
  <script src="<?= url('public/app/assets/js/main.js') ?>"></script>

</html>