<?php

namespace App\Controllers;

use App\Models\Khuyenmai;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\SanPham;
use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\User;

class KhuyenmaiController  extends BaseController
{

    public function showAddForm()
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Partner') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
            $sanpham = SanPham::take(8)->get();
            $loaisanpham = LoaiSanPham::take(6)->get();
            $khuyenmai = Khuyenmai::all();
            $hoadon = Hoadon::all();
            return $this->render(
                'home/index',
                [
                    'sanpham' => $sanpham,
                    'loaisanpham' => $loaisanpham,
                    'khuyenmai' => $khuyenmai,
                    'hoadon' => $hoadon
                ]
            );
        }
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $sanpham = SanPham::where('id_cuahang', $user->id_nguoidung)->get();
        $users = $user->id_nguoidung;
        if ($sanpham == null) {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
            return redirect("cuahang/sanphamcuahang/$users");
        }
        return $this->render('khuyenmai/khuyenmai-add', ['sanpham' => $sanpham]);
    }
    public function add()
    {
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $name = $_POST['khuyenmai_name'] ?? null;
        $phantram = $_POST['khuyenmai_phantram'] ?? null;
        $id_sanpham = $_POST['id_sanpham'] ?? null;
        $khuyenmai_bd = $_POST['khuyenmai_bd'] ?? null;
        $khuyenmai_kt = $_POST['khuyenmai_kt'] ?? null;
        $ok = 1;
        $khuyenmaikt = Khuyenmai::where('id_sanpham', $id_sanpham)->where('NgayKT', '>=', $khuyenmai_bd)->where('NgayBD', '<=', $khuyenmai_kt)->first();
        $sanpham = SanPham::where('id', $id_sanpham)->first();
        if ($khuyenmaikt == null) {
            if ($name != null) {

                if ($ok == 1) {
                    $khuyenmai = new khuyenmai();
                    $khuyenmai->id_sanpham = $id_sanpham;
                    $khuyenmai->name = $name;
                    $khuyenmai->phantram = $phantram;
                    $khuyenmai->NgayBD = $khuyenmai_bd;
                    $khuyenmai->id_cuahang = $user->id_nguoidung;
                    $khuyenmai->NgayKT = $khuyenmai_kt;
                    $khuyenmai->save();
                    $sanpham->giasaukhuyenmai = $sanpham->gia * ((100 - $khuyenmai->phantram) / 100);
                    $sanpham->save();
                    session()->setFlash(\FLASH::SUCCESS, 'Khuyến mãi đã thêm thành công');
                } else {
                    session()->setFlash(\FLASH::WARNING, 'Tên khuyến mãi đã tồn tại');
                    //$errors = "khuyenmai name already existed!";
                }
            } else {
                session()->setFlash(\FLASH::ERROR, 'Tên khuyến mãi không được để trống!');
                //$errors = "khuyenmai name can not null!";
            }
        } else {

            session()->setFlash(\FLASH::ERROR, "Sản phẩm hiện tại đã có khuyến mãi đến hết ngày $khuyenmaikt->NgayKT ");
        }
        return redirect("/khuyenmai");
    }
    public function showList()
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Partner') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
            $sanpham = SanPham::take(8)->get();
            $loaisanpham = LoaiSanPham::take(6)->get();
            $username = auth()->username;
            $user = User::where('username', $username)->first();

            $khuyenmais = Khuyenmai::where('id_cuahang', $user->id_nguoidung)->get();
            $hoadon = Hoadon::all();
            return $this->render(
                'home/index',
                [
                    'sanpham' => $sanpham,
                    'loaisanpham' => $loaisanpham,
                    'khuyenmai' => $khuyenmais,
                    'hoadon' => $hoadon
                ]
            );
        }
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $items = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->paginate($this->getPerPage());
        $total = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->count();
        $paginator = new Paginator($this->request, $items, $total, 15);
        $paginator->onEachSide(2);
        $sanphams = SanPham::where('id_cuahang', $user->id_nguoidung)->count();
        $khuyenmai = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->where('id_cuahang', $user->id_nguoidung)->get();

        if ($this->request->ajax()) {
            $html = $this->view->render(
                'khuyenmai/khuyenmai-list',
                [
                    'khuyenmai' => $khuyenmai,
                    'sanphams' => $sanphams,

                    'paginator' => $paginator,
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'khuyenmai/khuyenmai',
            [

                'khuyenmai' => $khuyenmai,
                'sanphams' => $sanphams,
                'paginator' => $paginator,
            ]
        );
    }
    public function showEditForm($id)
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Partner') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
            $sanpham = SanPham::take(8)->get();
            $loaisanpham = LoaiSanPham::take(6)->get();
            $khuyenmai = Khuyenmai::all();
            $hoadon = Hoadon::all();
            return $this->render(
                'home/index',
                [
                    'sanpham' => $sanpham,
                    'loaisanpham' => $loaisanpham,
                    'khuyenmai' => $khuyenmai,
                    'hoadon' => $hoadon
                ]
            );
        }
        $khuyenmai = Khuyenmai::where('id', $id)->first();
        $sanpham = SanPham::all();
        return $this->render(
            'khuyenmai/khuyenmai-edit',
            [
                'khuyenmai' => $khuyenmai,
                'sanpham' => $sanpham
            ]
        );
    }
    public function edit()
    {
        $id = $this->request->post('id');
        $id_sanpham = $_POST['id_sanpham'] ?? null;
        $name = $_POST['khuyenmai_name'] ?? null;
        $phantram = $_POST['khuyenmai_phantram'] ?? null;
        $khuyenmai_bd = $_POST['khuyenmai_bd'] ?? null;
        $khuyenmai_kt = $_POST['khuyenmai_kt'] ?? null;
        $khuyenmai = Khuyenmai::where('id', $id)->first();
        $sanpham = SanPham::where('id', $id_sanpham)->first();
        $ok = 1;
        if ($khuyenmai->name) {
            if ($name != null) {

                $khuyenmai->id =  $id;
                $khuyenmai->id_sanpham = $id_sanpham;
                $khuyenmai->name = $name;
                $khuyenmai->phantram = $phantram;
                $khuyenmai->NgayBD = $khuyenmai_bd;
                $khuyenmai->NgayKT = $khuyenmai_kt;
                $khuyenmai->save();
                $sanpham->giasaukhuyenmai = $sanpham->gia * ((100 - $khuyenmai->phantram) / 100);
                $sanpham->save();
                session()->setFlash(\FLASH::SUCCESS, 'Khuyến mãi đã thay đổi thành công!');
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id khuyến mãi!');
            $ok = 0;
        }

        if ($ok != 0) {
            redirect('/khuyenmai');
        }
        return $this->render(
            'khuyenmai/khuyenmai-edit',
            [
                'khuyenmai' => $khuyenmai,
            ]
        );
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $khuyenmai = Khuyenmai::where('id', $id)->first();
        if ($this->request->ajax()) {
            if ($khuyenmai) {
                if ($khuyenmai->delete()) {
                    return $this->json([
                        'message' => 'Khuyến mãi ' . $khuyenmai->name . 'của ' . $khuyenmai->sanpham->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa!'
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
}
