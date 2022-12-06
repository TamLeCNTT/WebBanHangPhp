<?php

namespace App\Controllers;

use App\Models\User;


use App\Http\Paginator;
use App\Http\Response;
use App\Models\Binhluan;
use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\NhaSanXuat;
use App\Models\Khuyenmai;
use App\Models\Profile;

class UserController extends BaseController
{
    public function showForm()
    {
        $binhluan = Binhluan::all();
        $hoadon = Hoadon::all();
        $user = user::withTrashed()->paginate($this->getPerPage());
        $total = user::count();
        $paginator = new Paginator($this->request, $user, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'user/user-list',
                [
                    'user' => $user,
                    'paginator' => $paginator,
                    'binhluan' => $binhluan,
                    'hoadon' => $hoadon
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'user/user',
            [
                'user' => $user,
                'paginator' => $paginator,
                'binhluan' => $binhluan,
                'hoadon' => $hoadon
            ]
        );
    }

    public function showEditForm($id)
    {
        $user  = user::where('id_nguoidung', $id)->first();


        return $this->render(
            'user/user-edit',
            [
                'user' => $user,

            ]
        );
    }

    public function edit()
    {
        $id = $this->request->post('id');
        $id_quyen = $_POST['id_quyen'];
        $user = user::where('id_nguoidung', $id)->first();
        $user->ID_quyen = $id_quyen;
        $user->save();
        session()->setFlash(\FLASH::SUCCESS, 'Thay đổi thành công!');

        redirect('/user');
    }
    public function khoiphuc($id)
    {

        $user = user::withTrashed()->where('id_nguoidung', $id)->first();
        if ($user->TrangthaiTK == 3) {
            $user->TrangthaiTK = 1;
            $user->deleted_at = null;
            $user->save();
            return redirect('/user');
        }
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $user = user::withTrashed()->where('id_nguoidung', $id)->first();

        if ($this->request->ajax()) {
            if ($user) {
                if ($user->delete()) {
                    $user->TrangthaiTK = 3;
                    $user->save();
                    return $this->json([
                        'message' => $user->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa người dùng!'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'ID không tồn tại!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }
    public function deletekhongchoxoa()
    {
        session()->setFlash(\FLASH::INFO, 'Tài khoản không được xóa do khóa ngoại có dữ liệu !');
        $this->showForm();
    }
    public function Khoa($id)
    {
        $user = User::where('id_nguoidung', $id)->first();
        if ($user->TrangthaiTK != 2)
            $user->TrangthaiTK = 2;
        else
            $user->TrangthaiTK = 1;
        $user->save();
        return redirect('/user');
    }


    public function DKbanhang()
    {
        $id_loai = $_POST['id_loai'] ?? null;
        $sdt = $_POST['sdt'] ?? null;
        $diachi = $_POST['diachi'] ?? null;

        $users = auth()->username;
        $user = User::where('username', $users)->first();
        $user->ID_quyen = 3;
        $user->id_loaihang = $id_loai;
        // $user->diachi=$diachi;

        // $user->sdt=$sdt;

        $user->save();
        $profile = Profile::where('user_id', $user->id_nguoidung)->first();
        $profile->phone = $sdt;
        $profile->location = $diachi;
        $profile->save();


        $_SESSION['quyen'] = $user->quyen->quyen;
        $quyen = $user->quyen->quyen;
        session()->setFlash(\FLASH::SUCCESS, "Sản phẩm đã được thêm thành công! $quyen ");
        redirect('/sanphamshow');
    }
    public function DKbanhangform()
    {

        $loaihang = LoaiSanPham::all();


        return $this->render(
            'user/user-DKbanhang',
            [

                'loai' => $loaihang
            ]


        );
    }
    public function chart()
    {

        return $this->render(
            'user/user-chart'
        );
    }
}
