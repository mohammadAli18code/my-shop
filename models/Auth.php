<?php

namespace Auth;

use database\DataBase;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Auth
{

    public function redirect($url)
    {
        header('Location: ' . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    public function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


    private function hash($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }


    private function random()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }


    public function activationMessage($username, $verifyToken)
    {
        $message = '
        <h1>فعال سازی حساب کاربری</h1>
        <p>' . $username . ' عزیز برای فعال سازی حساب کاربری خود لطفا روی لینک زیر کلیک نمایید</p>
        <di><a href="' . url('activation/' . $verifyToken) . '">فعال سازی حساب</a></di>
        ';
        return $message;
    }


    // public function sendMail($emailAddress, $subject, $body)
    // {

    //     //Create an instance; passing `true` enables exceptions
    //     $mail = new PHPMailer(true);
        

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    //         $mail->CharSet = "UTF-8"; //Enable verbose debug output
    //         $mail->isSMTP(); //Send using SMTP
    //         $mail->Host = MAIL_HOST; //Set the SMTP server to send through
    //         $mail->SMTPAuth = SMTP_AUTH; //Enable SMTP authentication
    //         $mail->Username = MAIL_USERNAME; //SMTP username
    //         $mail->Password = MAIL_PASSWORD; //SMTP password
    //         $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
    //         $mail->Port = MAIL_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //         //Recipients
    //         $mail->setFrom(SENDER_MAIL, SENDER_NAME);
    //         $mail->addAddress($emailAddress);

    //         // dd($mail);


    //         //Content
    //         $mail->isHTML(true); //Set email format to HTML
    //         $mail->Subject = $subject;
    //         $mail->Body = $body;
    //         // dd($mail);
    //         $mail->send();
            
    //         dd('true');
    //         return true;
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //         return false;
    //     }

    // }


    private function sendMail($emailAddress, $subject, $body)
    {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $mail->CharSet = "UTF-8"; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = MAIL_HOST; //Set the SMTP server to send through
            $mail->SMTPAuth = SMTP_AUTH; //Enable SMTP authentication
            $mail->Username = MAIL_USERNAME; //SMTP username
            $mail->Password = MAIL_PASSWORD; //SMTP password
            $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
            $mail->Port = MAIL_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(SENDER_MAIL, SENDER_NAME);
            $mail->addAddress($emailAddress);


            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }

    }


    //register


    public function register(){

        $db = new DataBase();

        require_once(BASE_PATH . '/template/auth/register.php');
    }


    public function registerStore($request){

        // dd('hi');

        $db = new DataBase();
        $email = $db->select('SELECT email FROM customers WHERE email = ?' , [$request['email']])->fetch();
        if($email != null){
            // dd('email');
            flash('register_error' , 'ایمیل از قبل وجود دارد!');
            $this->redirectBack();
        }
        $phone = $db->select('SELECT phone_number FROM customers WHERE phone_number = ?' , [$request['phone_number']])->fetch();
        if($phone != null){
            // dd('email');
            flash('register_error' , 'با این شماره همراه قبلا ثبت نام شده است');
            $this->redirectBack();
        }
        if(
           empty($request['email']) || 
           empty($request['phone_number']) || 
           empty($request['password']) ||
           empty($request['confirm']) 
        ){
            // dd('complete');
            flash('register_error' , 'لطفا همه موارد  را تکمیل نمایید');
            $this->redirectBack();
        }
       
        if($request['password'] != $request['confirm']){
            // dd('hi2');
            flash('register_error' , 'رمز عبور با تکرار آن مطابقت ندارد');
            $this->redirectBack();
        }
        if( strlen($request['password']) < 8){
            // dd('length password');
            flash('register_error' , 'رمز عبور باید حداقل 8 کاراکتر باشد');
            $this->redirectBack();
        }
        // dd('hi3');
            $randomToken = $this->random();
            $activationMessage = $this->activationMessage($request['first_name'], $randomToken);
            $result = $this->sendMail($request['email'], 'فعال سازی حساب کاربری', $activationMessage);
            // dd($result);
        if ($result) {
            // dd('email sent');
            $request['verify_token'] = $randomToken;
            $request['password'] = $this->hash($request['password']);
            $db->insert('users', array_keys($request), $request);
            $this->redirect('login/customer');
        } else {
            // dd('email not sent');

            flash('register_error', 'ارسال ایمیل با خطا مواجه شد');
            $this->redirectBack();
        }



    }






    public function activation($verifyToken)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE verify_token = ? AND is_active = 0;", [$verifyToken])->fetch();
        if ($user == null) {
            $this->redirect('login');
        } else {
            $result = $db->update('users', $user['id'], ['is_active'], [1]);
            $this->redirect('login');
        }
    }


    //login


    public function customerLogin()
    {

        require_once(BASE_PATH . '/template/auth/login.php');

    }




    public function checkLogin($request)
    {
        if (empty($request['email']) || empty($request['password'])) {
            flash('customerLogin_error', 'تمامی فیلد ها الزامی میباشند');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $customer = $db->select("SELECT * FROM customers WHERE email = ?", [$request['email']])->fetch();

            if ($customer != null) {
                // if (password_verify($request['password'], $customer['password'])) {
                if ($request['password'] == $customer['password']) {
                    $_SESSION['customer_id'] = $customer['id'];
                    $this->redirect('welcome');
                // } else {
                //     flash('customerLogin_error', 'رمز عبور نادرست است!');
                //     $this->redirectBack();
                // }
            } else {
                flash('customerLogin_error', 'کاربری با این مشخصات یافت نشد');
                $this->redirectBack();
            }
        }
    }
}

    public function adminLogin()
    {
        require_once(BASE_PATH . '/template/auth/admin-login.php');
    }



    public function checkAdmin($request)
    {
        if (empty($request['email']) || empty($request['password']) || empty($request['id'])) {
            flash('adminLogin_error', 'تمامی فیلد ها الزامی میباشند');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $admin = $db->select("SELECT * FROM admins WHERE email = ? AND id = ?", [$request['email'] , $request['id']])->fetch();


            if ($admin != null) {
                if($admin['id'] == $request['id']){

                if ($request['password'] == $admin['password']) {
                    $_SESSION['admin_id'] = $admin['id'];
                    $this->redirect('admin/dashboard');
                } else {
                    flash('adminLogin_error', 'رمز عبور نادرست است!');
                    $this->redirectBack();
                }
                } else {
                flash('adminLogin_error', 'ایمیل یا شناسه ادمین نا معتبر است!');
                $this->redirectBack();
                }
            } else {
                flash('adminLogin_error', 'ایمیل یا شناسه ادمین نا معتبر است!');
                $this->redirectBack();
                }
                
               
        }
    }


    public function checkCustomerPermission()
    {

        if (isset($_SESSION['customer_id'])) 
        {
            $db = new DataBase();
            $customer = $db->select('SELECT * FROM customers WHERE id = ?', [$_SESSION['customer']])->fetch();
            if ($customer != null) {
                $this->redirect('home'); 
            } else {
            // dd('hi3');
            flash('customerLogin_error' , 'ورود انجام نشد!لطفا با پشتیبانی تماس بگیرید.');
            $this->redirect('login');
            }
        }
    }
    public function checkAdminPermission()
    {
        if (isset($_SESSION['admin_id'])) 
        {
            $db = new DataBase();
            $admin = $db->select('SELECT * FROM admins WHERE id = ?', [$_SESSION['admin_id']])->fetch();
            if ($admin != null)
            {
                if ($admin['permission'] != 'admin') {
                  // dd('hi3');
                $this->redirect('admin/dashboard'); 
                }
        
            } else {
            // dd('hi3');
            flash('adminLogin_error' , 'ورود انجام نشد! لطفا با پشتیبانی تماس بگیرید.');
            $this->redirect('login/admin');
            }
        }else {
            $this->redirect('login/admin');
        }
    }

    


    public function logout()
    {
        //admin logout
        if (isset($_COOKIE['admin_id']))
        {
            //delete cookie
            setcookie('admin_id', '', time() - 3600, '/');

            //delete session
            unset($_SESSION['adminInfo']);
            session_destroy(); 
        }

        //customer logout
        if (isset($_COOKIE['customer_id']))
        {
            //delete cookie
            setcookie('customer_id', '', time() - 3600, '/');

            //delete session
            unset($_SESSION['customerInfo']);
            unset($_SESSION['cart']);
            unset($_SESSION['cart_count']);
            session_destroy(); 
        }
        $this->redirect('/');
    }





    public function forgot()
    {
        require_once(BASE_PATH . '/template/auth/forgot.php');
    }



    public function forgotMessage($username, $forgotToken)
    {
        $message = '
        <h1>فراموشی رمز عبور</h1>
        <p>' . $username . ' عزیز برای تغییر رمز عبور حساب کاربری خود لطفا روی لینک زیر کلیک نمایید</p>
        <di><a href="' . url('reset-password-form/' . $forgotToken) . '">بازیابی رمز عبور</a></di>
        ';
        return $message;
    }


    public function forgotRequest($request)
    {
        if (empty($request['email'])) {
            flash('forgot_error', 'ایمیل الزامی میباشد');
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('forgot_error', 'ایمیل معتبری وارد نشده');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select('SELECT * FROM users WHERE email = ?', [$request['email']])->fetch();
            if ($user == null) {
                flash('forgot_error', 'کاربر یافت نشد');
                $this->redirectBack();
            } else {
                $randomToken = $this->random();
                $forgotMessage = $this->forgotMessage($user['username'], $randomToken);
                $result = $this->sendMail($request['email'], 'بازیابی رمز عبور', $forgotMessage);
                if ($result) {
                    date_default_timezone_set('Asia/Tehran');
                    $db->update('users', $user['id'], ['forgot_token', 'forgot_token_expire'], [$randomToken, date('Y-m-d H:i:s', strtotime('+15 minutes'))]);
                    $this->redirect('login');
                } else {
                    flash('forgot_error', 'ارسال ایمیل انجام نشد');
                    $this->redirectBack();
                }
            }
        }
    }


    public function resetPasswordView($forgot_token)
    {
        require_once(BASE_PATH . '/template/auth/reset-password.php');

    }


    public function resetPassword($request, $forgot_token)
    {
        if (!isset($request['password']) || strlen($request['password']) < 8) {
            flash('reset_error', 'رمز عبور وارد شده باید بیش از ۸ کاراکتر باشد');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select('SELECT * FROM users WHERE forgot_token = ?', [$forgot_token])->fetch();
            if ($user == null) {
                flash('reset_error', 'کاربر یافت نشد');
                $this->redirectBack();
            } else {
                date_default_timezone_set('Asia/Tehran');
                if ($user['forgot_token_expire'] < date('Y-m-d H:i:s')) {
                    flash('reset_error', 'توکن ارسال شده معتبر نمیباشد ( تاریخ به اتمام رسیده )');
                    $this->redirectBack();
                }
                if ($user) {
                    $db->update('users', $user['id'], ['password'], [$this->hash($request['password'])]);
                    $this->redirect('login');
                } else {
                    flash('reset_error', 'کاربر یافت نشد');
                    $this->redirectBack();
                }
            }
        }
    }

}
