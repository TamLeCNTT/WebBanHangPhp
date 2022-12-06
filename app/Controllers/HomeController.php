<?php

namespace App\Controllers;

use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Khuyenmai;
use App\Models\User;
use App\Models\Nhaphang;

use function PHPSTORM_META\type;

class HomeController  extends BaseController
{

    public function index()
    {
             
        $_SESSION["trangtruoc"]= "home";
       
        // $nhaphang=Nhaphang::where('id_cuahang',51)->first();
        // echo (int)substr($nhaphang->ngaynhap,5,2);
        $sanpham = SanPham::take(8)->get();
        $sanphamall=SanPham::all();
       
        $loaisanpham = LoaiSanPham::all();
        $khuyenmais = Khuyenmai::all();
        $danhmuc = [];
        $khuyenmai=Khuyenmai::where('NgayBD','<=',date("Y-m-d"))->where('NgayKT','>=',date("Y-m-d"))->get();
      
        $danhmucsanpham = LoaiSanPham::all();
        $hoadon = Hoadon::all();
        foreach ($danhmucsanpham as $danhmucsanphams) {
            $danhmuc[$danhmucsanphams->id] = $danhmucsanphams->name;
        }
        $_SESSION["B1910139"] = $danhmuc;

        return $this->render(
            'home/index',
            [
                'sanpham' => $sanpham,
                'sanphamall' => $sanphamall,
                'loaisanpham' => $loaisanpham,
                'khuyenmais' => $khuyenmais,
                'hoadon' => $hoadon,
                'khuyenmai'=>$khuyenmai
            ]
        );
       
    }

    public function giohang()
    {
        
        
        if (auth() == null) {
            session()->setFlash(\FLASH::INFO, 'Vui lòng đăng nhập khi sự dụng');
            return $this->render('auth/login');
        }
        $user = auth()->username;
        if (!isset( $_SESSION[$user]["sodon"]))
        $_SESSION[$user]["sodon"]=0;
        $id = $_POST['id'] ?? null;
        $soluong = $_POST['soluong'] ?? null;
       

        if (!isset($_SESSION[$user][$id])) {
            $_SESSION[$user][$id] = array(
                'soluong' => $soluong,
                'id' => $id
            );
            $_SESSION[$user]["sodon"]+=1;
        } else {
            $_SESSION[$user][$id]['soluong'] += $soluong;
        }

       

        $hoadon = Hoadon::all();
        session()->setFlash(\FLASH::SUCCESS, 'Thêm sản phẩm thành công!');
        $sanpham = SanPham::take(8)->get();
        $loaisanpham = LoaiSanPham::all();
        $khuyenmai = Khuyenmai::all();
        echo $_SESSION["trangtruoc"];

        $url=$_SESSION["trangtruoc"];
       return redirect("/$url");
    }
    public function giohangget()
    {
        $hoadon = Hoadon::all();
        $sanpham = SanPham::take(8)->get();
        $loaisanpham = LoaiSanPham::all();
        $khuyenmai = Khuyenmai::all();
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


    public function sanphamdaxem()
    {
        $_SESSION["trangtruoc"]="home/sanphamdaxem";
        
        $sanpham_xem = [];
        $flag = 0;
        if (isset($_SESSION["B1909982"])) {
            foreach ($_SESSION["B1909982"] as $sanpham) {
                $sanpham_xem[] = SanPham::where('id', $sanpham['id'])->first();
            }
        }
        if ($sanpham_xem == null)
            $flag = 1;
        return $this->render('home/sanphamdaxem', [
            'sanpham' => $sanpham_xem,
            'flag' => $flag

        ]);
    }
}
