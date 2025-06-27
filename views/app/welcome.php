<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>خوش آمدید</title>

  <link rel="stylesheet" href="<?= url('public/app/assets/css/main.css') ?>">

</head>
<body class="mx-auto bg-[#fcfcfc]">

  <main class="max-w-[1600px] mx-auto">
    <div class="flex justify-center items-center h-screen">
      <div class="bg-white rounded-3xl shadow-xl border border-zinc-100 w-11/12 sm:w-7/12 md:w-6/12 lg:w-4/12 h-auto py-5 px-4">
        <div class="mt-5 mb-4 text-xl font-semibold text-center text-zinc-800">
          به فروشگاه هایپر استار خوش آمدید.
        </div>
        <div class="mt-6 mb-4 text-sm text-zinc-500">
          با تکمیل اطلاعات حساب کاربری کمک زیادی به ما برای پیشنهاد های مناسب به شما میکنید.
        </div>
        
        <div class="mt-10">
          <a class="text-sm text-sky-600 hover:text-sky-500 transition flex items-center" href="<?= url('/') ?>">
            صفحه اصلی فروشگاه
            <svg class="fill-sky-400" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
          </a>
        </div>
        <a href="<?= url('customer/profile') ?>" class="mx-auto block text-center w-full px-2 py-3 font-bold mt-8 bg-sky-500 hover:bg-sky-400 transition text-gray-100 rounded-lg">
          ورود به پنل کاربری
        </a>
      </div>
    </div>
  </main>

</body>
  <!-- main javaScript code -->
  <script src="<?= url('public/app/assets/js/main.js') ?>"></script>

</html>