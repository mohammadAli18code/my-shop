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
            <span class="w-1 h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-sky-700 my-1 w-full" href="<?= url('customer/profile') ?>">
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
        <div class="grid grid-cols-1 md:flex gap-5">
          <div class="flex md:w-1/4 gap-x-2 items-center bg-red-500 rounded-xl px-3 py-2 text-xs sm:text-base">
            <svg class="fill-zinc-100 bg-red-600 rounded-xl p-1" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="" viewBox="0 0 256 256"><path d="M232,96v96a8,8,0,0,1-8,8H32a8,8,0,0,1-8-8V96Z" opacity="0.2"></path><path d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z"></path></svg>
            <div class="text-zinc-50 space-y-1">
              <div>
                موجودی حساب
              </div>
              <div>
                <?= $account_info['account_balance'] ?> تومان
              </div>
            </div>
          </div>
          <div class="flex md:w-1/4 gap-x-2 items-center bg-yellow-500 rounded-xl px-3 py-2 text-xs sm:text-base">
            <svg class="fill-zinc-100 bg-yellow-600 rounded-xl p-1" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="#000000" viewBox="0 0 256 256"><path d="M240,104,128,224,80,104l48-64h56Z" opacity="0.2"></path><path d="M246,98.73l-56-64A8,8,0,0,0,184,32H72a8,8,0,0,0-6,2.73l-56,64a8,8,0,0,0,.17,10.73l112,120a8,8,0,0,0,11.7,0l112-120A8,8,0,0,0,246,98.73ZM222.37,96H180L144,48h36.37ZM74.58,112l30.13,75.33L34.41,112Zm89.6,0L128,202.46,91.82,112ZM96,96l32-42.67L160,96Zm85.42,16h40.17l-70.3,75.33ZM75.63,48H112L76,96H33.63Z"></path></svg>
            <div class="text-zinc-100 space-y-1">
              <div>
                امتیاز ها
              </div>
              <div>
                <?= $account_info['points'] ?>
              </div>
            </div>
          </div>
          <div class="flex md:w-1/4 gap-x-2 items-center bg-green-500 rounded-xl px-3 py-2 text-xs sm:text-base">
            <svg class="fill-zinc-100 bg-green-600 rounded-xl p-1" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="#000000" viewBox="0 0 256 256"><path d="M216,64l-12.16,66.86A16,16,0,0,1,188.1,144H62.55L48,64Z" opacity="0.2"></path><path d="M222.14,58.87A8,8,0,0,0,216,56H54.68L49.79,29.14A16,16,0,0,0,34.05,16H16a8,8,0,0,0,0,16h18L59.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,152,204a28,28,0,1,0,28-28H83.17a8,8,0,0,1-7.87-6.57L72.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,222.14,58.87ZM96,204a12,12,0,1,1-12-12A12,12,0,0,1,96,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,192,204Zm4-74.57A8,8,0,0,1,188.1,136H69.22L57.59,72H206.41Z"></path></svg>
            <div class="text-zinc-100 space-y-1">
              <div>
               سفارشات کل
              </div>
              <div>
                <?= $account_info['all_order_count'] ?>
              </div>
            </div>
          </div>
          <div class="flex md:w-1/4 gap-x-2 items-center bg-blue-500 rounded-xl px-3 py-2 text-xs sm:text-base">
            <svg class="fill-zinc-100 bg-blue-600 rounded-xl p-1" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="#000000" viewBox="0 0 256 256"><path d="M16,152H48v56H16a8,8,0,0,1-8-8V160A8,8,0,0,1,16,152ZM204,56a28,28,0,0,0-12,2.71h0A28,28,0,1,0,176,85.29h0A28,28,0,1,0,204,56Z" opacity="0.2"></path><path d="M230.33,141.06a24.43,24.43,0,0,0-21.24-4.23l-41.84,9.62A28,28,0,0,0,140,112H89.94a31.82,31.82,0,0,0-22.63,9.37L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9ZM164,96a36,36,0,0,0,5.9-.48,36,36,0,1,0,28.22-47A36,36,0,1,0,164,96Zm60-12a20,20,0,1,1-20-20A20,20,0,0,1,224,84ZM164,40a20,20,0,0,1,19.25,14.61,36,36,0,0,0-15,24.93A20.42,20.42,0,0,1,164,80a20,20,0,0,1,0-40Z"></path></svg>
            <div class="text-zinc-100 space-y-1">
              <div>
                تحویل داده شده
              </div>
              <div>
                <?= $completed_orders_count['completed_orders_count'] ?>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-10 overflow-x-auto">
          <div class="text-zinc-800 text-lg mb-4">
            سفارش های اخیر من:
          </div>
          <table class="w-full">
              <thead>
                <tr class="border-y">
                  <th>
                    <p class="text-xs md:text-sm font-normal flex items-center text-zinc-400 py-3">
                      شماره سفارش
                    </p>
                  </th>
                  <th>
                    <p class="text-xs md:text-sm font-normal flex items-center text-zinc-400">
                      تاریخ
                    </p>
                  </th>
                  <th>
                    <p class="text-xs md:text-sm font-normal flex items-center text-zinc-400">
                       مبلغ کل
                    </p>
                  </th>
                  <th>
                    <p class="text-xs md:text-sm font-normal flex items-center text-zinc-400">
                      وضعیت
                    </p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($orders as $order){ ?>
                <tr class="hover:bg-zinc-100 text-xs md:text-sm">
                  <td class="px-3 py-4 border-b">
                    <p class="text-zinc-700">
                     <?= $order['id'] ?>
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-zinc-700">
                     <?= $order['date'] ?>  
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-zinc-700">
                     <?= $order['total_order_price'] ?>
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <?php if($order['status'] == 'Processing'){ ?>
                    <p class="text-yellow-500">
                    در حال انجام
                    </p>
                    <?php }else if($order['status'] == 'Completed'){ ?>
                      <p class="text-green-600">
                        تکمیل شده
                    </p>
                    <?php }else if($order['status'] == 'Canceled'){ ?>
                      <p class="text-red-500">
                    لغو شده
                    </p>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
                <!-- <tr class="hover:bg-zinc-100 text-xs md:text-sm">
                  <td class="px-3 py-4 border-b">
                    <p class="text-zinc-700">
                      #2H5Y5u
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-zinc-700">
                      1402/11/08
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-zinc-700">
                      730,000 تومان
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-green-600">
                     پرداخت شده
                    </p>
                  </td>
                </tr>
                <tr class="hover:bg-zinc-100 text-xs md:text-sm">
                  <td class="px-3 py-4 border-b">
                    <p class="text-zinc-700">
                      #R34trU
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-zinc-700">
                      1402/11/01
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-zinc-700">
                      1,900,000 تومان
                    </p>
                  </td>
                  <td class="p-3 border-b">
                    <p class="text-red-500">
                      لغو شده
                    </p>
                  </td>
                </tr> -->
              </tbody>
          </table>
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