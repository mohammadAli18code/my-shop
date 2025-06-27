<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>خطا</title>

  <link rel="stylesheet" href="<?= url('public/app/assets/css/main.css') ?>">

</head>
<body class="mx-auto bg-[#fcfcfc]">
	<!-- header -->
	<?php
	require_once (BASE_PATH . '/views/app/layouts/header.php')
	?>
	<!-- end header -->
  <main class="pt-24 md:pt-36 max-w-[1600px] mx-auto px-3 md:px-6">
    <div class="bg-white border rounded-xl shadow-lg p-4">
      <img class="mx-auto mt-10 mb-5" src="./assets/image/404.png" alt="">
      <p class="text-4xl md:text-6xl font-bold text-blue-600 text-center">
        خطا !!!
      </p>
      <p class="text-xl md:text-2xl font-semibold text-blue-600 text-center mt-2 mb-4">
        صفحه مورد نظر پیدا نشد !
      </p>
      <a href="" class="text-gray-800 mx-auto w-fit mb-2 block px-3 py-2 mt-3 rounded-xl bg-gradient-to-r from-gray-200 to-gray-300">
        محصولات پرطرفدار
      </a>
    </div>
  </main>
  <footer class="mt-44 relative flex justify-center">
    <div class="flex flex-col md:flex-row gap-y-7 justify-between md:items-center px-10 py-14 absolute mx-auto -top-32 bg-blue-600 w-11/12 rounded-2xl">
      <div class="flex flex-col gap-y-5">
        <p class="text-2xl text-center md:text-right md:text-4xl font-semibold text-gray-50">
          بهترین خرید رو تجربه کن!
        </p>
        <p class="text-lg text-center md:text-xl text-gray-100">
          به مشتریان خود خدمات شگفت انگیزی ارائه می دهیم.
        </p>
      </div>
      <div class="md:w-6/12">
        <p class="text-sm leading-7 md:text-lg text-gray-50">
          برای داشتن مشتریان همیشه راضی، کنترل کیفی دقیق لازم داریم. ارتباط عالی با مشتریان یکی از ویژگی های ماست. ما دائما درحال بررسی کیفیت محصولات هستیم تا مشتریانمان بهترین خدمات را دریافت کنند.
        </p>
        <button class="text-gray-800 bg-white px-3 py-2 mt-3 rounded-xl bg-gradient-to-r from-gray-200 to-gray-300">
          مشاهده محصولات
        </button>
      </div>
    </div>
    <div class="bg-zinc-950 pt-80 lg:pt-40 w-full pb-20 md:pb-0">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-y-7 lg:grid-cols-3 px-10">
        <div class="flex flex-col md:items-center">
          <div class="text-sky-500 mb-4 text-lg font-bold border-t-2 border-t-sky-700 w-fit pt-2">
            دسترسی سریع
          </div>
          <div class="">
            <ul class="flex flex-col gap-y-4">
              <li>
                <a class="text-gray-500 hover:text-blue-600 transition" href="">
                  تعرفه ها
                </a>
              </li>
              <li>
                <a class="text-gray-500 hover:text-blue-600 transition" href="./faq.html">
                  سوالات متداول
                </a>
              </li>
              <li>
                <a class="text-gray-500 hover:text-blue-600 transition" href="./contact-us.html">
                  تماس با ما
                </a>
              </li>
              <li>
                <a class="text-gray-500 hover:text-blue-600 transition" href="./about-us.html">
                  درباره ما
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="flex flex-col">
          <div class="text-sky-500 mb-4 text-lg font-bold border-t-2 border-t-sky-700 w-fit pt-2">
            راه های ارتباطی
          </div>
          <div>
            <ul class="flex flex-col gap-y-4">
              <li>
                <a class="text-gray-500 hover:text-blue-600 transition flex items-center gap-x-1 group w-fit" href="">
                  <svg class="group-hover:fill-blue-600 fill-gray-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M128,66a38,38,0,1,0,38,38A38,38,0,0,0,128,66Zm0,64a26,26,0,1,1,26-26A26,26,0,0,1,128,130Zm0-112a86.1,86.1,0,0,0-86,86c0,30.91,14.34,63.74,41.47,94.94a252.32,252.32,0,0,0,41.09,38,6,6,0,0,0,6.88,0,252.32,252.32,0,0,0,41.09-38c27.13-31.2,41.47-64,41.47-94.94A86.1,86.1,0,0,0,128,18Zm0,206.51C113,212.93,54,163.62,54,104a74,74,0,0,1,148,0C202,163.62,143,212.93,128,224.51Z"></path></svg>
                تهران - خیابان دماوند - خروجی اول - مجموعه هایپر استار
                </a>
              </li>
              <li>
                <a class="text-gray-500 hover:text-blue-600 transition flex items-center gap-x-1 group w-fit" href="">
                  <svg class="group-hover:fill-blue-600 fill-gray-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M128,26a102,102,0,0,0,0,204c21.13,0,43.31-6.35,59.32-17a6,6,0,0,0-6.65-10c-13.9,9.25-34.09,15-52.67,15a90,90,0,1,1,90-90c0,29.58-13.78,34-22,34s-22-4.42-22-34V88a6,6,0,0,0-12,0v9a46,46,0,1,0,4.34,56.32C171.76,166.6,182,174,196,174c21.29,0,34-17.2,34-46A102.12,102.12,0,0,0,128,26Zm0,136a34,34,0,1,1,34-34A34,34,0,0,1,128,162Z"></path></svg>
                  example@gmail.com
                </a>
              </li>
              <li>
                <a class="text-gray-500 hover:text-blue-600 transition flex items-center gap-x-1 group w-fit" href="">
                  <svg class="group-hover:fill-blue-600 fill-gray-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M176,18H80A22,22,0,0,0,58,40V216a22,22,0,0,0,22,22h96a22,22,0,0,0,22-22V40A22,22,0,0,0,176,18Zm10,198a10,10,0,0,1-10,10H80a10,10,0,0,1-10-10V40A10,10,0,0,1,80,30h96a10,10,0,0,1,10,10ZM138,60a10,10,0,1,1-10-10A10,10,0,0,1,138,60Z"></path></svg>
                  0912345678
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="flex justify-center gap-x-5">
          <img class="max-w-32 h-fit bg-white rounded-xl" src="./assets/image/service/symbol-01.png" alt="">
          <img class="max-w-32 h-fit bg-white rounded-xl" src="./assets/image/service/symbol-02.png" alt="">
        </div>
      </div>
      <div class="mt-5 border-t w-full text-xs text-zinc-500 pr-5 py-5">
        تمامی حقوق توسط امیررضا کریمی محفوظ است.
      </div>
    </div>
  </footer>
</body>
  <!-- main javaScript code -->
  <script src="<?= url('public/app/assets/js/main.js') ?>"></script>

</html>