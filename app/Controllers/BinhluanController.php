<?php

namespace App\Controllers;

use App\Models\SanPham;
use App\Models\Binhluan;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\Khuyenmai;
use App\Models\User;

class binhluanController  extends BaseController
{
    public function add()
    {
        if (auth() == null) {
            session()->setFlash(\FLASH::INFO, 'Vui lòng đăng nhập để bình luận');
            redirect("/login");
        } else {
            $name = $_POST['binhluan'] ?? null;
            $user = auth()->username;
            $users = User::where('username', $user)->first();
            $id_sanpham =  $_SESSION[$user]["binhluan"];
            if ($name != null) {
                $binhluan = new binhluan();
                $binhluan->noidungbinhluan = $name;
                $binhluan->id_nguoidung = $users->id_nguoidung;
                $binhluan->id_sanpham = $id_sanpham;
                $binhluan->save();
                session()->setFlash(\FLASH::SUCCESS, 'Cảm ơn bạn đã góp ý!');
            } else {
                session()->setFlash(\FLASH::ERROR, 'Nhập bình luận bạn nhé!');
                //$errors = "binhluan name can not null!";
            }

            $sanpham = SanPham::where('id', $id_sanpham)->first();
            $binhluans = Binhluan::all();
            $khuyenmai=Khuyenmai::where('NgayBD','<=',date("Y-m-d"))->where('NgayKT','>=',date("Y-m-d"))->get();
            $sanphams=SanPham::where('id_loai',$sanpham->id_loai)->get();
            return $this->render(
                'sanpham/sanpham-chitiet',
                [
                    'sanpham' => $sanpham,
                    'binhluan' => $binhluans,
                    'sanphams'=>$sanphams,
                    'khuyenmai'=>$khuyenmai
                ]
            );
        }
    }
}
