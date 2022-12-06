<?php

namespace App\Traits;

use App\Models\User;

trait UserAuthenticateTrait
{
    /**
     * Kiểm tra thông tin user
     * So khớp password == password_hash
     *
     * @param array $credentials
     * @return \App\Models\User|mixed|null
     */
    public function authenticate($credentials)
    {
        $user = User::where(['username' => $credentials['username']])->first();
        if ($user) {

            // kiểm tra mật khẩu nhập với mật khẩu đã băm trong CSDL
            if (password_check($credentials['password'], $user->password)) {

                return $user;
            }

            return null;
        }
        return null;
    }

    public function signout()
    {
        //unset($_SESSION['user']);
        session()->remove('user');
        unset($_SESSION['quyen']);
        unset($_SESSION['anh']);
        if (isset($_COOKIE['credentials'])) {
            setcookie('credentials', null, time() - 3600);
        }
    }

    public function signup($params)
    {
        $isSuccess = false;
        $errors = [];

        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if (!preg_match($pattern, $params['username'])) {
            $errors['username'] = 'Only letters, number, undercore and at least 6 characters long allowed!';
        }

        if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }

        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if (!preg_match($pattern, $params['password'])) {
            $errors['password'] = 'Password must contains at least one capitalize letter, number and special character!';
        }
        if ($params['password'] !== $params['confirm_password']) {
            $errors['confirm_password'] = 'Password does not match!';
        }

        $user = User::where(['username' => $params['username']])->first();
        if ($user) {
            $errors['username'] = 'This username is already taken. Please choose another one.';
        }

        if (empty($errors)) {

            $params['password'] = password_encrypt($params['password']);
            $params['created_at'] = date("Y-m-d H:i:s");

            $newUser = new User();
            $newUser->username = $params['username'];
            $newUser->password = $params['password'];
            $newUser->email = $params['email'];
            $newUser->save();

            if ($newUser) {
                $messages['success'] = 'Congratulations! Your account has been created successfully!';
                $isSuccess = true;
            } else {
                $errors['failed'] = 'Registration failes. Something went wrong, please try again.';
            }
        }

        $view = 'auth/register';
        $data = [
            'errors'    => $errors,
            'params'    => $params,
        ];

        if ($isSuccess) {
            $view = 'auth/register_success';
            echo $this->render($view, ['messages' => $messages]);
        } else {
            echo $this->render($view, $data);
        }
    }
}
