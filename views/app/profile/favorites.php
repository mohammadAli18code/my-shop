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
            <span class="w-1 h-0 group-hover:h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-zinc-700 hover:text-zinc-600 my-1 w-full" href="<?= url('customer/profile-orders') ?>">
              <svg class="fill-zinc-600 group-hover:fill-zinc-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
              سفارش ها
            </a>
          </li>
          <li class="px-3 py-2 group flex gap-x-2 group items-center">
            <span class="w-1 h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-sky-700 my-1 w-full" href="<?= url('customer/profile-favorites') ?>">
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
      <div class="md:w-9/12 bg-white shadow-lg rounded-2xl p-5 mt-5 md:mt-0">
        <div>
          <div class="text-zinc-800 text-lg mb-4 font-semibold">
           علاقه مندی ها:
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-3">
            <?php foreach($favorites as $favorite){ ?>
            <div class="my-2 p-2 md:p-4 bg-white rounded-2xl border group swiper-slide-next">
              <div class="flex justify-between relative">
                <div class="bg-sky-500 rounded-full w-8 h-8 pt-1 text-white flex items-center justify-center text-xs">
                    % <?= $favorite['discount_percentage'] ?>
                  </div>
                <!-- <div class="flex flex-col gap-y-2 absolute opacity-0 group-hover:opacity-100 left-0 transition-opacity duration-300 ease-out">
                  <svg class="bg-gray-200 rounded-full p-1 fill-red-500 transition cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="#2b2b2b" viewBox="0 0 256 256"><path d="M178,34c-21,0-39.26,9.47-50,25.34C117.26,43.47,99,34,78,34A60.07,60.07,0,0,0,18,94c0,29.2,18.2,59.59,54.1,90.31a334.68,334.68,0,0,0,53.06,37,6,6,0,0,0,5.68,0,334.68,334.68,0,0,0,53.06-37C219.8,153.59,238,123.2,238,94A60.07,60.07,0,0,0,178,34ZM128,209.11C111.59,199.64,30,149.72,30,94A48.05,48.05,0,0,1,78,46c20.28,0,37.31,10.83,44.45,28.27a6,6,0,0,0,11.1,0C140.69,56.83,157.72,46,178,46a48.05,48.05,0,0,1,48,48C226,149.72,144.41,199.64,128,209.11Z"></path></svg>
                </div> -->
              </div>
              <div class="image-box mb-6 ">
                <img class="max-w-52 mx-auto" src="<?= asset($favorite['image_url']) ?>" alt="">
              </div>
              <div class="space-y-5">
                <span class="mb-2 h-8 md:h-10 flex justify-between">
                  <a href="<?= url('product/details/' . $favorite['id']) ?>" class="flex flex-col gap-y-2">
                    <span class="text-sm font-semibold text-zinc-800">
                      <?= $favorite['title'] ?>
                    </span>
                    <!-- <span class="text-xs text-zinc-500">
                      دسته بندی
                    </span> -->
                  </a>
                </span>
                <div class="flex items-center gap-x-2">
                  <?php if($favorite['discount_percentage'] != 0){ ?>
                  <div class="flex justify-center gap-x-1 text-xs text-zinc-400">
                    <div class="line-through">
                    <?= number_format($favorite['price']) ?>
                    </div>
                    <div class="line-through">تومان</div>
                  </div>
                  <?php } ?>
                  <div class="flex justify-center gap-x-1 font-semibold text-zinc-800">
                    <div><?= number_format($favorite['price'] - $favorite['discount_amount']) ?></div>
                    <div>تومان</div>
                  </div>
                </div>
                <!-- <a href="<?= url('product/add-cart/' . $favorite['product_id']) ?>" class="flex items-center justify-center gap-x-1 text-sm w-full py-2 px-2 rounded-lg text-white bg-gradient-to-bl from-sky-500 to-sky-700 hover:opacity-80 transition">
                  افزودن به سبد خرید 
                </a> -->
              </div>
            </div>
            <?php } ?>
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