<?php

namespace App\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\SanPham;
use App\Http\Paginator;
use App\Http\Response;

class ProfileController extends BaseController
{
    public function showForm()
    {
        $username = auth()->username;

        $user = User::where('username', $username)->first();
      
        $profile = Profile::where('user_id', $user->id_nguoidung)->first();
        return $this->render(
            'profile/profile-show',
            [
                'profile' => $profile
            ]
        );
    }
    public function edit()
    {
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $profile = Profile::where('user_id', $user->id_nguoidung)->first();

        if ($profile == null) {
            $profile = new Profile();
        }
        $username = $_POST['username'] ?? null;
        $firstname = $_POST['firstname'] ?? null;
        $lastname = $_POST['lastname'] ?? null;

        $location = $_POST['location'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $email = $_POST['email'] ?? null;
        if (($_FILES['image']['name'] != null)) {
            $uploaddir = 'assets/images/profile/';
            $uploadfile = $uploaddir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
            ) {
                session()->setFlash(\FLASH::WARNING, 'Lỗi, chỉ định dạng JPG, JPEG, PNG & GIF được cho phép.');
            }
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            } else {
                session()->setFlash(\FLASH::ERROR, 'Hình ảnh loại sản phẩm tải lên thất bại!');
            }
        }
        $profile->username = $username;
        $profile->firstname = $firstname;
        $profile->lastname = $lastname;
        $_SESSION["username"] = $username;
        $profile->location = $location;
        $profile->email = $email;
        $profile->phone = $phone;
        $profile->user_id = $user->id_nguoidung;
        if ($_FILES['image']['name'] != null)
            $profile->avatar = $_FILES['image']['name'];

        $_SESSION["anh"] = $profile->avatar;

        $profile->save();
        session()->setFlash(\FLASH::SUCCESS, 'Cập nhật thông tin thành công!');

        return $this->render('profile/profile-show', ["profile" => $profile]);
    }
}
