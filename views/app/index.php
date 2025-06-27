<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>صفحه اصلی</title>

  <link rel="stylesheet" href="<?= url('public/app/assets/css/main.css') ?>">

</head>
<body class="mx-auto bg-[#fcfcfc]">
	<!-- header -->
	<?php
	require_once (BASE_PATH . '/views/app/layouts/header.php')
	?>
	<!-- end header -->
  <main class="pt-24 md:pt-36 max-w-[1600px] mx-auto px-3 md:px-6">
    <!-- hero slider -->
    <div>
        <?php $message = flash('add_to_cart');
          if(!empty($message)){ ?>
            <br><h3 style="color:green" ><?= $message ?></h3><br>
        <?php } ?>
    </div>
    <div>
      <div class="swiper heroSlider rounded-xl relative">
        <div class="swiper-wrapper">
          <?php foreach($banners as $banner){ ?>
          <a href="<?= $banner['url'] ?>" class="swiper-slide">
            <img class="w-full h-60 md:h-auto object-cover object-bottom" src="<?= $banner['image'] ?>" alt="">
          </a>
          <?php } ?>
          <!-- <a href="" class="swiper-slide">
            <img class="w-full h-60 md:h-auto object-cover object-bottom" src="<?= url('public/app/assets/image/heroSlider/2.gif') ?>" alt="">
          </a>
          <a href="" class="swiper-slide">
            <img class="w-full h-60 md:h-auto object-cover object-bottom" src="<?= url('public/app/assets/image/heroSlider/3.webp') ?>" alt="">
          </a>
          <a href="" class="swiper-slide">
            <img class="w-full h-60 md:h-auto object-cover object-bottom" src="<?= url('public/app/assets/image/heroSlider/4.webp') ?>" alt="">
          </a>
          <a href="" class="swiper-slide">
            <img class="w-full h-60 md:h-auto object-cover object-bottom" src="<?= url('public/app/assets/image/heroSlider/5.webp') ?>" alt="">
          </a> -->
        </div>
        <div class="swiper-button-next shadow-lg"></div>
        <div class="swiper-button-prev shadow-lg"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <!-- category section -->
    <div class="text-center text-3xl font-semibold text-gray-800 mt-12 mb-4">
      دسته بندی محصولات
    </div>
    <div class="px-10 lg:px-16 mx-auto grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-7 xl:grid-cols-10 gap-3 md:gap-5 mb-10">
      <?php foreach($mainCategories as $mainCategory){ ?>
	<a href="<?= url('product/' . $mainCategory['id']) ?>" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105 relative">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/1.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          <?= $mainCategory['name'] ?>
        </p>
      </a>
	  <?php } ?>
      <!-- <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/2.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          ساعت
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/3.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          کنسول بازی
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/4.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          لپ تاپ
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/5.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          ایرپاد
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/6.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          تبلت
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/7.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          مودم
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/8.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          شارژر
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/9.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          اسپیکر
        </p>
      </a>
      <a href="" class="rounded-xl group hover:shadow-xl hover:bg-blue-500 shadow-lg transition-all delay-75 bg-gray-50 hover:scale-105">
        <img class="rounded-xl p-5 md:group-hover:scale-125 transition-all duration-500" src="<?= url('public/app/assets/image/category/10.webp') ?>" alt="">
        <p class="text-center text-zinc-500 group-hover:text-zinc-50 pb-2 delay-75">
          هارد
        </p>
      </a> -->
    </div>
    <!-- off slider -->
    <div class="flex gap-x-5 mt-32 mb-20 relative h-[620px]">
      <div class="bg-blue-400 w-full h-96 rounded-2xl -top-10 absolute z-0">
      </div>
      <div class="w-full">
        <div class="swiper offSlider">
          <div class="swiper-wrapper items-start pb-5">
            <div class="card swiper-slide">
              <div class="z-50 mt-14">
                <div class="flex flex-col justify-center items-center">
                  <p class="text-center text-white text-sm md:text-xl font-semibold mb-2">
                    تخفیف های ویژه زمان دار
                  </p>
                  <p class="text-center text-white mb-5 text-xs md:text-base">
                    همین حالا سفارشتان را ثبت کنید!
                  </p>
                  <img class="w-10/12 mx-auto" src="assets/image/off.png" alt="">
                  <a href="<?= url('products/time_limited_discounts') ?>" class="group border border-gray-300 bg-white hover:bg-blue-500 transition flex items-center justify-center gap-x-2 h-auto text-gray-600 hover:text-white mt-5 text-sm rounded-lg py-3 w-10/12 md:w-6/12 text-center">
                    مشاهده همه
                    <svg class="fill-gray-600 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path></svg>
                  </a>
                </div>
              </div>
            </div>
            <?php foreach($products as $product){ ?> 
            <div class="card swiper-slide my-2 p-2 md:p-3 bg-white rounded-xl relative group shadow-lg">
              <div class="countdown flex flex-row-reverse justify-start items-center gap-x-1 text-white bg-cyan-500 rounded-full px-2 py-1 mr-auto w-fit">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>
                <div class="days-container hidden">
                  <span id="days" class="text-xs md:text-base"></span>
                </div>
                <div class="hours-container">
                  <span id="hours" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="minutes-container">
                  <span id="minutes" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="seconds-container">
                  <span id="seconds" class="text-xs md:text-base"></span>
                </div>
              </div>
              <div class="absolute left-3 mt-3 text-gray-500 opacity-0 group-hover:opacity-100 transition-all text-sm md:text-base flex flex-col items-center">
                <svg class="fill-gray-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <div class="image-box mb-6 ">
                <img class="w-full mx-auto" src="<?= asset($product['image']) ?>" alt="" />
              </div>
              <!-- <p class="text-xs md:text-sm text-gray-400">
                apple watch s pro ff
              </p> -->
              <a href="<?= url('product/details/' . $product['product_id']) ?>" class="text-gray-700 font-semibold text-sm md:text-base">
               <?= $product['product_title'] ?>
              </a>
              <div class="mt-8 flex flex-row-reverse items-center justify-between">
                <div class="space-y-2">
                  <div class="flex justify-end opacity-65">
                    <div class="line-through decoration-gray-500 text-xs"><?= number_format($product['price']) ?></div>
                    <div class="line-through decoration-gray-500 text-xs">تومان</div>
                  </div>
                  <div class="flex flex-row-reverse items-center gap-x-1">
                    <div class="flex justify-end mt-1 mb-1 text-zinc-800 font-semibold">
                      <div class="text-sm md:text-base"><?= number_format($product['price'] - $product['discount_amount']) ?></div>
                      <div class="text-sm md:text-base">تومان</div>
                    </div>
                    <div class="bg-blue-500 h-fit text-white rounded-full text-xs md:text-sm px-2 py-1">
                      <?= $product['discount_percentage'] ?>%
                    </div>
                  </div>
                </div>
                <a href="<?= url('product/add-cart/' . $product['product_id']) ?>" class="group/edit border border-gray-300 p-1 md:p-2 rounded-md shadow-lg hover:bg-blue-500 transition">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                </a>
              </div>
              <div class="hidden group-hover:flex opacity-0 group-hover:opacity-100 transition-all items-center justify-between border-t mt-5 pt-5 gap-x-4">
                <div class="group/edit border bg-gray-100 border-gray-300 p-2 h-auto rounded-lg shadow-md hover:bg-red-500 transition cursor-pointer">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path></svg>
                </div>
                <a href="<?= url('product/details/' . $product['product_id']) ?>" class="bg-blue-600 hover:bg-blue-500 transition h-auto text-white text-sm rounded-lg py-3 w-full text-center">
                  جزئیات محصول
                </a>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="card swiper-slide my-2 p-2 md:p-3 bg-white rounded-xl relative group shadow-lg">
              <div class="countdown flex flex-row-reverse justify-start items-center gap-x-1 text-white bg-cyan-500 rounded-full px-2 py-1 mr-auto w-fit">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>
                <div class="days-container hidden">
                  <span id="days" class="text-xs md:text-base"></span>
                </div>
                <div class="hours-container">
                  <span id="hours" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="minutes-container">
                  <span id="minutes" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="seconds-container">
                  <span id="seconds" class="text-xs md:text-base"></span>
                </div>
              </div>
              <div class="absolute left-3 mt-3 text-gray-500 opacity-0 group-hover:opacity-100 transition-all text-sm md:text-base flex flex-col items-center">
                <svg class="fill-gray-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <div class="image-box mb-6 ">
                <img class="w-full mx-auto" src="<?= url('public/app/assets/image/products/3.webp') ?>" alt="" />
              </div>
              <p class="text-xs md:text-sm text-gray-400">
                apple watch s pro ff
              </p>
              <a href="" class="text-gray-700 font-semibold text-sm md:text-base">
                ساعت هوشمند اپل واچ سری 7 نسخه 35 میلی متری
              </a>
              <div class="mt-8 flex flex-row-reverse items-center justify-between">
                <div class="space-y-2">
                  <div class="flex justify-end opacity-65">
                    <div class="line-through decoration-gray-500 text-xs">1.350.000</div>
                    <div class="line-through decoration-gray-500 text-xs">تومان</div>
                  </div>
                  <div class="flex flex-row-reverse items-center gap-x-1">
                    <div class="flex justify-end mt-1 mb-1 text-zinc-800 font-semibold">
                      <div class="text-sm md:text-base">1.100.000</div>
                      <div class="text-sm md:text-base">تومان</div>
                    </div>
                    <div class="bg-blue-500 h-fit text-white rounded-full text-xs md:text-sm px-2 py-1">
                      30%
                    </div>
                  </div>
                </div>
                <a href="" class="group/edit border border-gray-300 p-1 md:p-2 rounded-md shadow-lg hover:bg-blue-500 transition">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                </a>
              </div>
              <div class="hidden group-hover:flex opacity-0 group-hover:opacity-100 transition-all items-center justify-between border-t mt-5 pt-5 gap-x-4">
                <div class="group/edit border bg-gray-100 border-gray-300 p-2 h-auto rounded-lg shadow-md hover:bg-red-500 transition cursor-pointer">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path></svg>
                </div>
                <a href="" class="bg-blue-600 hover:bg-blue-500 transition h-auto text-white text-sm rounded-lg py-3 w-full text-center">
                  جزئیات محصول
                </a>
              </div>
            </div>
            <div class="card swiper-slide my-2 p-2 md:p-3 bg-white rounded-xl relative group shadow-lg">
              <div class="countdown flex flex-row-reverse justify-start items-center gap-x-1 text-white bg-cyan-500 rounded-full px-2 py-1 mr-auto w-fit">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>
                <div class="days-container hidden">
                  <span id="days" class="text-xs md:text-base"></span>
                </div>
                <div class="hours-container">
                  <span id="hours" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="minutes-container">
                  <span id="minutes" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="seconds-container">
                  <span id="seconds" class="text-xs md:text-base"></span>
                </div>
              </div>
              <div class="absolute left-3 mt-3 text-gray-500 opacity-0 group-hover:opacity-100 transition-all text-sm md:text-base flex flex-col items-center">
                <svg class="fill-gray-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <div class="image-box mb-6 ">
                <img class="w-full mx-auto" src="<?= url('public/app/assets/image/products/4.webp') ?>" alt="" />
              </div>
              <p class="text-xs md:text-sm text-gray-400">
                apple watch s pro ff
              </p>
              <a href="" class="text-gray-700 font-semibold text-sm md:text-base">
                ساعت هوشمند اپل واچ سری 7 نسخه 35 میلی متری
              </a>
              <div class="mt-8 flex flex-row-reverse items-center justify-between">
                <div class="space-y-2">
                  <div class="flex justify-end opacity-65">
                    <div class="line-through decoration-gray-500 text-xs">1.350.000</div>
                    <div class="line-through decoration-gray-500 text-xs">تومان</div>
                  </div>
                  <div class="flex flex-row-reverse items-center gap-x-1">
                    <div class="flex justify-end mt-1 mb-1 text-zinc-800 font-semibold">
                      <div class="text-sm md:text-base">1.100.000</div>
                      <div class="text-sm md:text-base">تومان</div>
                    </div>
                    <div class="bg-blue-500 h-fit text-white rounded-full text-xs md:text-sm px-2 py-1">
                      30%
                    </div>
                  </div>
                </div>
                <a href="" class="group/edit border border-gray-300 p-1 md:p-2 rounded-md shadow-lg hover:bg-blue-500 transition">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                </a>
              </div>
              <div class="hidden group-hover:flex opacity-0 group-hover:opacity-100 transition-all items-center justify-between border-t mt-5 pt-5 gap-x-4">
                <div class="group/edit border bg-gray-100 border-gray-300 p-2 h-auto rounded-lg shadow-md hover:bg-red-500 transition cursor-pointer">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path></svg>
                </div>
                <a href="" class="bg-blue-600 hover:bg-blue-500 transition h-auto text-white text-sm rounded-lg py-3 w-full text-center">
                  جزئیات محصول
                </a>
              </div>
            </div>
            <div class="card swiper-slide my-2 p-2 md:p-3 bg-white rounded-xl relative group shadow-lg">
              <div class="countdown flex flex-row-reverse justify-start items-center gap-x-1 text-white bg-cyan-500 rounded-full px-2 py-1 mr-auto w-fit">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>
                <div class="days-container hidden">
                  <span id="days" class="text-xs md:text-base"></span>
                </div>
                <div class="hours-container">
                  <span id="hours" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="minutes-container">
                  <span id="minutes" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="seconds-container">
                  <span id="seconds" class="text-xs md:text-base"></span>
                </div>
              </div>
              <div class="absolute left-3 mt-3 text-gray-500 opacity-0 group-hover:opacity-100 transition-all text-sm md:text-base flex flex-col items-center">
                <svg class="fill-gray-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <div class="image-box mb-6 ">
                <img class="w-full mx-auto" src="<?= url('public/app/assets/image/products/5.webp') ?>" alt="" />
              </div>
              <p class="text-xs md:text-sm text-gray-400">
                apple watch s pro ff
              </p>
              <a href="" class="text-gray-700 font-semibold text-sm md:text-base">
                ساعت هوشمند اپل واچ سری 7 نسخه 35 میلی متری
              </a>
              <div class="mt-8 flex flex-row-reverse items-center justify-between">
                <div class="space-y-2">
                  <div class="flex justify-end opacity-65">
                    <div class="line-through decoration-gray-500 text-xs">1.350.000</div>
                    <div class="line-through decoration-gray-500 text-xs">تومان</div>
                  </div>
                  <div class="flex flex-row-reverse items-center gap-x-1">
                    <div class="flex justify-end mt-1 mb-1 text-zinc-800 font-semibold">
                      <div class="text-sm md:text-base">1.100.000</div>
                      <div class="text-sm md:text-base">تومان</div>
                    </div>
                    <div class="bg-blue-500 h-fit text-white rounded-full text-xs md:text-sm px-2 py-1">
                      30%
                    </div>
                  </div>
                </div>
                <a href="" class="group/edit border border-gray-300 p-1 md:p-2 rounded-md shadow-lg hover:bg-blue-500 transition">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                </a>
              </div>
              <div class="hidden group-hover:flex opacity-0 group-hover:opacity-100 transition-all items-center justify-between border-t mt-5 pt-5 gap-x-4">
                <div class="group/edit border bg-gray-100 border-gray-300 p-2 h-auto rounded-lg shadow-md hover:bg-red-500 transition cursor-pointer">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path></svg>
                </div>
                <a href="" class="bg-blue-600 hover:bg-blue-500 transition h-auto text-white text-sm rounded-lg py-3 w-full text-center">
                  جزئیات محصول
                </a>
              </div>
            </div>
            <div class="card swiper-slide my-2 p-2 md:p-3 bg-white rounded-xl relative group shadow-lg">
              <div class="countdown flex flex-row-reverse justify-start items-center gap-x-1 text-white bg-cyan-500 rounded-full px-2 py-1 mr-auto w-fit">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>
                <div class="days-container hidden">
                  <span id="days" class="text-xs md:text-base"></span>
                </div>
                <div class="hours-container">
                  <span id="hours" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="minutes-container">
                  <span id="minutes" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="seconds-container">
                  <span id="seconds" class="text-xs md:text-base"></span>
                </div>
              </div>
              <div class="absolute left-3 mt-3 text-gray-500 opacity-0 group-hover:opacity-100 transition-all text-sm md:text-base flex flex-col items-center">
                <svg class="fill-gray-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <div class="image-box mb-6 ">
                <img class="w-full mx-auto" src="<?= url('public/app/assets/image/products/6.webp') ?>" alt="" />
              </div>
              <p class="text-xs md:text-sm text-gray-400">
                apple watch s pro ff
              </p>
              <a href="" class="text-gray-700 font-semibold text-sm md:text-base">
                ساعت هوشمند اپل واچ سری 7 نسخه 35 میلی متری
              </a>
              <div class="mt-8 flex flex-row-reverse items-center justify-between">
                <div class="space-y-2">
                  <div class="flex justify-end opacity-65">
                    <div class="line-through decoration-gray-500 text-xs">1.350.000</div>
                    <div class="line-through decoration-gray-500 text-xs">تومان</div>
                  </div>
                  <div class="flex flex-row-reverse items-center gap-x-1">
                    <div class="flex justify-end mt-1 mb-1 text-zinc-800 font-semibold">
                      <div class="text-sm md:text-base">1.100.000</div>
                      <div class="text-sm md:text-base">تومان</div>
                    </div>
                    <div class="bg-blue-500 h-fit text-white rounded-full text-xs md:text-sm px-2 py-1">
                      30%
                    </div>
                  </div>
                </div>
                <a href="" class="group/edit border border-gray-300 p-1 md:p-2 rounded-md shadow-lg hover:bg-blue-500 transition">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                </a>
              </div>
              <div class="hidden group-hover:flex opacity-0 group-hover:opacity-100 transition-all items-center justify-between border-t mt-5 pt-5 gap-x-4">
                <div class="group/edit border bg-gray-100 border-gray-300 p-2 h-auto rounded-lg shadow-md hover:bg-red-500 transition cursor-pointer">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path></svg>
                </div>
                <a href="" class="bg-blue-600 hover:bg-blue-500 transition h-auto text-white text-sm rounded-lg py-3 w-full text-center">
                  جزئیات محصول
                </a>
              </div>
            </div>
            <div class="card swiper-slide my-2 p-2 md:p-3 bg-white rounded-xl relative group shadow-lg">
              <div class="countdown flex flex-row-reverse justify-start items-center gap-x-1 text-white bg-cyan-500 rounded-full px-2 py-1 mr-auto w-fit">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>
                <div class="days-container hidden">
                  <span id="days" class="text-xs md:text-base"></span>
                </div>
                <div class="hours-container">
                  <span id="hours" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="minutes-container">
                  <span id="minutes" class="text-xs md:text-base"></span>
                </div>
                <div>:</div>
                <div class="seconds-container">
                  <span id="seconds" class="text-xs md:text-base"></span>
                </div>
              </div>
              <div class="absolute left-3 mt-3 text-gray-500 opacity-0 group-hover:opacity-100 transition-all text-sm md:text-base flex flex-col items-center">
                <svg class="fill-gray-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <div class="image-box mb-6 ">
                <img class="w-full mx-auto" src="<?= url('public/app/assets/image/products/7.webp') ?>" alt="" />
              </div>
              <p class="text-xs md:text-sm text-gray-400">
                apple watch s pro ff
              </p>
              <a href="" class="text-gray-700 font-semibold text-sm md:text-base">
                ساعت هوشمند اپل واچ سری 7 نسخه 35 میلی متری
              </a>
              <div class="mt-8 flex flex-row-reverse items-center justify-between">
                <div class="space-y-2">
                  <div class="flex justify-end opacity-65">
                    <div class="line-through decoration-gray-500 text-xs">1.350.000</div>
                    <div class="line-through decoration-gray-500 text-xs">تومان</div>
                  </div>
                  <div class="flex flex-row-reverse items-center gap-x-1">
                    <div class="flex justify-end mt-1 mb-1 text-zinc-800 font-semibold">
                      <div class="text-sm md:text-base">1.100.000</div>
                      <div class="text-sm md:text-base">تومان</div>
                    </div>
                    <div class="bg-blue-500 h-fit text-white rounded-full text-xs md:text-sm px-2 py-1">
                      30%
                    </div>
                  </div>
                </div>
                <a href="" class="group/edit border border-gray-300 p-1 md:p-2 rounded-md shadow-lg hover:bg-blue-500 transition">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                </a>
              </div>
              <div class="hidden group-hover:flex opacity-0 group-hover:opacity-100 transition-all items-center justify-between border-t mt-5 pt-5 gap-x-4">
                <div class="group/edit border bg-gray-100 border-gray-300 p-2 h-auto rounded-lg shadow-md hover:bg-red-500 transition cursor-pointer">
                  <svg class="group-hover/edit:fill-white transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path></svg>
                </div>
                <a href="" class="bg-blue-600 hover:bg-blue-500 transition h-auto text-white text-sm rounded-lg py-3 w-full text-center">
                  جزئیات محصول
                </a>
              </div>
            </div>   -->
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
    <!-- 2 image -->
    <!-- <div class="flex flex-col md:flex-row items-center justify-center gap-x-5 gap-y-24">
      <div class="md:w-1/2 bg-gradient-to-r from-blue-400 to-blue-600 w-full lg:h-72 rounded-xl lg:rounded-3xl relative p-2">
        <img class="absolute mx-auto w-96 md:w-[400px] -top-20" src="<?= url('public/app/assets/image/products/8.webp') ?>" alt="">
        <div class="lg:absolute left-10 top-10 max-w-96 pt-64 lg:pt-0 mx-auto">
          <p class="text-white text-5xl lg:text-6xl text-wrap font-semibold text-left">
            MacBook Pro 2024
          </p>
          <p class="text-white lg:text-lg text-right my-2 lg:pr-16">
            چرا از نسخه های جدید استفاده نمیکنی؟
          </p>
          <a href="" class="mx-auto flex justify-center items-center gap-x-2 text-blue-500 bg-white hover:bg-gray-100 transition-all p-3 rounded-xl mt-4 lg:mr-16">
            مشاهده محصول
            <svg class="fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V72H40V56Zm0,144H40V88H216V200Zm-40-88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
          </a>
        </div>
      </div>
      <div class="md:w-1/2 bg-gradient-to-r from-orange-400 to-orange-600 w-full lg:h-72 rounded-xl lg:rounded-3xl relative p-2">
        <img class="absolute mx-auto w-72 md:w-[300px] -top-24 left-5" src="<?= url('public/app/assets/image/products/9.webp') ?>" alt="">
        <div class="lg:absolute right-10 top-10 max-w-96 pt-64 lg:pt-0 mx-auto">
          <p class="text-white text-5xl lg:text-6xl text-wrap font-semibold text-left">
            Gaming Case 2024
          </p>
          <p class="text-white lg:text-lg text-left my-2">
            کیس های اسمبل شده گیمینگ با طراحی زیبا
          </p>
          <a href="" class="mx-auto flex justify-center items-center gap-x-2 text-orange-500 bg-white hover:bg-gray-100 transition-all p-3 rounded-xl mt-4 lg:mr-16">
            مشاهده محصول
            <svg class="fill-orange-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V72H40V56Zm0,144H40V88H216V200Zm-40-88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
          </a>
        </div>
      </div>
    </div> -->
    <!-- slider 1 -->
    <div>
      <div>
        <div class="text-center text-3xl font-semibold text-gray-800 mt-20">
          محبوب ترین محصولات
        </div>
        <!-- <a href="" class="flex justify-center items-center gap-x-1 group mb-6 mt-4 w-fit mx-auto text-blue-600">
          مشاهده همه
          <svg class="group-hover:-translate-x-1 transition fill-blue-600" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path></svg>
        </a> -->
      </div>
      <div class="w-full relative">
        <div class="bg-blue-400 w-full h-44 rounded-3xl bottom-0 absolute z-0">
        </div>
        <div class="swiper productSlider1">
          <div class="swiper-wrapper items-start pb-5">
            <?php foreach($favorite_products as $product){ ?>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <img src="<?= asset($product['image']) ?>" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="<?= url('product/details/' . $product['product_id']) ?>" class="text-zinc-700 text-sm md:text-base">
                    <?= $product['title'] ?>
                  </a>
                  <div class="flex justify-between items-end">
                  <?php if($product['discount_percentage'] != null){ ?>
                              <div class="text-blue-800 font-semibold text-base md:text-lg">
                              <?= number_format($product['price'] - $product['discount_amount']) ?>
                              <span class="text-xs">تومان</span>
                              </div>
                              <div class="text-blue-500 text-sm line-through">
                              <?= number_format($product['price']) ?>
                              <span class="text-xs">تومان</span>
                              </div>
                              <?php }else{ ?>
                              <div class="text-blue-800 font-semibold text-base md:text-lg">
                              <?= number_format($product['price']) ?>
                              <span class="text-xs">تومان</span>
                              </div>
                              <?php } ?>
                              
                </div>
                </div>
              </div>
              <a href="<?= url('product/details/' . $product['product_id']) ?>" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <?php } ?>
            <!-- <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.8
              </div>
              <img src="./assets/image/products/6.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    جارو برقی هوشمند شیائومی
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    3,740,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.4
              </div>
              <img src="./assets/image/products/5.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    هدفون برند نیا
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    970,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.5
              </div>
              <img src="./assets/image/products/4.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    پایه نگهدارنده موبایل
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    210,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.9
              </div>
              <img src="./assets/image/products/7.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    تلویزیون سامسونگ 43 اینچ
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    9,630,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.5
              </div>
              <img src="./assets/image/products/3.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    هنذفری بلوتوثی شیائومی
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    1,140,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div> -->
          </div>
          <div class="swiper-button-next next-btn-2"></div>
          <div class="swiper-button-prev prev-btn-2"></div>
        </div>
      </div>
    </div>
    <!-- banner 1 -->
    <div>
      <a href="">
        <img class="rounded-xl lg:rounded-3xl my-14" src="./assets/image/banner/1.webp" alt="">
      </a>
    </div>
    <!-- slider 2 -->
    <div>
      <div>
        <div class="text-center text-3xl font-semibold text-gray-800 mt-20">
          جدیدترین محصولات
        </div>
        <!-- <a href="" class="flex justify-center items-center gap-x-1 group mb-6 mt-4 w-fit mx-auto text-blue-600">
          مشاهده همه
          <svg class="group-hover:-translate-x-1 transition fill-blue-600" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path></svg>
        </a> -->
      </div>
      <div class="w-full relative">
        <div class="bg-blue-400 w-full h-44 rounded-3xl bottom-0 absolute z-0">
        </div>
        <div class="swiper productSlider2">
          <div class="swiper-wrapper items-start pb-5">
          <?php foreach($newest_products as $product){ ?>
             <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.5
              </div>
              <img src="<?= asset($product['image']) ?>" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    <?= $product['title'] ?>
                  </a>
                  <div class="flex justify-between items-end">
                  <?php if($product['discount_percentage'] != 0){ ?>
                              <div class="text-blue-800 font-semibold text-base md:text-lg">
                              <?= number_format($product['price'] - $product['discount_amount']) ?>
                              <span class="text-xs">تومان</span>
                              </div>
                              <div class="text-blue-500 text-sm line-through">
                              <?= number_format($product['price']) ?>
                              <span class="text-xs">تومان</span>
                              </div>
                              <?php }else{ ?>
                              <div class="text-blue-800 font-semibold text-base md:text-lg">
                              <?= number_format($product['price']) ?>
                              <span class="text-xs">تومان</span>
                              </div>
                              <?php } ?>

                </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <?php } ?>
            <!-- <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.7
              </div>
              <img src="./assets/image/products/1.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    ساعت مچی اپل
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    1,750,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.8
              </div>
              <img src="./assets/image/products/6.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    جارو برقی هوشمند شیائومی
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    3,740,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.4
              </div>
              <img src="./assets/image/products/5.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    هدفون برند نیا
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    970,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div>
            <div class="card swiper-slide relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
              <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
                <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
                4.5
              </div>
              <img src="./assets/image/products/4.webp" alt="">
              <div class="my-5">
                <div class="flex flex-col gap-y-1">
                  <a href="" class="text-zinc-700 text-sm md:text-base">
                    پایه نگهدارنده موبایل
                  </a>
                  <div class="text-blue-800 text-base md:text-lg">
                    210,000 تومان
                  </div>
                </div>
              </div>
              <a href="" class="w-full block text-center p-2 rounded-lg shadow-lg bg-blue-500 hover:bg-blue-400 text-white transition">
                مشاهده و خرید
              </a>
            </div> -->
          </div>
          <div class="swiper-button-next next-btn-3"></div>
          <div class="swiper-button-prev prev-btn-3"></div>
        </div>
      </div>
    </div>
    <!-- what? -->
    <div class="my-28">
      <div class="text-center text-3xl font-semibold text-zinc-800 mb-10">
        چرا هایپر استار؟
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 md:gap-5 items-start">
        <div class="flex flex-col justify-center items-center">
          <svg class="fill-blue-600" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="" viewBox="0 0 256 256"><path d="M232,152a103.93,103.93,0,0,1-5.9,34.63,8,8,0,0,1-7.57,5.37H37.46a8.05,8.05,0,0,1-7.57-5.41A104.06,104.06,0,0,1,24,151.19C24.44,94,71.73,47.49,129,48A104,104,0,0,1,232,152Z" opacity="0.2"></path><path d="M114.34,154.34l96-96a8,8,0,0,1,11.32,11.32l-96,96a8,8,0,0,1-11.32-11.32ZM128,88a63.9,63.9,0,0,1,20.44,3.33,8,8,0,1,0,5.11-15.16A80,80,0,0,0,48.49,160.88,8,8,0,0,0,56.43,168c.29,0,.59,0,.89-.05a8,8,0,0,0,7.07-8.83A64.92,64.92,0,0,1,64,152,64.07,64.07,0,0,1,128,88Zm99.74,13a8,8,0,0,0-14.24,7.3,96.27,96.27,0,0,1,5,75.71l-181.1-.07A96.24,96.24,0,0,1,128,56h.88a95,95,0,0,1,42.82,10.5A8,8,0,1,0,179,52.27,110.8,110.8,0,0,0,129,40h-1A112.05,112.05,0,0,0,22.35,189.25,16.07,16.07,0,0,0,37.46,200H218.53a16,16,0,0,0,15.11-10.71,112.35,112.35,0,0,0-5.9-88.3Z"></path></svg>
          <p class="md:text-lg font-semibold mb-2">
            خیلی سریعه !
          </p>
          <p class="text-center text-zinc-600">
            چون کمتر از 5 روز کاری محموله به دستت می رسه.
          </p>
        </div>
        <div class="flex flex-col justify-center items-center">
          <svg class="fill-blue-600" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="" viewBox="0 0 256 256"><path d="M232,96v96a8,8,0,0,1-8,8H32a8,8,0,0,1-8-8V96Z" opacity="0.2"></path><path d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z"></path></svg>
          <p class="md:text-lg font-semibold mb-2">
            قابلیت پرداخت درب منزل
          </p>
          <p class="text-center text-zinc-600">
            انتخاب روش پرداختت با خودته. آنلاین یا با کارتخوان در محل.
          </p>
        </div>
        <div class="flex flex-col justify-center items-center">
          <svg class="fill-blue-600" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="" viewBox="0 0 256 256"><path d="M224,96a64,64,0,0,1-94.94,56L73,217A24,24,0,0,1,39,183L104,126.94a64,64,0,0,1,80-90.29L144,80l5.66,26.34L176,112l43.35-40A63.8,63.8,0,0,1,224,96Z" opacity="0.2"></path><path d="M226.76,69a8,8,0,0,0-12.84-2.88l-40.3,37.19-17.23-3.7-3.7-17.23,37.19-40.3A8,8,0,0,0,187,29.24,72,72,0,0,0,88,96,72.34,72.34,0,0,0,94,124.94L33.79,177c-.15.12-.29.26-.43.39a32,32,0,0,0,45.26,45.26c.13-.13.27-.28.39-.42L131.06,162A72,72,0,0,0,232,96,71.56,71.56,0,0,0,226.76,69ZM160,152a56.14,56.14,0,0,1-27.07-7,8,8,0,0,0-9.92,1.77L67.11,211.51a16,16,0,0,1-22.62-22.62L109.18,133a8,8,0,0,0,1.77-9.93,56,56,0,0,1,58.36-82.31l-31.2,33.81a8,8,0,0,0-1.94,7.1L141.83,108a8,8,0,0,0,6.14,6.14l26.35,5.66a8,8,0,0,0,7.1-1.94l33.81-31.2A56.06,56.06,0,0,1,160,152Z"></path></svg>
          <p class="md:text-lg font-semibold mb-2">
            خیلی کاربردیه
          </p>
          <p class="text-center text-zinc-600">
            میتونی هم زمان از هر چند تا فروشگاهی که میخوای خرید کنی.
          </p>
        </div>
        <div class="flex flex-col justify-center items-center">
          <svg class="fill-blue-600" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="" viewBox="0 0 256 256"><path d="M248,120v64a8,8,0,0,1-8,8H216a24,24,0,0,0-48,0H104a24,24,0,0,0-48,0H32a8,8,0,0,1-8-8V144H184V120Z" opacity="0.2"></path><path d="M255.42,117l-14-35A15.93,15.93,0,0,0,226.58,72H192V64a8,8,0,0,0-8-8H32A16,16,0,0,0,16,72V184a16,16,0,0,0,16,16H49a32,32,0,0,0,62,0h50a32,32,0,0,0,62,0h17a16,16,0,0,0,16-16V120A7.94,7.94,0,0,0,255.42,117ZM192,88h34.58l9.6,24H192ZM32,72H176v64H32ZM80,208a16,16,0,1,1,16-16A16,16,0,0,1,80,208Zm81-24H111a32,32,0,0,0-62,0H32V152H176v12.31A32.11,32.11,0,0,0,161,184Zm31,24a16,16,0,1,1,16-16A16,16,0,0,1,192,208Zm48-24H223a32.06,32.06,0,0,0-31-24V128h48Z"></path></svg>
          <p class="md:text-lg font-semibold mb-2">
            ارسال به کل ایران
          </p>
          <p class="text-center text-zinc-600">
            هر کجای کشور پهناور ایران باشی به دستت میرسونیم.
          </p>
        </div>
      </div>
    </div>
    <!-- partner company -->
    <div>
      <!-- top companys -->
      <div class="text-center text-2xl font-semibold text-zinc-800">
        محبوب ترین برند ها
      </div>
      <!-- main companys -->
      <div class="containerPSlider swiper">
        <div class="partnerCompany px-1">
          <div class="card-wrapper swiper-wrapper py-2 flex items-center">
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/1.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/2.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/3.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/4.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/5.jpg" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/1.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/2.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/3.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/4.png" alt="">
            </a>
            <a href="" class="card swiper-slide my-2 border-l p-2 sm:p-4">
              <img class="grayscale hover:grayscale-0 transition-all" src="./assets/image/brands/5.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- blog -->
    <!-- <div>
      <div>
        <div class="text-center text-3xl font-semibold text-gray-800 mt-20">
          خواندنی های هایپر استار
        </div>
        <a href="" class="flex justify-center items-center gap-x-1 group mb-6 mt-4 w-fit mx-auto text-blue-600">
          مشاهده همه
          <svg class="group-hover:-translate-x-1 transition fill-blue-600" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path></svg>
        </a>
      </div>
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white rounded-2xl border border-zinc-300 group">
          <a href="" class="image-box">
            <img class="rounded-t-2xl" src="./assets/image/blog/1.jpg" alt="" />
          </a>
          <div class="p-2 md:p-4 mt-2">
            <a href="./blog(single).html" class="font-semibold text-zinc-800">
              ۷ ترفند برای افزایش طول عمر هدفون
            </a>
            <p class="mb-4 mt-5 text-zinc-600">
              اگر از جمله کاربرانی هستید که هدفون‌های شما بعد از حدود یک یا دو سال استفاده خراب...
            </p>
            <a href="./blog(single).html" class="flex items-center justify-center w-fit mx-auto text-blue-600 hover:text-blue-400 transition">
              ادامه مطلب
            </a>
          </div>
        </div>
        <div class="bg-white rounded-2xl border border-zinc-300 group">
          <a href="" class="image-box">
            <img class="rounded-t-2xl" src="./assets/image/blog/2.jpg" alt="" />
          </a>
          <div class="p-2 md:p-4 mt-2">
            <a href="./blog(single).html" class="font-semibold text-zinc-800">
              ۷ ترفند برای افزایش طول عمر هدفون
            </a>
            <p class="mb-4 mt-5 text-zinc-600">
              اگر از جمله کاربرانی هستید که هدفون‌های شما بعد از حدود یک یا دو سال استفاده خراب...
            </p>
            <a href="./blog(single).html" class="flex items-center justify-center w-fit mx-auto text-blue-600 hover:text-blue-400 transition">
              ادامه مطلب
            </a>
          </div>
        </div>
        <div class="bg-white rounded-2xl border border-zinc-300 group">
          <a href="" class="image-box">
            <img class="rounded-t-2xl" src="./assets/image/blog/3.jpg" alt="" />
          </a>
          <div class="p-2 md:p-4 mt-2">
            <a href="./blog(single).html" class="font-semibold text-zinc-800">
              ۷ ترفند برای افزایش طول عمر هدفون
            </a>
            <p class="mb-4 mt-5 text-zinc-600">
              اگر از جمله کاربرانی هستید که هدفون‌های شما بعد از حدود یک یا دو سال استفاده خراب...
            </p>
            <a href="./blog(single).html" class="flex items-center justify-center w-fit mx-auto text-blue-600 hover:text-blue-400 transition">
              ادامه مطلب
            </a>
          </div>
        </div>
        <div class="bg-white rounded-2xl border border-zinc-300 group">
          <a href="" class="image-box">
            <img class="rounded-t-2xl" src="./assets/image/blog/4.jpg" alt="" />
          </a>
          <div class="p-2 md:p-4 mt-2">
            <a href="./blog(single).html" class="font-semibold text-zinc-800">
              ۷ ترفند برای افزایش طول عمر هدفون
            </a>
            <p class="mb-4 mt-5 text-zinc-600">
              اگر از جمله کاربرانی هستید که هدفون‌های شما بعد از حدود یک یا دو سال استفاده خراب...
            </p>
            <a href="./blog(single).html" class="flex items-center justify-center w-fit mx-auto text-blue-600 hover:text-blue-400 transition">
              ادامه مطلب
            </a>
          </div>
        </div>
      </div>
    </div> -->
  </main>
  
	<!-- footer -->
	<?php
	require_once (BASE_PATH . '/views/app/layouts/footer.php')
	?>
	<!-- end footer -->

</body>
  <!-- main javaScript code -->
  <script src="<?= url('public/app/assets/js/main.js') ?>"></script>

  <!-- slider -->
  <script src="<?= url('public/app/assets/js/dependencies/swiper.min.js') ?>"></script>
  <script src="<?= url('public/app/assets/js/sliders.js') ?>"></script>

</html>