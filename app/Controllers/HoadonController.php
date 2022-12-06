<?php

namespace App\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\Khuyenmai;
use App\Models\hoadon;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\Profile;
use App\Models\User;
use DateTime;

class HoadonController  extends BaseController
{

    public function showForm()
    {

        $sanpham_mua = [];
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $profile = Profile::where('user_id', $user->id_nguoidung)->first();
        $i = 1;
        $_SESSION["kiemtra"] = 0;
        $ids = null;

        if (isset($_SESSION[$username])) {
            foreach ($_SESSION[$username] as $muahnag) {
                if (isset($muahnag['id'])) {
                    $idhang = $muahnag['id'];
                    if (isset($_POST["$idhang"])) {
                        $_SESSION[$username][$idhang]['mua'] = 1;
                        $sanpham_mua[] = SanPham::where('id', $muahnag['id'])->first();
                        $sanpham = SanPham::where('id', $muahnag['id'])->first();

                        $hoadon = new Hoadon();
                        $hoadon->id_sanpham = $sanpham->id;
                        $hoadon->soluong = $muahnag['soluong'];
                        $hoadon->id_nguoidung = $user->id_nguoidung;
                        $hoadon->tenNH = $profile->username;
                        $hoadon->diachiNH = $profile->location;
                        $hoadon->sdtNH = $profile->phone;
                        $hoadon->danhgia = 0;
                        $hoadon->ngay = date("Y/m/d");
                        $hoadon->id_trangthai = 1;
                        $hoadon->id_cuahang = $sanpham->id_cuahang;
                        $hoadon->save();
                        $sanphams = SanPham::where('id', $sanpham->id)->first();
                        $sanphams->soluong -= $hoadon->soluong;
                        $sanphams->save();
                        if ($sanphams->soluong < 0) {
                            $ids = $hoadon;
                        }
                        $_SESSION["kiemtra"] += 1;
                    } else
                        $_SESSION[$username][$idhang]['mua'] = 0;
                }
            }
        }
        if ($ids != null) {
            $id = $ids->ID;
            $name = $ids->sanpham->name;
            $soluong = $ids->sanpham->soluong + $ids->soluong;

            if ($soluong == 0) {
                session()->setFlash(\FLASH::INFO, "Sản phẩm $name đã hết hàng");
                $_SESSION[$username][$ids->id_sanpham]['soluong'] = 1;
            } else {
                session()->setFlash(\FLASH::INFO, "Sản phẩm $name chỉ còn $soluong sản phẩm");
                $_SESSION[$username][$ids->id_sanpham]['soluong'] = $soluong;
            }
            $this->donhuy($ids->ID);
        } else {
            if ($_SESSION["kiemtra"] >= 1) {
                session()->setFlash(\FLASH::SUCCESS, 'Thanh toán thành công, quý khách kiểm tra hóa đơn trước khi thoát!');
                return $this->render('hoadon/hoadon-show', ['profile' => $profile, 'sanpham_mua' => $sanpham_mua, 'user' => $user, 'hoadon' => $hoadon]);
            } else {

                session()->setFlash(\FLASH::INFO, 'Chưa có sản phẩm được chọn');
                redirect('/sanpham/giohang');
            }
        }
    }
    public function showList()
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền!');
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
        if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Admin') {
            $hoadon = hoadon::paginate($this->getPerPage());
            $total = hoadon::count();
            $paginator = new Paginator($this->request, $hoadon, $total, 15);
            $paginator->onEachSide(2);
            if ($this->request->ajax()) {
                $html = $this->view->render(
                    'hoadon/hoadon-list',
                    [
                        'hoadon' => $hoadon,
                        'paginator' => $paginator,
                    ]
                );
                return $this->json(['data' => $html]);
            }
            return $this->render(
                'hoadon/hoadon',
                [
                    'hoadon' => $hoadon,
                    'paginator' => $paginator,
                ]
            );
        }
    }

    public function delete()
    {
        $id = $this->request->post('id');
        $hoadon = hoadon::where('ID', $id)->first();
        if ($this->request->ajax()) {
            if ($hoadon) {
                if ($hoadon->delete()) {
                    return $this->json([
                        'message' => $hoadon->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa hóa đơn!'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'ID hóa đơn không tồn tại!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }
    public function donhuy($ID)


    {
        $hoadon = Hoadon::where('ID', $ID)->first();
        $hoadons = Hoadon::where('created_at', $hoadon->created_at)->get();
        foreach ($hoadons as $hoadons) {
            $sanpham = SanPham::where('id', $hoadons->id_sanpham)->first();
            $sanpham->soluong += $hoadons->soluong;
            $sanpham->save();
            $hoadons->delete();
        }

        return redirect('/sanpham/giohang');
    }
    public function showOk()
    {

        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $profile = Profile::where('user_id', $user->id_nguoidung)->first();
        if (isset($_SESSION[$username])) {
            foreach ($_SESSION[$username] as $muahnag) {
                if (isset($muahnag['id'])) {
                    $idhang = $muahnag['id'];
                    if ($_SESSION[$username][$idhang]['mua'] == 1) {
                        unset($_SESSION[$username][$idhang]);
                    }
                }
            }
        }

        $id = $_POST['id'] ?? null;
        $diachi = $_POST['diachi'] ?? null;
        $sdt = $_POST['sdt'] ?? null;
        $user = $_POST['username'] ?? null;
        $hoadons = Hoadon::where("ID", $id)->first();
        $hoadon = Hoadon::where('created_at', $hoadons->created_at)->get();
        foreach ($hoadon as $hoadon) :
            $hoadon->sdtNH = $sdt;
            $hoadon->tenNH = $user;
            $hoadon->diachiNH = $diachi;
            $hoadon->save();
        endforeach;
        $profile->location = $diachi;
        $profile->phone = $sdt;
        $profile->save();
        $hoadon = Hoadon::all();
        $_SESSION[$username]["sodon"] -= $_SESSION["kiemtra"];
        if ($_SESSION[$username]["sodon"] == 0)
            $_SESSION[$username]["sodon"] = null;
        session()->setFlash(\FLASH::INFO, 'Cảm ơn bạn đã ủng hộ cửa hàng của chúng tôi!');
        $sanpham = SanPham::take(8)->get();
        $loaisanpham = LoaiSanPham::all();
        $khuyenmais = Khuyenmai::all();
        $sanphamall = SanPham::all();
        $khuyenmai = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->get();
        return redirect('/home');
    }
}
