<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ورود</title>

  <link rel="stylesheet" href="<?= url('public/app/assets/css/main.css') ?>">

</head>
<body class="mx-auto bg-[#fcfcfc]">

  <main class="max-w-[1600px] mx-auto">
    <div class="flex justify-center items-center h-screen">
      <a class="absolute top-2 left-2 text-sm bg-sky-500 text-white rounded-md py-2 px-6" href="<?=url('/') ?>">
        صفحه اصلی
      </a>
      <div class="bg-white rounded-3xl shadow-xl border border-zinc-100 w-11/12 sm:w-7/12 md:w-6/12 lg:w-4/12 h-auto py-5 px-4">
        <div class="mt-5 text-lg font-semibold text-zinc-800">
          ورود به پنل کاربری  
        </div>
        <div class="my-4 text-xs text-zinc-500">
          لطفا شماره موبایل و رمز عبور خود را وارد کنید
        </div>
    <form action="<?= url('check-login') ?>" method="POST">
        <input type="tel" placeholder="ایمیل" name="email" class="placeholder:text-right text-sm block w-full bg-zinc-50 mb-7 rounded-xl border border-gray-300 px-4 py-4 text-gray-700 outline-none transition-all focus:border-sky-500 focus:outline-none">
        <input type="password" placeholder="رمز عبور" name="password" class="placeholder:text-right text-sm block w-full bg-zinc-50 rounded-xl border border-gray-300 px-4 py-4 text-gray-700 outline-none transition-all focus:border-sky-500 focus:outline-none">
        
        <button class="mx-auto w-full px-2 py-3 font-bold mt-8 bg-sky-500 hover:bg-sky-400 transition text-gray-100 rounded-lg">
          ورود
        </button>
    </form>
        <div class="text-sm text-zinc-600 mt-4">
          <span>
            اکانت ندارید؟
          </span>
          <a href="<?=url('register') ?>" class="text-sky-500">
            ثبت نام کنید
          </a>
        </div>
        <div class="mt-8 text-xs text-zinc-500">
          ورود شما به معنای پذیرش <a class="text-sky-400 hover:text-sky-500 transition" href=""> قوانین و مقررات</a> هایپر استار میباشد.
        </div>
      </div>
    </div>
  </main>

</body>
  <!-- main javaScript code -->
  <script src="<?= url('public/app/assets/js/main.js') ?>"></script>

</html>