<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>سبد خرید</title>

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
        سبد خرید
      </div>
      <div class="w-full h-px bg-zinc-300">
      </div>
    </span>
    <div class="flex flex-col md:flex-row gap-5">
      <div class="md:w-8/12">
        <div class="bg-white border rounded-xl shadow-lg p-4">
    <?php foreach($cart as $details){
                if($details['quantity'] != 0){ ?>
          <div class="mt-7 flex flex-col md:flex-row gap-y-5 border-b pb-4">
            <div class="w-10/12 mx-auto md:max-w-36">
              <img src="<?php $image = explode("," , $details['product_image']); echo asset($image[0]); ?>" alt="">
              <div class="flex h-10 w-24 items-center justify-between rounded-lg border border-gray-100 px-2 py-1 mt-5 mx-auto">
              <?php if($details['quantity'] == $details['product_stock']){ ?>
                <button type="button" data-action="increment" disabled>
                    <a href="" >
                  <svg class="fill-green-600" xlink:href="#plus" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M222,128a6,6,0,0,1-6,6H134v82a6,6,0,0,1-12,0V134H40a6,6,0,0,1,0-12h82V40a6,6,0,0,1,12,0v82h82A6,6,0,0,1,222,128Z"></path></svg>
                    </a>
                </button>
            <?php }else{ ?>
                <button type="button" data-action="increment">
                    <a href="<?= url('cart/increment/' . $details['product_id']) ?>">
                  <svg class="fill-green-600" xlink:href="#plus" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M222,128a6,6,0,0,1-6,6H134v82a6,6,0,0,1-12,0V134H40a6,6,0,0,1,0-12h82V40a6,6,0,0,1,12,0v82h82A6,6,0,0,1,222,128Z"></path></svg>
                    </a>
                </button>
            <?php } ?>

                <input value="<?= $details['quantity'] ?>" disabled="" type="number" class="flex h-5 w-full grow select-none items-center justify-center bg-transparent text-center text-sm text-zinc-700 outline-none">
            
            <?php if($details['quantity'] == 1){ ?>
                <button type="button" data-action="decrement" disabled>
                    <a href="<?= url('cart/delete/' . $details['product_id']) ?>">
                  <svg class="fill-red-600" xlink:href="#minus" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M222,128a6,6,0,0,1-6,6H40a6,6,0,0,1,0-12H216A6,6,0,0,1,222,128Z"></path></svg>
                    </a>
                </button>
            <?php }else{ ?>
                <button type="button" data-action="decrement">
                    <a href="<?= url('cart/decrement/' . $details['product_id']) ?>">
                  <svg class="fill-red-600" xlink:href="#minus" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M222,128a6,6,0,0,1-6,6H40a6,6,0,0,1,0-12H216A6,6,0,0,1,222,128Z"></path></svg>
                    </a>
                </button>
            <?php } ?>
              </div>
              <?php if($details['quantity'] == $details['product_stock']){ ?>
              <span style="color:red;font-size:12px;" class="text-sm">حداکثر تعداد قابل انتخاب</span>
              <?php } ?>
            </div>
            <div class="mr-2 md:mr-5 w-full">
              <!-- title -->
              <div class="text-xl text-zinc-700">
                <?= $details['product_title'] ?>
            </div>
              <div class="w-full space-y-2 mt-5">
                <!-- attribute -->


           <!-- <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <span class="h-4 w-4 rounded-full bg-gray-900"></span>
                    <span>مشکی</span>
                  </div>
                </div> -->
                <div class="flex items-center gap-x-2 text-xs text-zinc-500">
                  <div class="flex items-center gap-x-2">
                    <svg class="fill-zinc-600" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="" viewBox="0 0 256 256"><path d="M245.57,117.78l-14-35a13.93,13.93,0,0,0-13-8.8H182V64a6,6,0,0,0-6-6H24A14,14,0,0,0,10,72V184a14,14,0,0,0,14,14H42.6a30,30,0,0,0,58.8,0h53.2a30,30,0,0,0,58.8,0H232a14,14,0,0,0,14-14V120A6,6,0,0,0,245.57,117.78ZM182,86h36.58a2,2,0,0,1,1.86,1.26L231.14,114H182ZM22,72a2,2,0,0,1,2-2H170v68H22ZM72,210a18,18,0,1,1,18-18A18,18,0,0,1,72,210Zm82.6-24H101.4a30,30,0,0,0-58.8,0H24a2,2,0,0,1-2-2V150H170v15.48A30.1,30.1,0,0,0,154.6,186ZM184,210a18,18,0,1,1,18-18A18,18,0,0,1,184,210Zm50-26a2,2,0,0,1-2,2H213.4A30.05,30.05,0,0,0,184,162c-.67,0-1.34,0-2,.07V126h52Z"></path></svg>
                    <span>ارسال پست پیشتاز</span>
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
                <!-- price -->
                <div class="text-gray-700 pt-4">
                    <?php if($details['discount_amount'] != 0){ ?>
                  <span style="color:red;font-size:12px" class="text-xl"><?= number_format($details['total_discount']) ?></span>
                  <span style="color:red;font-size:12px" class="text-sm"> تومان تخفیف </span><br>
                  <?php } ?>
                  <span></span>
                  <span class="text-xl font-bold"><?= number_format($details['total_price']) ?></span>
                  <span class="text-sm">تومان</span>

                  <?php if($details['product_stock'] <= 10){ ?>
                  <div class="text-xs text-red-400 mt-3">تنها <?= $details['product_stock'] ?> عدد در انبار باقی مانده</div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
    <?php } } ?>
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
              مجموع تخفیف ها
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
          <a href="<?= url('checkout') ?>" class="mx-auto block text-center w-full px-2 py-3 mt-8 bg-sky-500 hover:bg-sky-400 transition text-gray-100 rounded-lg">
            تایید و تکمیل سفارش
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