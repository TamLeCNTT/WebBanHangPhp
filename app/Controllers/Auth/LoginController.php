<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Http\Session\Session;
use App\Traits\UserAuthenticateTrait;
use App\Models\User;
use App\Models\Profile;

class LoginController extends BaseController
{

    use UserAuthenticateTrait;

    public function showLoginForm()
    {

        // nếu đã login redirect sang home
        if (auth()) {
            redirect("/home");
        }

        $error = [];
        return $this->render('auth/login');
    }

    public function login()
    {
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        if ($user) {

            $user->password = null; // remove password
            //$_SESSION['user'] = serialize($user);
            session()->set('user', serialize($user));

            if (isset($_POST['remember_me'])) {

                // chuyển mảng sang chuỗi để mã hoá
                $str = serialize($credentials);

                // hàm mã hoá chuỗi được định nghĩa trong helpers.
                $encrypted = encrypt($str, ENCRYPTION_KEY);

                // cookie hết hạn 01/12/2021 23:59:59
                setcookie('credentials', $encrypted, mktime(23, 59, 59, 12, 1, 2021));
            }

            $username = auth()->username;

            $users = User::where('username', $username)->first();
            $profile = Profile::where('user_id', $users->id_nguoidung)->first();
            if ($profile != null) {
                $_SESSION["username"] = $profile->username;
                $_SESSION["anh"] = $profile->avatar;
            } else
                $_SESSION["username"] = $username;
            $users = User::where('username', $username)->first();
            $_SESSION['quyen'] = $users->quyen->quyen;
            

            session()->setFlash(\FLASH::SUCCESS, "Đăng nhập thành công!");
            $_SESSION["trangtruoc"]="/home";
            //redirect('/home');
            $this->redirect('/home');
        }

        $errors[] = 'Username or password is invalid!';

        // nếu login sai show form login và hiển thị lỗi
        return $this->render('auth/login', ['errors' => $errors, 'params' => $credentials]);
    }

    public function logout()
    {

        $this->signout();

        $this->session->setFlash(\FLASH::INFO, 'Cảm ơn Thầy đã xem! chúc Thầy thật nhiều sức khỏe!');
        //redirect('/home');
        $this->redirect('/home');
    }


    public function getCredentials()
    {
        return [
            'username'  => $_POST['username'] ?? null,
            'password'  => $_POST['password'] ?? null
        ];
    }
}
