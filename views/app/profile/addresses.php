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
            <span class="w-1 h-7 transition-all rounded-md bg-sky-500">
            </span>
            <a class="flex gap-x-1 items-center text-sky-700 my-1 w-full" href="<?= url('customer/profile-addresses') ?>">
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
          آدرس های من:
          </div>
        <?php
          if(!empty(flash('successful_change_address')))
          {
           $message = flash('successful_change_address');
        ?>
           <h4 style="color:green"><?= $message ?></h4>

        <?php }else if(!empty(flash('failed_change_address')))
          {
           $message = flash('failed_change_address');
        ?>
           <h4 style="color:red"><?= $message ?></h4>
        <?php } ?>
          
          
        <?php foreach($addresses as $address){ ?>
          <div class="space-y-5">
            <div class="border border-zinc-300 rounded-md">
              <div class="border-b border-b-zinc-400 p-3 text-zinc-800 text-sm flex justify-between items-center">
                <?= $address['province'] . '-' . $address['city'] ?>
                <span onclick="showEditAddress(<?= $address['id'] ?>, '<?= $address['province'] ?>', '<?= $address['city'] ?>', '<?= $address['address_line'] ?>', '<?= $address['postal_code'] ?>', '<?= $address['house_number'] ?>', '<?= $address['unit_number'] ?>')" class="text-zinc-50 cursor-pointer hover:text-zinc-100 transition bg-sky-500 hover:bg-sky-600 px-3 py-1 text-xs rounded-md">
                ویرایش آدرس
                </span>
              </div>
              <div class="px-5 py-4 text-zinc-600 fill-zinc-600 space-y-4 text-sm">
                <div class="flex gap-x-1 items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path></svg>
                <?= $address['address_line'] ?>
                </div>
                <div class="flex gap-x-1 items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M228.44,89.34l-96-64a8,8,0,0,0-8.88,0l-96,64A8,8,0,0,0,24,96V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V96A8,8,0,0,0,228.44,89.34ZM96.72,152,40,192V111.53Zm16.37,8h29.82l56.63,40H56.46Zm46.19-8L216,111.53V192ZM128,41.61l81.91,54.61-67,47.78H113.11l-67-47.78Z"></path></svg>
                <?php 
                  if(empty($address['postal_code']))
                  {
                   echo '___';

                  } 
                ?>
                </div>
                <div class="flex gap-x-1 items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z"></path></svg>
                <?= $address['phone_number'] ?>
                </div>
                <div class="flex gap-x-1 items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                <?= $address['first_name'] . ' ' . $address['last_name'] ?>
                </div>
              </div>
              <a href="<?= url('customer/profile-addresses/delete/' . $address['id']) ?>" class="text-zinc-50 hover:text-zinc-100 transition bg-red-500 hover:bg-red-600 px-3 py-1 block w-fit mb-2 mr-5 text-xs rounded-md">
                حذف آدرس
               </a>
            </div>
          </div><br>
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
          <?php } ?>
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