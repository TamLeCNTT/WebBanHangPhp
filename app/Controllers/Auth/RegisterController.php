<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use App\Traits\UserAuthenticateTrait;
use App\Models\Profile;
use Illuminate\Support\Facades\Mail;


class RegisterController extends BaseController
{
    use UserAuthenticateTrait;

    public function showRegisterForm()
    {
        return $this->render('auth/register');
    }

    public function register()
    {
        $username = $_POST['username'] ?? null;
        $email = $_POST['email'] ?? null;
        $sdt = $_POST['sdt'] ?? null;
        $diachi = $_POST['diachi'] ?? null;
        $password = $_POST['password'] ?? null;
        $confirm_password = $_POST['confirm_password'] ?? null;
        $nguoidung = new User();
        $ok = 1;
        $name = "huleee";
        Mail::send('email.test', compact('name'), function ($email) {
            $email->to('letamxi87@gmail.com');
        });
        if ($username != null) {

            $pattern = "/^0\d{9,10}$/";
            if (!preg_match($pattern, $sdt)) {
                $ok = 0;
                session()->setFlash(\FLASH::ERROR, 'Số điện thoại gồm 10 chữ số và bắt đầu bằng số 0 !');

                $nguoidung->errors['sdt'] = 'Sai định dạng số điện thoại';
            } else {
                if ($password != $confirm_password) {
                    session()->setFlash(\FLASH::ERROR, 'Lỗi nhập mật khẩu');
                    $nguoidung->errors['confirm_password'] = 'Mật khẩu không khớp ! Vui lòng kiểm tra lại .';
                } else {
                    $nguoidungs =  User::where(['username' => $username])->first();
                    if (!$nguoidungs && $ok == 1) {
                        $nguoidung->username = $username;
                        $nguoidung->password = $password;
                        $nguoidung->password = password_encrypt($nguoidung->password);;
                        $nguoidung->ID_quyen = 2;
                        $profile = new Profile();

                        $nguoidung->save();
                        $profile->username = $username;
                        $profile->user_id = $nguoidung->id_nguoidung;
                        $profile->location = $diachi;
                        $profile->phone = $sdt;
                        $profile->email = $email;

                        $profile->save();
                        session()->setFlash(\FLASH::SUCCESS, 'Đăng kí thành công!');
                        return $this->render('auth/login', [
                            'messages' => [
                                'success' => 'Congratulations!'
                            ]
                        ]);
                    } else {
                        $nguoidung->errors['username'] = 'Hãy thử với tên khác ';

                        session()->setFlash(\FLASH::WARNING, 'Username đã tồn tại !');
                        //$errors = "nguoidung name already existed!";
                    }
                }
            }
        }
        $params = [
            'username'  => $username,
            'email' => $email,
            'sdt'  => $sdt,
            'password' => $password,
            'diachi' => $diachi,
            'confirm_password' => $confirm_password
        ];
        return $this->render('auth/register', ['errors' => $nguoidung->errors, 'params' => $params]);
    }
}
