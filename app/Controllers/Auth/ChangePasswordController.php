<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;
use App\Models\User;

class ChangePasswordController extends BaseController
{
    use UserAuthenticateTrait;

    public function changePasswordForm()
    {
        if (auth() == null) {
            //redirect("/home");
            $this->redirect('/home');
        }

        $error = [];
        return $this->render('auth/password-change');
    }

    public function changePassword()
    {
        $user = User::whereusername(auth()->username)->first();
        $params = [];
        $errors = [];
        $params['old-pass'] = $_POST['old-password'] ?? null;
        $params['new-pass'] = $_POST['new-password'] ?? null;
        $params['confirm-pass'] = $_POST['confirm-password'] ?? null;
        // dump($params['old-pass']);
        // dump($user->password);
        if ($params['old-pass'] != null && $params['new-pass'] != null && $params['confirm-pass'] != null) {
            if (password_check($params['old-pass'], $user->password)) {
                $pattern = '/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
                if (!preg_match($pattern, $params['new-pass'])) {
                    $errors['new-pass'] = "Mật khẩu phải chứa ít nhất 1 ký tự in hoa, một con số, 1 ký tự đặc biệt và dài ít nhất 8 ký tự!";
                }
                if ($params['new-pass'] != $params['confirm-pass']) {
                    $errors['confirm_pass'] = "Mật khẩu nhập lại không khớp!";
                }
            } else {
                $errors['old-pass'] = "Mật khẩu cũ không đúng!";
            }
        } else {
            $errors['general'] = "Vui lòng điền cả 3 trường!";
        }
        if (empty($errors)) {
            $user->password = password_encrypt($params['new-pass']);
            $user->save();
            session()->setFlash(\FLASH::SUCCESS, 'Thay đổi mật khẩu thành công!');
            redirect('/home');
        }
        return $this->render('auth/password-change', ['errors' => $errors]);
    }
}
