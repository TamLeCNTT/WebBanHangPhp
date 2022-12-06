<?php

namespace App\Controllers;

use App\Models\SanPham;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\Binhluan;
use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use App\Models\Khuyenmai;
use App\Models\User;
use App\Models\Chat;
use App\Models\DanhGia;
use App\Models\Profile;

class DanhgiaController extends BaseController
{
   
    public function danhgia($id)
    {
        $hoadon=Hoadon::where('ID',$id)->first();
        $sanpham=SanPham::where('id',$hoadon->id_sanpham)->first();
        $sldanhgia=DanhGia::where('id_sanpham',$hoadon->id_sanpham)->count();
        $danhgia=DanhGia::where('id_sanpham',$hoadon->id_sanpham)->get();
        $sl[]=0;
        for($i=1;$i<=5;$i++){
            $sl[$i]=0;
            $sl[$i]=DanhGia::where('id_sanpham',$hoadon->id_sanpham)->where('sosao',$i)->count();
          
        }
        return $this->render(
            'danhgia/danhgia-show',
            [
                'hoadons'=>$hoadon,
                'sldanhgia'=>$sldanhgia,
                'danhgia'=>$danhgia,
                'sl'=>$sl,
                'sanpham'=>$sanpham
            ]
        );
    }
    public function danhgias($id)
    {
        $hoadon=Hoadon::where('ID',$id)->first();
       $sosao=$_POST["sosao"]??null;
       $binhluan=$_POST["binhluan"]??null;
       $username=auth()->username;
       $user=User::where('username',$username)->first();
       $danhgia=DanhGia::where('id_sanpham',$hoadon->id_sanpham)->where('id_nguoidung',$user->id_nguoidung)->first();
       if($danhgia==null)
        $danhgia=new DanhGia();
        $danhgia->binhluan=$binhluan;
        $danhgia->id_nguoidung=$user->id_nguoidung;
        $danhgia->id_sanpham=$hoadon->id_sanpham;
        $danhgia->sosao=$sosao;
        $danhgia->save();
        $hoadon->danhgia=1;
        $hoadon->save();
        $tbdanhgia=DanhGia::where('id_sanpham',$hoadon->id_sanpham)->avg('sosao');
        $sanpham=SanPham::where('id',$hoadon->id_sanpham)->first();
        $sanpham->sosaotb=$tbdanhgia;
        
        $sanpham->save();
        return redirect("/sanpham/sanphamdamua/4");

    }

}
