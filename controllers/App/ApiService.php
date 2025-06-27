<?php

namespace App;

class ApiService {

    private $token;

    public function __construct($token)
    {
        // توکن API را دریافت می‌کنیم
        $this->token = $token;
    }

    /**
     * جستجو و گرفتن اطلاعات محصولات از API
     * 
     * @param string $query  عبارت جستجو (مثلاً نام دسته یا محصول)
     * @return array|null   داده‌های دریافتی از API (در صورت موفقیت) یا null (در صورت خطا)
     */
    public function searchProducts($query)
    {
        // ساخت URL درخواست با استفاده از توکن و عبارت جستجو
        $url = "https://one-api.ir/mobile/?token=" . $this->token . "&action=search&q=" . urlencode($query);

        // انجام درخواست cURL
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,  // برای دریافت خروجی به عنوان string
            CURLOPT_FOLLOWLOCATION => true,  // پیگیری ریدایرکت‌ها
        ]);

        // دریافت پاسخ از API
        $response = curl_exec($ch);

        // در صورتی که مشکلی در درخواست باشد، باید آن را مدیریت کنیم
        if(curl_errno($ch)) {
            curl_close($ch);
            return null;  // اگر درخواست با خطا مواجه شد، null برمی‌گردانیم
        }

        // بستن اتصال cURL
        curl_close($ch);

        // تبدیل پاسخ JSON به آرایه و بازگشت آن
        return json_decode($response, true);
    }

    /**
     * بررسی وضعیت دسترسی به API
     * 
     * @return bool  اگر API در دسترس باشد true باز می‌گرداند، در غیر این صورت false
     */
    public function isAvailable()
    {
        // ساخت URL درخواست برای بررسی وضعیت API
        $url = "https://one-api.ir/mobile/?token=" . $this->token . "&action=checkAvailability";

        // انجام درخواست cURL
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,  // برای دریافت خروجی به عنوان string
            CURLOPT_FOLLOWLOCATION => true,  // پیگیری ریدایرکت‌ها
        ]);

        // دریافت پاسخ از API
        $response = curl_exec($ch);

        // در صورتی که مشکلی در درخواست باشد، باید آن را مدیریت کنیم
        if(curl_errno($ch)) {
            curl_close($ch);
            return false;  // اگر درخواست با خطا مواجه شد، false برمی‌گردانیم
        }

        // بستن اتصال cURL
        curl_close($ch);

        // تبدیل پاسخ JSON به آرایه و بررسی وضعیت آن
        $data = json_decode($response, true);

        // بررسی وضعیت API
        return isset($data['status']) && $data['status'] == 'success';
    }
}
