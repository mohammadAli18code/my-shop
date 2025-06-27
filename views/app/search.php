<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>جستجو محصولات</title>

  <link rel="stylesheet" href="<?= url('public/app/assets/css/main.css') ?>">

</head>
<body class="mx-auto bg-[#fcfcfc]">
	<!-- header -->
	<?php
	require_once (BASE_PATH . '/views/app/layouts/header.php')
	?>
	<!-- end header -->
  <main class="pt-24 md:pt-36 max-w-[1600px] mx-auto px-3 md:px-6">
    <div class="p-4 flex flex-col md:flex-row gap-5">
      <div class="md:w-4/12 lg:w-3/12">
        <div class="mb-4 rounded-2xl bg-white border">
          <div class="flex flex-col overflow-y-auto overflow-x-hidden p-4">
            <div>
              <!-- title -->
              <div class="mb-6 flex items-center justify-between">
                <h3 class="text-zinc-700 font-semibold text-lg">
                  فیلتر ها
                </h3>
                <button class="py-2 text-sm text-red-400 hover:text-red-500 transition">
                  حذف همه
                </button>
              </div>
              <ul class="space-y-2">
                <!-- category -->
                <li>
                  <details class="group border rounded-md">
                    <summary class="flex cursor-pointer items-center justify-between rounded-lg py-4 px-2 text-zinc-700">
                      <span class="font-semibold"> دسته بندی </span>
                      <span class="shrink-0 transition duration-200 group-open:-rotate-90">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
                      </span>
                    </summary>
                    <div class="mt-2 max-h-60 overflow-y-auto px-2 pb-2">
                      <ul class="space-y-2 rounded-lg">
                        <li>
                          <div class="flex w-full items-center gap-x-2 pr-4 bg-gray-50 rounded-md">
                            <input id="c1" type="checkbox" value="" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
                            <label for="c1" class="w-full cursor-pointer py-2 pl-4 text-zinc-600">
                              <span>
                                کالای دیجیتال
                              </span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="flex w-full items-center gap-x-2 pr-4 bg-gray-50 rounded-md">
                            <input id="c2" type="checkbox" value="" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
                            <label for="c2" class="w-full cursor-pointer py-2 pl-4 text-zinc-600">
                              <span>
                                لوازم خانگی
                              </span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="flex w-full items-center gap-x-2 pr-4 bg-gray-50 rounded-md">
                            <input id="c3" type="checkbox" value="" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
                            <label for="c3" class="w-full cursor-pointer py-2 pl-4 text-zinc-600">
                              <span>
                                موبایل
                              </span>
                            </label>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </details>
                </li>
                <!-- brand -->
                <li>
                  <details class="group border rounded-md">
                    <summary class="flex cursor-pointer items-center justify-between rounded-lg py-4 px-2 text-zinc-700">
                      <span class="font-semibold"> برند </span>
                      <span class="shrink-0 transition duration-200 group-open:-rotate-90">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
                      </span>
                    </summary>
                    <div class="mt-2 max-h-60 overflow-y-auto px-2 pb-2">
                      <ul class="space-y-2 rounded-lg" id="brandListFilterDesktop">
                        <li class="p-2 relative">
                          <input id="brandListFilterDesktopSearchInput" class="w-full pr-10 rounded-lg border border-none bg-gray-100 px-7 py-3 text-zinc-600 outline-none placeholder:text-sm placeholder:text-zinc-500 focus:ring-0" placeholder="جستجوی برند ..." type="text">
                          <svg class="absolute top-6 right-4 fill-zinc-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
                        </li>
                        <li>
                          <div class="flex w-full items-center gap-x-2 pr-4 bg-gray-50 rounded-md">
                            <input id="brand-nike" type="checkbox" value="" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
                            <label for="brand-nike" class="flex w-full cursor-pointer items-center justify-between py-2 pl-4 font-medium text-zinc-600">
                              <span>نایک</span>
                              <span>nike</span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="flex w-full items-center gap-x-2 pr-4 bg-gray-50 rounded-md">
                            <input id="brand-adidas" type="checkbox" value="" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
                            <label for="brand-adidas" class="flex w-full cursor-pointer items-center justify-between py-2 pl-4 font-medium text-zinc-600">
                              <span>آدیداس</span>
                              <span>adidas</span>
                            </label>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </details>
                </li>
                <!-- type seller -->
                <li>
                  <details class="group border rounded-md">
                    <summary class="flex cursor-pointer items-center justify-between rounded-lg py-4 px-2 text-zinc-700">
                      <span class="font-semibold"> نوع فروشنده </span>
                      <span class="shrink-0 transition duration-200 group-open:-rotate-90">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
                      </span>
                    </summary>
                    <div class="mt-2 max-h-60 overflow-y-auto px-2 pb-2">
                      <ul class="space-y-2 rounded-lg" id="colorListFilterDesktop">
                        <li>
                          <div class="flex w-full items-center gap-x-2 pr-4">
                            <input id="color-red" type="checkbox" value="" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
                            <label for="color-red" class="flex w-full cursor-pointer items-center py-2 pl-4 font-medium text-zinc-600">
                              <span>هایپر استار</span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="flex w-full items-center gap-x-2 pr-4">
                            <input id="color-blue" type="checkbox" value="" class="h-4 w-4 cursor-pointer rounded-xl border-gray-300 bg-gray-100">
                            <label for="color-blue" class="flex w-full cursor-pointer items-center py-2 pl-4 font-medium text-zinc-600">
                              <span>فروشنده رسمی</span>
                            </label>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </details>
                </li>
                <!-- available -->
                <li>
                  <label class="flex cursor-pointer items-center justify-between py-5 px-2" for="onlyAvailableDesktop">
                    <div class="text-zinc-700 dark:text-white font-semibold">
                      فقط کالا های موجود
                    </div>
                    <div class="relative inline-flex cursor-pointer items-center">
                      <input class="peer sr-only" id="onlyAvailableDesktop" type="checkbox">
                      <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-400 peer-checked:after:translate-x-full peer-focus:ring-blue-400"></div>
                    </div>
                  </label>
                </li>
                <!-- special -->
                <li>
                  <label class="flex cursor-pointer items-center justify-between pt-5 px-2" for="onlySpecialDesktop">
                    <div class="text-zinc-700 dark:text-white font-semibold">
                     فقط محصولات موجود در انبار
                    </div>
                    <div class="relative inline-flex cursor-pointer items-center">
                      <input class="peer sr-only" id="onlySpecialDesktop" type="checkbox">
                      <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-400 peer-checked:after:translate-x-full peer-focus:ring-blue-400"></div>
                    </div>
                  </label>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="md:w-8/12 lg:w-9/12">
        <div class="flex justify-between items-center mb-5">
          <div class="text-zinc-600 px-5">
          <?php
              $search_message = flash('search_bar');
              if(!empty($search_message)){ 
          ?>
              <h3 style="color:green"><?= $search_message ?></h3>
          <?php } ?>
            <?= $productCountResult['product_count'] ?> نتیجه  جستجو
          </div>
          <div class="group relative">
            <form id="filter-form" action="<?= url('products/sort') ?>"  method="GET">
            <select name="sort" class="leading-5.6 ease block w-48 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-sky-500 focus:outline-none">
              <option value="0">مرتب سازی پیش فرض</option>
              <option value="cheap">ارزان ترین</option>
              <option value="expensive">گران ترین</option>
              <option value="most_discount">بیشترین تخفیف</option>
              <option value="most_sold">پرفروش ترین</option>
            </select><br>
            <button style="background-color:blue;color:white;padding:8px;border-radius:10px" type="submit">اعمال فیلتر</button>
            </form>
            <svg class="absolute top-3 left-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#000000" viewBox="0 0 256 256"><path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mt-5">
            <?php
            if($products != 0){
             foreach($products as $product){ ?>
          <a href="<?= url('product/details/' . $product['product_id']) ?>" class="relative my-2 p-2 md:p-3 bg-white rounded-xl group shadow-lg border border-zinc-200">
            <?php
              if($product['discount_percentage'] != 0){ ?>
            <div class="bg-sky-500 rounded-full p-2 text-white flex items-center gap-x-1 text-xs absolute top-2 right-2">
               % <?= $product['discount_percentage'] ?>
            </div>
            <?php } ?>
            <div class="absolute left-3 text-gray-600 opacity-0 group-hover:opacity-100 transition-all text-xs md:text-sm flex flex-col items-center">
              <svg class="fill-yellow-500 size-4 md:size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M239.18,97.26A16.38,16.38,0,0,0,224.92,86l-59-4.76L143.14,26.15a16.36,16.36,0,0,0-30.27,0L90.11,81.23,31.08,86a16.46,16.46,0,0,0-9.37,28.86l45,38.83L53,211.75a16.38,16.38,0,0,0,24.5,17.82L128,198.49l50.53,31.08A16.4,16.4,0,0,0,203,211.75l-13.76-58.07,45-38.83A16.43,16.43,0,0,0,239.18,97.26Zm-15.34,5.47-48.7,42a8,8,0,0,0-2.56,7.91l14.88,62.8a.37.37,0,0,1-.17.48c-.18.14-.23.11-.38,0l-54.72-33.65a8,8,0,0,0-8.38,0L69.09,215.94c-.15.09-.19.12-.38,0a.37.37,0,0,1-.17-.48l14.88-62.8a8,8,0,0,0-2.56-7.91l-48.7-42c-.12-.1-.23-.19-.13-.5s.18-.27.33-.29l63.92-5.16A8,8,0,0,0,103,91.86l24.62-59.61c.08-.17.11-.25.35-.25s.27.08.35.25L153,91.86a8,8,0,0,0,6.75,4.92l63.92,5.16c.15,0,.24,0,.33.29S224,102.63,223.84,102.73Z"></path></svg>
              4.5
            </div>
            <img src="<?= asset($product['image']) ?>" alt="">
            <div class="mt-5">
              <div class="flex flex-col gap-y-1">
                <div class="text-zinc-700 text-sm md:text-base">
              <?= $product['title'] ?>
                </div>
                <div class="flex justify-between items-end">

             <?php if($product['discount_percentage'] != 0){ ?>

                <div class="text-blue-800 font-semibold text-base md:text-lg">
              <?= number_format($product['price'] - $product['discount_amount']) ?>
                </div>
                <div class="text-blue-500 text-sm line-through">
              <?= number_format($product['price']) ?>  
                </div>

                <?php }else{ ?>

                <div class="text-blue-800 font-semibold text-base md:text-lg">
              <?= number_format($product['price']) ?>  
                </div>

                <?php } ?>

                </div>
              </div>
            </div>
          </a>
          <?php } } ?>
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