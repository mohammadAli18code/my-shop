<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>پرداخت</title>

  <link rel="stylesheet" href="<?= url('public/app/assets/css/main.css') ?>">

</head>
<body class="mx-auto bg-[#fcfcfc]">
	<!-- header -->
	<?php
	require_once (BASE_PATH . '/views/app/layouts/header.php')
	?>
	<!-- end header -->
  <main class="pt-24 md:pt-36 max-w-[1600px] mx-auto px-3 md:px-6">
    <span class="flex items-center justify-center mt-4 mb-8 md:mt-10 md:mb-14 gap-x-5">
      <div class="w-full h-px bg-zinc-300">
      </div>
      <div class="text-xl md:text-4xl font-semibold text-zinc-700 min-w-max text-center">
        تکمیل سفارش
      </div>
      <div class="w-full h-px bg-zinc-300">
      </div>
    </span>
    <div class="flex flex-col md:flex-row gap-5">
      <div class="md:w-8/12 bg-white border rounded-xl shadow-lg p-4">
        <div class="p-2 sm:p-4 mb-10">
          <div class="flex justify-between gap-x-1 items-center text-zinc-600 border-b pb-2 mb-4 text-lg font-semibold">
            <div>
              آدرس تحویل سفارش
            </div>
            <span onclick="showEditAddress(<?= $address['id'] ?>, '<?= $address['province'] ?>', '<?= $address['city'] ?>', '<?= $address['address_line'] ?>', '<?= $address['postal_code'] ?>', '<?= $address['house_number'] ?>', '<?= $address['unit_number'] ?>')" class="text-zinc-50 cursor-pointer hover:text-zinc-100 transition bg-sky-500 hover:bg-sky-600 px-3 py-1 text-xs rounded-md">
                ویرایش آدرس
            </span>
          </div>
          <div class="text-zinc-600 text-lg ">
          <?= $address['city'] . ' - ' . $address['province'] . ' - ' . $address['address_line'] . ' - پلاک ' . $address['house_number'] . ' - واحد ' . $address['unit_number'] ?>
        </div>
          <!-- edit addredd modal -->
          <div class="max-w-2xl mx-auto relative">
            <!-- Main modal -->
            <div id="showEditAddress" class="overflow-x-hidden overflow-y-auto z-50 fixed h-modal h-full inset-0 justify-center items-center hidden">
                <div onclick="closeEditAddress()" class="overflow-x-hidden overflow-y-auto fixed h-modal h-full inset-0 z-10 bg-gray-600 bg-opacity-50 w-full">
                </div>
                <div class="relative w-12/12 sm:w-10/12 lg:w-6/12 px-4 h-auto mb-4 z-50 mt-5 md:mt-10 mx-auto">
                  <!-- Modal content -->
                  <div class="bg-white rounded-lg shadow-lg relative overflow-y-visible">
                      <div class="flex justify-between items-center p-4 border-b">
                        <h3 class="text-gray-700">ویرایش آدرس</h3>
                        <button onclick="closeEditAddress()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                      </div>
                      <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 pt-4" action="<?= url('customer/profile-addresses/update') ?>" method="POST">
                        <div>
                          <!-- inputs -->
                          <div class="sm:flex gap-x-5 mt-7">
                            <div class="sm:w-1/2 mb-2 sm:mb-0 flex flex-col gap-y-1">
                              <label class="text-sm text-zinc-700 flex">
                                استان
                                <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                              </label>
                              <input type="text" name="province" class="focus:shadow-primary-outline text-sm leading-5.6 block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-300 focus:outline-none">
                            </div>
                            <div class="sm:w-1/2 flex flex-col gap-y-1">
                              <label class="text-sm text-zinc-700 flex">
                                شهر
                                <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                              </label>
                              <input type="text" name="city" class="focus:shadow-primary-outline text-sm leading-5.6 block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-300 focus:outline-none">
                            </div>
                          </div>
                          <div class="mt-7">
                            <div class="flex flex-col gap-y-1">
                              <label class="text-sm text-zinc-700 flex">
                                خیابان و کوچه
                                <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                              </label>
                              <input type="text" name="address_line" class="focus:shadow-primary-outline text-sm leading-5.6 block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col gap-y-1 mt-5">
                              <label class="text-sm text-zinc-700 flex">
                                شماره پلاک
                                <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                              </label>
                              <input type="text" name="house_number" class="focus:shadow-primary-outline text-sm leading-5.6 block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-300 focus:outline-none">          
                            </div>
                          </div>
                          <div class="sm:flex gap-x-5 mt-5">
                            <div class="sm:w-1/2 mb-2 sm:mb-0 flex flex-col gap-y-1">
                              <label class="text-sm text-zinc-700 flex">
                                شماره واحد
                                <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                              </label>
                              <input type="text" name="unit_number" class="focus:shadow-primary-outline text-sm leading-5.6 block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-300 focus:outline-none">
                            </div>
                            <div class="sm:w-1/2 flex flex-col gap-y-1">
                              <label class="text-sm text-zinc-700 flex">
                                کد پستی
                                <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                              </label>
                              <input type="text" name="postal_code" class="focus:shadow-primary-outline text-sm leading-5.6 block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-300 focus:outline-none">          
                            </div>
                          </div>
                          <!-- <div class="mt-5">
                            <div class="flex flex-col gap-y-1">
                              <label class="text-sm text-zinc-700 flex">
                                توضیحات اضافه
                              </label>
                              <textarea placeholder="نکات مهم درباره تحویل محصول" name="additional_info" cols="30" rows="7" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-sky-400 focus:outline-none"></textarea>
                            </div>
                          </div> -->
                          <input type="hidden" name="address_id" value="">
                          <button href="" class="w-1/2 mx-auto mt-4 block py-3 text-sm bg-gradient-to-bl from-sky-500 to-sky-700 hover:opacity-80 transition text-gray-100 rounded-xl text-center">
                            ثبت تغییرات
                          </button>
                        </div>
                      </form>
                  </div>                  
                </div>                
            </div> 
          </div>
        </div>
        <div class="p-2 sm:p-4 mb-10">
          <div class="flex gap-x-1 items-center text-zinc-600 border-b pb-2 mb-4 text-lg font-semibold">
            انتخاب روز تحویل کالا
          </div>
          <ul class="grid w-full gap-6 grid-cols-3 md:grid-cols-6">
            <li>
              <input type="radio" id="1" name="hosting" value="1" class="hidden peer" requiblue>
              <label for="1" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">
                <div class="text-center">
                  <div class="mb-1">شنبه</div>
                  <div class="text-sm">5 آبان</div>
                </div>
              </label>
            </li>
            <li>
              <input type="radio" id="2" name="hosting" value="2" class="hidden peer" requiblue>
              <label for="2" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">
                <div class="text-center">
                  <div class="mb-1">یکشنبه</div>
                  <div class="text-sm">6 آبان</div>
                </div>
              </label>
            </li>
            <li>
              <input type="radio" id="3" name="hosting" value="3" class="hidden peer" requiblue>
              <label for="3" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">
                <div class="text-center">
                  <div class="mb-1">دوشنبه</div>
                  <div class="text-sm">7 آبان</div>
                </div>
              </label>
            </li>
            <li>
              <input type="radio" id="4" name="hosting" value="4" class="hidden peer" requiblue>
              <label for="4" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">
                <div class="text-center">
                  <div class="mb-1">سه شنبه</div>
                  <div class="text-sm">8 آبان</div>
                </div>
              </label>
            </li>
            <li>
              <input type="radio" id="5" name="hosting" value="5" class="hidden peer" requiblue>
              <label for="5" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">
                <div class="text-center">
                  <div class="mb-1">چهارشنبه</div>
                  <div class="text-sm">9 آبان</div>
                </div>
              </label>
            </li>
            <li>
              <input type="radio" id="6" name="hosting" value="6" class="hidden peer" requiblue>
              <label for="6" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">
                <div class="text-center">
                  <div class="mb-1">پنجشنبه</div>
                  <div class="text-sm">10 آبان</div>
                </div>
              </label>
            </li>
          </ul>
        </div>
        <div class="grid md:grid-cols-2 ">
          <div class="p-2 sm:p-4">
            <div class="flex gap-x-1 items-center text-zinc-600 border-b pb-2 mb-4 text-lg font-semibold">
              انتخاب نوع ارسال کالا
            </div>
            <ul class="grid grid-cols-2 w-full gap-3">
              <li>
                <input type="radio" id="7" name="send" value="7" class="hidden peer" requiblue>
                <label for="7" class="flex items-center justify-start gap-x-2 w-full p-2 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">                           
                  <img class="max-w-12 border rounded-md p-1" src="./assets/image/post.png" alt="">
                  <div class="text-center">
                    <span class="text-sm">پست معمولی :</span>
                    <span class="text-sm">19,000 تومان</span>
                  </div>
                </label>
              </li>
              <li>
                <input type="radio" id="8" name="send" value="8" class="hidden peer" requiblue>
                <label for="8" class="flex items-center justify-start gap-x-2 w-full p-2 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-sky-400 peer-checked:text-sky-400 hover:text-gray-600 hover:bg-gray-100">                           
                  <img class="max-w-12 border rounded-md p-1" src="./assets/image/fastpost.jpg" alt="">
                  <div class="text-center">
                    <span class="text-sm">پست پیشتاز :</span>
                    <span class="text-sm">32,000 تومان</span>
                  </div>
                </label>
              </li>
            </ul>
          </div>
          <div class="p-2 sm:p-4">
            <div class="flex gap-x-1 items-center text-zinc-600 border-b pb-2 mb-4 text-lg font-semibold">
              انتخاب نوع پرداخت
            </div>
            <ul class="grid grid-cols-2 w-full gap-3">
              <li>
                <input type="radio" id="9" name="pey" value="9" class="hidden peer" requiblue>
                <label for="9" class="flex items-center justify-start gap-x-2 w-full p-2 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-400 peer-checked:text-blue-400 hover:text-gray-600 hover:bg-gray-100">                           
                  <svg class="max-w-12 fill-sky-800" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z"></path></svg>
                  <div class="text-center">
                    <span class="text-sm">پرداخت با درگاه بانکی </span>
                  </div>
                </label>
              </li>
              <li>
                <input type="radio" id="10" name="pey" value="10" class="hidden peer" requiblue>
                <label for="10" class="flex items-center justify-start gap-x-2 w-full p-2 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-400 peer-checked:text-blue-400 hover:text-gray-600 hover:bg-gray-100">                           
                  <svg class="max-w-12 fill-sky-800" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z"></path></svg><div class="text-center">
                    <span class="text-sm">پرداخت در محل</span>
                  </div>
                </label>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bg-white border rounded-xl shadow-lg p-4 md:w-4/12 h-fit space-y-5">
        <div class="p-3">
          <div class="flex gap-x-1 justify-between items-center text-zinc-600 px-2 py-3 font-semibold">
            <div>
              قیمت کالاها (2)
            </div>
            <div class="flex gap-x-1">
              <div>
              <?php
                $all_price = 0;
                 foreach($cart as $price){ 
                    $all_price += $price['product_price']; 
                 }
                 echo number_format($all_price); ?> 
              </div>
              <div>
                تومان
              </div>
            </div>
          </div>
          <div class="flex gap-x-1 justify-between items-center text-red-500 font-semibold mt-3 px-2 py-3">
            <div>
              تخفیف
            </div>
            <div class="flex gap-x-1">
              <div>
              <?php
                $all_discount = 0;
                 foreach($cart as $price){ 
                    $all_discount += $price['total_discount']; 
                 }
                 echo number_format($all_discount); ?>
              </div>
              <div>
                تومان
              </div>
            </div>
          </div>
          <div class="flex gap-x-1 justify-between items-center text-zinc-800 mt-5 px-2 pt-5 font-black border-t">
            <div>
              جمع سبد خرید
            </div>
            <div class="flex gap-x-1">
              <div>
              <?php
                $all_cart_price = 0;
                 foreach($cart as $price){ 
                    $all_cart_price += $price['total_price']; 
                 }
                 echo number_format($all_cart_price); ?>
              </div>
              <div>
                تومان
              </div>
            </div>
          </div>
          <a href="./checkout.html" class="mx-auto block text-center w-full px-2 py-3 mt-8 bg-sky-500 hover:bg-sky-400 transition text-gray-100 rounded-lg">
            تکمیل سفارش و پرداخت
          </a>
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