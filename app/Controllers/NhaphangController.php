<?php

namespace App\Controllers;

use App\Models\Khuyenmai;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\SanPham;
use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\User;
use App\Models\Nhaphang;

class NhaphangController  extends BaseController
{

    public function showAddForm()
    {
        $ngay = null;

        return $this->render(
            'nhaphang/nhaphangadd',
            [
                'ngay' => $ngay
            ]

        );
    }
    public function add()
    {
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $ngay = $_POST['ngay'] ?? null;
        $slhang = $_POST['slhang'] ?? null;
        for ($i = 1; $i <= $slhang; $i++) {

            $sl = $_POST["sl$i"] ?? null;
            $sp = $_POST["sp$i"] ?? null;
            $dg = $_POST["dg$i"] ?? null;
            $sanpham = SanPham::where("name", $sp)->where('id_cuahang', $user->id_nguoidung)->first();

            if ($sl != null) {
                $nhaphang = Nhaphang::where('ngaynhap', $ngay)->where('id_sanpham', $sanpham->id)->where('gia', $dg)->first();

                if ($nhaphang == null) {
                    $nhaphang = new Nhaphang();
                    $nhaphang->soluong = $sl;
                } else  $nhaphang->soluong += $sl;
                $nhaphang->ngaynhap = $ngay;
                $nhaphang->gia = $dg;
                $nhaphang->id_cuahang = $user->id_nguoidung;
                $nhaphang->id_sanpham = $sanpham->id;

                $nhaphang->save();
                $sanpham = SanPham::where('id', $sanpham->id)->first();
                $khuyenmai = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->where('id_sanpham', $sanpham->id)->first();
                $sanpham->soluong += $sl;
                $sanpham->gia = $dg * 1.3;
                if ($khuyenmai != null) {
                    $sanpham->giasaukhuyenmai = $dg * 1.3 * ((100 - $khuyenmai->phantram) / 100);
                } else
                    $sanpham->giasaukhuyenmai = $dg * 1.3;
                $sanpham->save();
            }
            $id = $user->id_nguoidung;
        }
        return redirect("/cuahang/sanphamcuahang/$id");
    }
}
