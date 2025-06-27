<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>محصول</title>

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

    <?php
        $add_comment = flash('add_comment');
        $loginMessage = flash('login');
        $addFavoriteMessage = flash('add_favorite');
        $deleteFavoriteMessage = flash('delete_favorite');
        if(!empty($loginMessage)){ 
    ?>
        <h4 style="color:red"><?= $loginMessage ?></h4>

    <?php }else if(!empty($addFavoriteMessage)){ ?>

        <h4 style="color:green"><?= $addFavoriteMessage ?></h4>

    <?php }else if(!empty($deleteFavoriteMessage)){ ?>

        <h4 style="color:green"><?= $deleteFavoriteMessage ?></h4>

    <?php } else if(!empty($add_comment)){ ?>

        <h4 style="color:green"><?= $add_comment ?></h4>
    <?php } ?>


      <div class="flex flex-col lg:flex-row gap-8">
        <!-- photo -->
        <div class="lg:w-4/12">
            <div class="flex gap-x-4">
              <a href="<?= url('product/details/product/add-favorite/' . $product_id) ?>" class="relative">
                <div class="group cursor-pointer relative inline-block text-center">
                  <svg class="fill-zinc-700 hover:fill-red-400 transition" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="" viewBox="0 0 256 256"><path id="heart" fill="<?php if($checkProductIsFavorite != 0){ echo 'red'; }else if($checkProductIsFavorite == 0){ echo 'black'; } ?>" d="M178,32c-20.65,0-38.73,8.88-50,23.89C116.73,40.88,98.65,32,78,32A62.07,62.07,0,0,0,16,94c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,220.66,240,164,240,94A62.07,62.07,0,0,0,178,32ZM128,206.8C109.74,196.16,32,147.69,32,94A46.06,46.06,0,0,1,78,48c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,147.61,146.24,196.15,128,206.8Z"></path></svg>
                  <div class="opacity-0 w-28 transition-all bg-zinc-800 text-white text-center text-xs rounded-lg py-2 absolute z-10 -left-11 group-hover:opacity-100 px-3 pointer-events-none">
                    افزودن به علاقه مندی ها
                    <svg class="absolute text-black h-2 w-full left-0 bottom-full rotate-180" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"></polygon></svg>
                  </div>
                </div>
               </a>
              <!-- <a href="" class="relative">
                <div class="group cursor-pointer relative inline-block text-center">
                  <svg class="fill-zinc-700 hover:fill-zinc-800 transition" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#000000" viewBox="0 0 256 256"><path d="M112,152a8,8,0,0,0-8,8v28.69L75.72,160.4A39.71,39.71,0,0,1,64,132.12V95a32,32,0,1,0-16,0v37.13a55.67,55.67,0,0,0,16.4,39.6L92.69,200H64a8,8,0,0,0,0,16h48a8,8,0,0,0,8-8V160A8,8,0,0,0,112,152ZM40,64A16,16,0,1,1,56,80,16,16,0,0,1,40,64Zm168,97V123.88a55.67,55.67,0,0,0-16.4-39.6L163.31,56H192a8,8,0,0,0,0-16H144a8,8,0,0,0-8,8V96a8,8,0,0,0,16,0V67.31L180.28,95.6A39.71,39.71,0,0,1,192,123.88V161a32,32,0,1,0,16,0Zm-8,47a16,16,0,1,1,16-16A16,16,0,0,1,200,208Z"></path></svg>
                  <div class="opacity-0 w-28 transition-all bg-zinc-800 text-white text-center text-xs rounded-lg py-2 absolute z-10 -left-11 group-hover:opacity-100 px-3 pointer-events-none">
                   افزودن به مقایسه
                    <svg class="absolute text-black h-2 w-full left-0 bottom-full rotate-180" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"></polygon></svg>
                  </div>
                </div>
              </a>
              <a href="" class="relative">
                <div class="group cursor-pointer relative inline-block text-center">
                  <svg class="fill-zinc-700 hover:fill-zinc-800 transition" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#000000" viewBox="0 0 256 256"><path d="M176,160a39.89,39.89,0,0,0-28.62,12.09l-46.1-29.63a39.8,39.8,0,0,0,0-28.92l46.1-29.63a40,40,0,1,0-8.66-13.45l-46.1,29.63a40,40,0,1,0,0,55.82l46.1,29.63A40,40,0,1,0,176,160Zm0-128a24,24,0,1,1-24,24A24,24,0,0,1,176,32ZM64,152a24,24,0,1,1,24-24A24,24,0,0,1,64,152Zm112,72a24,24,0,1,1,24-24A24,24,0,0,1,176,224Z"></path></svg>
                  <div class="opacity-0 w-28 transition-all bg-zinc-800 text-white text-center text-xs rounded-lg py-2 absolute z-10 -left-11 group-hover:opacity-100 px-3 pointer-events-none">
                    اشتراک گذاری
                    <svg class="absolute text-black h-2 w-full left-0 bottom-full rotate-180" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"></polygon></svg>
                  </div>
                </div>
              </a> -->
            </div>
            <img class="w-10/12 lg:w-full mx-auto border-2 rounded-xl" src="<?= asset($product_images[0]['url']) ?>">
            <div class="grid grid-cols-5 gap-x-2 mt-4">
            <?php foreach($product_images as $product_image){ ?>
              <img onclick="showImagesProduct()" class="cursor-pointer border rounded-lg" src="<?= asset($product_image['url']) ?>">
              <?php } ?>
              <!-- <img onclick="showImagesProduct()" class="cursor-pointer border rounded-lg" src="./assets/image/products/1b.webp">
              <img onclick="showImagesProduct()" class="cursor-pointer border rounded-lg" src="./assets/image/products/1c.webp">
              <img onclick="showImagesProduct()" class="cursor-pointer border rounded-lg" src="./assets/image/products/1d.webp"> -->
              <div onclick="showImagesProduct()" class="cursor-pointer border rounded-lg flex justify-center items-center relative">
                <img class="blur-sm" src="./assets/image/products/1b.webp">
                <svg class="fill-zinc-800 absolute" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256"><path d="M144,128a16,16,0,1,1-16-16A16,16,0,0,1,144,128ZM60,112a16,16,0,1,0,16,16A16,16,0,0,0,60,112Zm136,0a16,16,0,1,0,16,16A16,16,0,0,0,196,112Z"></path></svg>
              </div>
            </div>
            <!-- product images modal -->
            <div class="max-w-2xl mx-auto relative">
              <!-- Main modal -->
              <div id="showImagesModal" class="overflow-x-hidden overflow-y-auto z-50 fixed hidden h-modal h-full inset-0 justify-center items-center">
                <div onclick="closeImagesProduct()" class="overflow-x-hidden overflow-y-auto fixed h-modal h-full inset-0 z-10 bg-gray-600 bg-opacity-50 w-full">
                </div>
                <div class="relative w-12/12 sm:w-10/12 lg:w-full lg:max-w-[1600px] px-2 mb-4 z-50 mt-2 lg:mt-2 mx-auto">
                  <!-- Modal content -->
                  <div class="bg-white rounded-lg shadow-lg relative">
                      <div class="flex justify-between items-center p-4 border-b">
                        <h3 class="text-gray-800 font-semibold">
                          عکس های محصول
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center" onclick="closeImagesProduct()" id="closeSelectP">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                      </div>
                      <div class="container relative">
                    <?php foreach($product_images as $product_image){ ?>

                        <div class="mySlides">
                          <img src="<?= asset($product_image['url']) ?>" class="w-5/12 lg:w-3/12 align-middle mx-auto">
                        </div>
                    <?php } ?>
                        <!-- <div class="mySlides">
                          <img src="" class="w-5/12 lg:w-3/12 align-middle mx-auto">
                        </div>
                        <div class="mySlides">
                          <img src="" class="w-5/12 lg:w-3/12 align-middle mx-auto">
                        </div>
                        <div class="mySlides">
                          <img src="" class="w-5/12 lg:w-3/12 align-middle mx-auto">
                        </div>
                        <div class="mySlides">
                          <img src="" class="w-5/12 lg:w-3/12 align-middle mx-auto">
                        </div> -->
                          
                        <div class="absolute top-32 w-full">
                          <a class="next hover:bg-gray-300 absolute left-0 select-none p-3 rounded-r-md" onclick="plusSlides(1)">
                            <svg class="hover:bg-gray-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM149.66,93.66,115.31,128l34.35,34.34a8,8,0,0,1-11.32,11.32l-40-40a8,8,0,0,1,0-11.32l40-40a8,8,0,0,1,11.32,11.32Z"></path></svg>
                          </a>
                          <a class="prev hover:bg-gray-300 absolute right-0 select-none p-3 rounded-l-md" onclick="plusSlides(-1)">
                            <svg class="hover:bg-gray-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z"></path></svg>
                          </a>
                        </div>
                        
                        <div class="flex gap-x-3 overflow-x-scroll mt-32 md:mt-20 p-3">
                    <?php
                    $i = 0;
                     foreach($product_images as $product_image){ ?>
                          <img class="demo align-middle w-[20%] lg:w-[10%] h-auto opacity-60 hover:opacity-100 border border-gray-300 rounded-md" src="<?= asset($product_image['url']) ?>" onclick="currentSlide(<?= ++$i ?>)">
                    <?php
                  } ?>
                        </div>
                      </div>
                  </div>
                </div>
            </div> 
            </div>
        </div>
        <!-- info -->
        <div class="lg:w-5/12">
          <div class="mb-7 text-sm flex items-center gap-x-2 opacity-90">
            <a href="<?= url('/') ?>" class="text-zinc-800 hover:text-sky-500 transition">
              خانه
            </a>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
            </div>
            <a href="<?= url('/') ?>" class="text-zinc-800 hover:text-sky-500 transition">
              محصولات
            </a>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
            </div>
            <a class="text-sky-500" href="">
              <?= $category['name'] ?>
            </a>
          </div>
          <div class="text-zinc-800 text-lg md:text-2xl font-semibold">
                <?= $productInfo[0]['title'] ?>
        </div>
          <!-- <div class="text-zinc-400 text-sm mt-4">
            Asus Zenbook S 13 OLED UX5304VA-NQ003 13.3 Inch Laptop
          </div> -->
          <div class="flex gap-x-4 mt-3">
            <div class="flex items-start gap-x-1 text-sm text-zinc-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f9bc00" viewBox="0 0 256 256"><path d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"></path></svg>
              <span>
                <span>
                  (28+)
                </span>
                <span>
                  4.3
                </span>
              </span>
            </div>
            <a href="#comments" class="flex items-start gap-x-1 text-sm text-sky-400">
              <svg class="fill-sky-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M140,128a12,12,0,1,1-12-12A12,12,0,0,1,140,128ZM84,116a12,12,0,1,0,12,12A12,12,0,0,0,84,116Zm88,0a12,12,0,1,0,12,12A12,12,0,0,0,172,116Zm60,12A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path></svg>
              <span>
                <span>
                  <?= $comment_count['comment_count'] ?>
                </span>
                <span>
                  دیدگاه
                </span>
              </span>
            </a>
          </div>
          <div class="mt-8 text-zinc-700">
            ویژگی های محصول:
          </div>
          <div class="grid grid-cols-3 max-w-md py-3 mb-5 gap-3">
            <?php foreach($productInfo as $attribute){ ?>
            <div class="flex flex-col gap-x-2 justufy-center bg-gray-100 rounded-md px-2 py-3">
              <div class="text-zinc-500 text-xs">
                <?= $attribute['name'] ?>
              </div>
              <div class="text-zinc-700 text-sm">
              <?= $attribute['value'] ?>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="flex flex-col gap-x-2 justufy-center bg-gray-100 rounded-md px-2 py-3">
              <div class="text-zinc-500 text-xs">
                مقدار حافظه RAM:
              </div>
              <div class="text-zinc-700 text-sm">
               12 گیگابایت
              </div>
            </div>
            <div class="flex flex-col gap-x-2 justufy-center bg-gray-100 rounded-md px-2 py-3">
              <div class="text-zinc-500 text-xs">
                باتری
              </div>
              <div class="text-zinc-700 text-sm">
                لیتیوم 6000 میلی 
              </div>
            </div>
            <div class="flex flex-col gap-x-2 justufy-center bg-gray-100 rounded-md px-2 py-3">
              <div class="text-zinc-500 text-xs">
                مقدار حافظه RAM:
              </div>
              <div class="text-zinc-700 text-sm">
               12 گیگابایت
              </div>
            </div>
            <div class="flex flex-col gap-x-2 justufy-center bg-gray-100 rounded-md px-2 py-3">
              <div class="text-zinc-500 text-xs">
                باتری
              </div>
              <div class="text-zinc-700 text-sm">
                لیتیوم 6000 میلی 
              </div>
            </div>
            <div class="flex flex-col gap-x-2 justufy-center bg-gray-100 rounded-md px-2 py-3">
              <div class="text-zinc-500 text-xs">
                جنس بدنه:
              </div>
              <div class="text-zinc-700 text-sm">
                تیتانیوم
              </div>
            </div> -->
          </div>
          <div class="flex gap-x-2 mt-2 pt-2 text-zinc-500 text-sm border-t leading-6">
            <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path></svg>
            درخواست مرجوع کردن کالا در گروه لپ تاپ با دلیل "انصراف از خرید" تنها در صورتی قابل تایید است که کالا در شرایط اولیه باشد (در صورت پلمپ بودن، کالا نباید باز شده باشد).
          </div>
        </div>
        <!-- buy -->
        <div class="lg:w-3/12">
          <div class="mt-8 mb-8">
            <div class="text-zinc-700">
              رنگ:
            </div>
            <ul class="flex flex-wrap gap-2">
            <?php foreach($product_colors as $color){ ?>
              <li>
                <input type="radio" id="1" name="hosting" value="1" class="hidden peer" required="">
                <label for="2" class="inline-flex items-center justify-center px-2 py-3 text-gray-600 bg-white border-2 border-gray-200 rounded-full cursor-pointer peer-checked:border-sky-400 hover:text-gray-600 hover:bg-gray-100">
                  <div class="flex gap-x-2">
                    <!-- <div class="w-5 h-5 bg-gray-400 rounded-full"></div> -->
                    <div class="text-sm"><?= $color['value'] ?></div>
                  </div>
                </label>
              </li>
            <?php } ?>
        <!-- <li>
                <input type="radio" id="2" name="hosting" value="2" class="hidden peer" required="">
                <label for="2" class="inline-flex items-center justify-center px-2 py-3 text-gray-600 bg-white border-2 border-gray-200 rounded-full cursor-pointer peer-checked:border-sky-400 hover:text-gray-600 hover:bg-gray-100">
                  <div class="flex gap-x-2">
                    <div class="w-5 h-5 bg-gray-900 rounded-full"></div>
                    <div class="text-sm">مشکی</div>
                  </div>
                </label>
              </li> -->
              <!-- <li>
                <input type="radio" id="3" name="hosting" value="3" class="hidden peer" required="">
                <label for="3" class="inline-flex items-center justify-center px-2 py-3 text-gray-600 bg-white border-2 border-gray-200 rounded-full cursor-pointer peer-checked:border-sky-400 hover:text-gray-600 hover:bg-gray-100">
                  <div class="flex gap-x-2">
                    <div class="w-5 h-5 bg-sky-400 rounded-full"></div>
                    <div class="text-sm">آبی روشن</div>
                  </div>
                </label>
              </li> -->
            </ul>
          </div>
          <div class="p-3 border rounded-xl mx-auto divide-y">
            <div class="flex gap-x-1 items-center text-zinc-600 text-sm pb-5 pt-3">
              <svg class="fill-zinc-700" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M208,40H48A16,16,0,0,0,32,56v58.78c0,89.61,75.82,119.34,91,124.39a15.53,15.53,0,0,0,10,0c15.2-5.05,91-34.78,91-124.39V56A16,16,0,0,0,208,40Zm0,74.79c0,78.42-66.35,104.62-80,109.18-13.53-4.51-80-30.69-80-109.18V56H208ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.68l50.34-50.34a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z"></path></svg>
              <div>
                گارانتی 18 ماهه
              </div>
            </div>
            <div class="flex gap-x-1 items-center text-zinc-600 text-sm py-5">
              <svg class="fill-zinc-700" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M247.42,117l-14-35A15.93,15.93,0,0,0,218.58,72H184V64a8,8,0,0,0-8-8H24A16,16,0,0,0,8,72V184a16,16,0,0,0,16,16H41a32,32,0,0,0,62,0h50a32,32,0,0,0,62,0h17a16,16,0,0,0,16-16V120A7.94,7.94,0,0,0,247.42,117ZM184,88h34.58l9.6,24H184ZM24,72H168v64H24ZM72,208a16,16,0,1,1,16-16A16,16,0,0,1,72,208Zm81-24H103a32,32,0,0,0-62,0H24V152H168v12.31A32.11,32.11,0,0,0,153,184Zm31,24a16,16,0,1,1,16-16A16,16,0,0,1,184,208Zm48-24H215a32.06,32.06,0,0,0-31-24V128h48Z"></path></svg>
              <div>
                ارسال 2 روز کاری
              </div>
            </div>
            <div class="flex gap-x-1 items-center text-green-500 text-sm py-5">
              <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
              <div>
                رضایت از محصول:
              </div>
              <span>
                95%
              </span>
            </div>
            <div class="flex flex-col justify-center py-5">
              <div class="text-zinc-600 text-left">
              <div class="text-blue-500 text-sm line-through">
                <?php if(!empty($productDiscount)){ ?>
              <?= number_format($productInfo[0]['price']) ?>  تومان
                </div>
                <span class="font-semibold text-xl"><?= number_format($productInfo[0]['price']  - $productDiscount[0]['discount_amount']) ?></span>
                <span class="text-xs">تومان</span>
              </div>
              <?php }else{ ?>
                </div>
                <span class="font-semibold text-xl"><?= number_format($productInfo[0]['price']) ?></span>
                <span class="text-xs">تومان</span>
              </div>
              <?php } ?>

              <?php if($productInfo[0]['stock'] < 10){ ?>
              <div class="text-xs text-red-400">
                تنها <?= $productInfo[0]['stock'] ?> عدد در انبار باقی مانده
              </div>
              <?php } ?>
            </div>
            <?php
        $message = flash('add_to_cart');
        if(!empty($message)){ 
    ?>
            <h3 style="color:green"><?= $message ?></h3>
    <?php } ?>
            <?php if(isset($_SESSION['customerInfo']))
            {
             if($cart == null){ ?>
            <button onclick="location.href='<?= url('product/add-cart/' . $product_id) ?>'" class="mx-auto w-full px-2 py-3 text-sm bg-gradient-to-bl from-sky-400 to-sky-600 hover:opacity-80 transition text-gray-100 rounded-lg">
              افزودن به سبد خرید
            </button>
            <?php }else{ ?>
              <button onclick="location.href='<?= url('product/add-cart/' . $product_id) ?>'" class="mx-auto w-full px-2 py-3 text-sm bg-gradient-to-bl from-sky-400 to-sky-600 hover:opacity-80 transition text-gray-100 rounded-lg">
              حذف از سبد خرید (<?= $cart['quantity'] ?>)
            </button>
            <button onclick="location.href='<?= url('cart') ?>'" class="mx-auto w-full px-2 py-3 text-sm bg-gradient-to-bl from-sky-400 to-sky-600 hover:opacity-80 transition text-gray-100 rounded-lg">
              رفتن به سبد خرید
            </button>
            <?php } 
            }else{ ?>
              <button onclick="location.href='<?= url('product/add-cart/' . $product_id) ?>'" class="mx-auto w-full px-2 py-3 text-sm bg-gradient-to-bl from-sky-400 to-sky-600 hover:opacity-80 transition text-gray-100 rounded-lg">
              افزودن به سبد خرید
            </button>
            <?php 
            }
             ?>
          </div>
          <div class="flex items-center gap-x-2 mt-4 text-zinc-600 text-sm">
            <svg class="fill-zinc-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path></svg>
            هزینه پست برای سبد خرید بالای 400 هزار تومان رایگان میباشد.
          </div>
        </div>
      </div>
      <div class="flex gap-x-8 mt-20 pb-2 border-b">
        <a class="text-zinc-600 hover:text-zinc-800 transition" href="#proper">
          مشخصات
        </a>
        <a class="text-zinc-600 hover:text-zinc-800 transition" href="#comments">
          دیدگاه ها
        </a>
        <!-- <a class="text-zinc-600 hover:text-zinc-800 transition" href="#quest">
          پرسش ها
        </a> -->
      </div>
      <div class="p-4 border-b" id="proper">
        <span class="border-b-sky-300 border-b text-zinc-800">
          مشخصات محصول
        </span>
        <div class="text-gray-500 text-sm grid grid-cols-1 md:grid-cols-2 gap-x-5">
            <?php foreach($productInfo as $attribute){ ?>
          <div class="flex items-center justify-between border p-3 w-full my-3 mx-auto rounded-xl">
            <div class="text-sm text-zinc-700">
              <?= $attribute['name'] ?>
            </div>
            <div class="text-sm text-zinc-700">
             <?= $attribute['value'] ?>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="p-4 border-b" id="comments">
        <span class="border-b-sky-300 border-b text-zinc-800">
          دیدگاه ها
        </span>
        <div class="lg:flex gap-5">
          <div class="lg:w-3/12 py-5">
            <div class="flex items-start gap-x-1 text-sm text-zinc-600">
              <span>
                <span>
                  (از 28 امتیاز)
                </span>
                <span>
                  4.3
                </span>
              </span>
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#f9bc00" viewBox="0 0 256 256"><path d="M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z"></path></svg>
            </div>
          <div class="mt-6 mb-2 text-sm text-zinc-700">
              شما هم دیدگاه خود را ثبت کنید
              <?php $loginMessage = flash('login');
               if(!empty($loginMessage)){ ?>
                <?= $loginMessage ?>
                <?php } ?>
          </div>
          <form action="<?= url('product/add-comment/' . $productInfo[0]['id']) ?>" method="POST">
            
            <input type="text" name="title" placeholder="عنوان دیدگاه" class="focus:shadow-primary-outline text-sm leading-5.6 block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-300 focus:outline-none"><br>
            <!-- <ul class="grid my-3 gap-5 grid-cols-2">
              <li>
                <input type="radio" id="yes" name="positive_feedback" value="1" class="hidden peer" required="">
                <label for="yes" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-400 peer-checked:text-green-500 hover:text-gray-600 hover:bg-gray-100">                           
                  <div class="flex items-center gap-x-1">
                    <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
                    <div class="text-sm">پیشنهاد میشود</div>
                  </div>
                </label>
              </li>
              <li>
                <input type="radio" id="no" name="negative_feedback" value="0" class="hidden peer" required="">
                <label for="no" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-red-400 peer-checked:text-red-400 hover:text-gray-600 hover:bg-gray-100">                           
                  <div class="flex items-center gap-x-1">
                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"></path></svg>
                    <div class="text-sm">پیشنهاد نمیشود</div>
                  </div>
                </label>
              </li>
            </ul> -->
            <textarea placeholder="متن دیدگاه" name="comment" cols="30" rows="7" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-400 focus:outline-none"></textarea>
            <button type="submit" class="mx-auto w-full px-2 py-3 mt-5 text-sm bg-gradient-to-bl from-sky-400 to-sky-600 hover:opacity-80 transition text-gray-100 rounded-lg">
              ارسال
            </button>
      </form>
        </div>
        <div class="lg:w-9/12 divide-y-2 divide-sky-600">
            <?php
            if(!empty($comments)){

            foreach($comments as $comment){ ?>
            <div class="px-2 pt-5">
              <div class="text-lg text-zinc-700">
                <?= $comment['comment'] ?>
            </div>
              <div class="mt-2 flex gap-x-4 items-center border-b pb-3">
                <div class="text-xs text-zinc-600">
                <?= $comment['created_at'] ?>
            </div>
                <div class="text-xs text-zinc-600">
                <?= $comment['first_name'] . ' ' . $comment['last_name'] ?>
            </div>
                <div class="text-xs text-zinc-50 bg-green-400 rounded-full px-2 py-1">
                  خریدار
                </div>
              </div>
              <div class="flex items-center gap-x-1 pt-3">              
            <?php if($comment['satisfaction'] == 2){ ?>
                <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
                <div class="text-sm text-green-500">پیشنهاد میشود</div>
                </div>
            <?php } else if($comment['satisfaction'] == 1){ ?>
                <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"></path></svg>
                <div class="text-sm text-red-500">پیشنهاد نمیشود</div>
                </div>
            <?php } ?>

              <div class="flex justify-end items-center gap-x-5 mt-3">
                <div class="text-sm text-zinc-400">
                  آیا این دیدگاه برایتان مفید بود؟
                </div>
                <ul class="grid my-3 gap-5 grid-cols-2">
                  <li>
                    <input type="radio" id="isgood" name="what" value="isgood" class="hidden peer" required="" onclick="location.href='<?= url('product/details/comments/add-positive/' . $comment['id']) ?>'">
                    <label for="isgood" class="inline-flex p-2 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-400 hover:bg-gray-100">                           
                    <h4><?= $comment['positive_feedback'] ?></h4>
                    <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
                    </label>
                  </li>
                  <li>
                    <input type="radio" id="isbad" name="what" value="isbad" class="hidden peer" required="" onclick="location.href='<?= url('product/details/comments/add-negative/' . $comment['id']) ?>'">
                    <label for="isbad" class="inline-flex p-2 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-red-400 hover:bg-gray-100">                           
                    <h4><?= $comment['negative_feedback'] ?></h4>
                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"></path></svg>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
      <!-- <div class="p-4" id="quest">
        <span class="border-b-sky-300 border-b text-zinc-800">
          پرسش ها
        </span>
        <div class="lg:flex gap-5">
          <div class="lg:w-3/12 py-5">
            <div class="mt-6 mb-2 text-sm text-zinc-700">
              اگر سوالی دارید بپرسید
            </div>
            <textarea placeholder="متن پرسش" name="mailTicket" cols="30" rows="7" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-400 focus:outline-none"></textarea>
            <button class="mx-auto w-full px-2 py-3 mt-5 text-sm bg-gradient-to-bl from-sky-400 to-sky-600 hover:opacity-80 transition text-gray-100 rounded-lg">
              ارسال
            </button>
          </div>
          <div class="lg:w-9/12 divide-y">
            <div class="px-3 pt-5">
              <div class="mt-2 flex gap-x-4 items-center border-b pb-3">
                <div class="text-xs text-zinc-600">
                  11 بهمن 1402
                </div>
                <div class="text-xs text-zinc-600">
                  امیررضا کریمی
                </div>
              </div>
              <div class="mt-2 mb-4 text-zinc-600 text-sm">
                سلام صفحه نمایش واقعا ipsهستش ممنون میشم راهنمایی کنید چقدر با tnفرق میکنه
              </div>
              <a href="">
                <div class="transition px-2 flex items-center text-xs text-zinc-600 hover:text-zinc-700">
                  پاسخ
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#292929" viewBox="0 0 256 256"><path d="M164.24,203.76a6,6,0,1,1-8.48,8.48l-80-80a6,6,0,0,1,0-8.48l80-80a6,6,0,0,1,8.48,8.48L88.49,128Z"></path></svg>
                </div>
              </a>
              <div class="flex justify-end items-center gap-x-5 mt-3">
                <div class="text-sm text-zinc-400">
                  آیا این جواب برایتان مفید بود؟
                </div>
                <ul class="grid my-3 gap-5 grid-cols-2">
                  <li>
                    <input type="radio" id="isgoodquest" name="quest" value="isgoodquest" class="hidden peer" required="">
                    <label for="isgoodquest" class="inline-flex p-2 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-400 hover:bg-gray-100">                           
                      <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
                    </label>
                  </li>
                  <li>
                    <input type="radio" id="isbadquest" name="quest" value="isbadquest" class="hidden peer" required="">
                    <label for="isbadquest" class="inline-flex p-2 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-red-400 hover:bg-gray-100">                           
                      <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"></path></svg>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div> -->
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