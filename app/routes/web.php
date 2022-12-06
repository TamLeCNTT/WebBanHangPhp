<?php

use App\Router;

// Router::get('/hello', function () {
//     echo 'Hello world!';
// });
//user
Router::get('/user', 'App\Controllers\UserController@showForm');
Router::get('/user/khoa/(\d+)', 'App\Controllers\UserController@khoa');
Router::post('/user/delete', 'App\Controllers\UserController@delete');
Router::get('/user/delete', 'App\Controllers\UserController@deletekhongchoxoa');
Router::get('/user/khoiphuc/(\d+)', 'App\Controllers\UserController@khoiphuc');
Router::get('/user/edit/(\d+)', 'App\Controllers\UserController@showEditForm');
Router::post('/user/edit', 'App\Controllers\UserController@edit');

//profile
Router::get('/profile', 'App\Controllers\ProfileController@showForm');
Router::post('/profile', 'App\Controllers\ProfileController@edit');
//change password
Router::get('/change-password', 'App\Controllers\Auth\ChangePasswordController@changePasswordForm');
Router::post('/change-password', 'App\Controllers\Auth\ChangePasswordController@changePassword');

//home
Router::post('/home', 'App\Controllers\HomeController@index');
Router::get('/', 'App\Controllers\HomeController@index');
Router::get('/home', 'App\Controllers\HomeController@index');
Router::post('/home/giohang', 'App\Controllers\HomeController@giohang');
Router::get('/home/giohang', 'App\Controllers\HomeController@giohangget');
Router::get('/home/sanphamdaxem', 'App\Controllers\HomeController@sanphamdaxem');


// user authentication
Router::get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
Router::post('/login', '\App\Controllers\Auth\LoginController@login');

Router::get('/logout', '\App\Controllers\Auth\LoginController@logout');
Router::post('/logout', '\App\Controllers\Auth\LoginController@logout');

// register user
Router::get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
Router::post('/register', '\App\Controllers\Auth\RegisterController@register');
//error
Router::error("\App\Controllers\ErrorController@notFoundError");
Router::post('/nhaphang/add', 'App\Controllers\NhaphangController@add');

Router::get('/nhaphang/add', 'App\Controllers\NhaphangController@showAddForm');

//tra hang
Router::get('/trahang/(\d+)', 'App\Controllers\TrahangController@showAddForm');
Router::get('/trahang/xacnhan/(\d+)', 'App\Controllers\TrahangController@xacnhan');
Router::post('/trahang/(\d+)', 'App\Controllers\TrahangController@add');
//tintuc

Router::get('/tintuc/add', 'App\Controllers\TintucController@showAddForm');
Router::post('/tintuc/add', 'App\Controllers\TintucController@add');
Router::get('/tintuc', 'App\Controllers\TintucController@showtintuc');
Router::get('/tintuc/list', 'App\Controllers\TintucController@showList');
Router::get('/tintuc/edit/(\d+)', 'App\Controllers\TintucController@showEditForm');
Router::post('/tintuc/edit', 'App\Controllers\TintucController@edit');
Router::post('/tintuc/delete', 'App\Controllers\TintucController@delete');
//Đánh giá
Router::post('/danhgia/(\d+)', 'App\Controllers\DanhgiaController@danhgias');
Router::get('/danhgia/(\d+)', 'App\Controllers\DanhgiaController@danhgia');
// LoaiSanPham
Router::get('/loaisanpham/add', 'App\Controllers\LoaiSanPhamController@showAddForm');
Router::post('/loaisanpham/add', 'App\Controllers\LoaiSanPhamController@add');
Router::get('/loaisanpham', 'App\Controllers\LoaiSanPhamController@showList');
Router::post('/loaisanpham', 'App\Controllers\LoaiSanPhamController@showList');
Router::get('/loaisanpham/edit/(\d+)', 'App\Controllers\LoaiSanPhamController@showEditForm');
Router::post('/loaisanpham/edit', 'App\Controllers\LoaiSanPhamController@edit');
Router::post('/loaisanpham/delete', 'App\Controllers\LoaiSanPhamController@delete');
Router::get('/loaisanpham/delete', 'App\Controllers\LoaiSanPhamController@deletekhongchoxoa');
Router::get('/loaisanpham/loaisanphamlist/(\d+)', 'App\Controllers\LoaiSanPhamController@showsanpham');
Router::post('/loaisanpham/loaisanphamlist/(\d+)', 'App\Controllers\LoaiSanPhamController@showsanpham');
// SanPham

Router::post('/sanpham/add', 'App\Controllers\SanPhamController@add');
Router::get('/sanpham', 'App\Controllers\SanPhamController@showList');
Router::get('/sanpham/edit/(\d+)', 'App\Controllers\SanPhamController@showEditForm');
Router::post('/sanpham/edit', 'App\Controllers\SanPhamController@edit');
Router::post('/sanpham/delete', 'App\Controllers\SanPhamController@delete');
Router::get('/sanpham/delete', 'App\Controllers\SanPhamController@deletekhongchoxoa');
Router::get('/sanpham/search', 'App\Controllers\SanPhamController@search');
Router::post('/sanpham/search', 'App\Controllers\SanPhamController@search');
Router::get('/sanpham/chitietsanpham/(\d+)', 'App\Controllers\SanPhamController@showDetail');
Router::post('/sanpham/chitietsanpham/(\d+)', 'App\Controllers\SanPhamController@showDetail');
Router::get('/sanpham/sanphamdamua/(\d+)', 'App\Controllers\SanPhamController@sanphamdamua');
Router::post('/sanpham/sanphamdamua/(\d+)', 'App\Controllers\SanPhamController@sanphamdamua');
Router::post('/sanpham/chitietdonhang/(\d+)', 'App\Controllers\SanPhamController@chitietdonhang');
Router::get('/sanpham/chitietdonhang/(\d+)', 'App\Controllers\SanPhamController@chitietdonhang');
Router::get('/sanpham/chapnhandonhang/(\d+)', 'App\Controllers\SanPhamController@chapnhandonhang');
Router::get('/sanpham/sanphamcuacuahang/(\d+)', 'App\Controllers\SanPhamController@sanphamcuacuahang');

//Chat
Router::get('/chat/(\d+)', 'App\Controllers\ChatController@chatshow');
Router::get('/chats/(\d+)', 'App\Controllers\ChatController@chat');
Router::post('/chat/(\d+)', 'App\Controllers\ChatController@chat');
//GIO HANG SANPHAM
Router::get('/sanpham/giohang', 'App\Controllers\SanPhamController@giohang');
Router::get('/sanpham/giohangg/(\d+)', 'App\Controllers\SanPhamController@giohangg');
//Load trang
Router::get('/ajax', 'App\Controllers\SanPhamController@loadpage');
Router::get('/ajax_sanpham', 'App\Controllers\SanPhamController@loadpage_sanpham');
Router::post('/card/doisoluong/(\d+)', 'App\Controllers\SanPhamController@doisoluong');
Router::get('/card/doisoluong/(\d+)//(\d+)', 'App\Controllers\SanPhamController@doisoluong');
//cuahang
Router::get('/cuahang/donhang/(\d+)', 'App\Controllers\CuahangController@donhang');
Router::post('/cuahang/chitietdonhang/(\d+)', 'App\Controllers\CuahangController@chitietdonhang');
Router::get('/cuahang/chitietdonhang/(\d+)', 'App\Controllers\CuahangController@chitietdonhang');
Router::post('/cuahang/chapnhandonhang/(\d+)', 'App\Controllers\CuahangController@chapnhandonhang');
Router::get('/cuahang/chapnhandonhang/(\d+)', 'App\Controllers\CuahangController@chapnhandonhang');
Router::get('/cuahang/sanphamcuahang/(\d+)', 'App\Controllers\CuahangController@sanphamcuahangs');
Router::get('/cuahang/sanphamcuahang', 'App\Controllers\CuahangController@sanphamcuahang');
Router::get('/cuahang', 'App\Controllers\CuahangController@cuahang');
Router::get('/cuahang/chat/(\d+)', 'App\Controllers\CuahangController@showchat');
Router::post('/cuahang/chat/(\d+)', 'App\Controllers\CuahangController@chat');
Router::get('/cuahang/chart/(\d+)', 'App\Controllers\CuahangController@chart');
//showSanPham
Router::get('/sanphamshow', 'App\Controllers\SanPhamshowController@showList');
Router::post('/sanphamshow/giohang', 'App\Controllers\SanPhamshowController@giohang');
Router::get('/sanphamshow/giohang', 'App\Controllers\SanPhamshowController@sanphamshow');

//khuyen mai
Router::get('/khuyenmai/add', 'App\Controllers\KhuyenmaiController@showAddForm');
Router::post('/khuyenmai/add', 'App\Controllers\KhuyenmaiController@add');
Router::get('/khuyenmai', 'App\Controllers\KhuyenmaiController@showList');
Router::post('/khuyenmai/delete', 'App\Controllers\KhuyenmaiController@delete');
Router::get('/khuyenmai/edit/(\d+)', 'App\Controllers\KhuyenmaiController@showEditForm');
Router::post('/khuyenmai/edit', 'App\Controllers\KhuyenmaiController@edit');


//nhasanxuat
Router::get('/nhasanxuat/add', 'App\Controllers\NhaSanXuatController@showAddForm');
Router::post('/nhasanxuat/add', 'App\Controllers\NhaSanXuatController@add');
Router::get('/nhasanxuat', 'App\Controllers\NhaSanXuatController@nhasanxuat_list');
Router::post('/nhasanxuat/delete', 'App\Controllers\NhaSanXuatController@delete');
Router::get('/nhasanxuat/edit/(\d+)', 'App\Controllers\NhaSanXuatController@showFormedit');
Router::post('/nhasanxuat/edit', 'App\Controllers\NhaSanXuatController@edit');
Router::get('/nhasanxuat/deletekhongchoxoa', 'App\Controllers\NhaSanXuatController@deletekhongchoxoa');
//binhluan
Router::get('/binhluan/add', 'App\Controllers\BinhluanController@showAddForm');
Router::post('/binhluan/add', 'App\Controllers\BinhluanController@add');
Router::get('/binhluan', 'App\Controllers\BinhluanController@binhluan_list');
Router::post('/binhluan/delete', 'App\Controllers\BinhluanController@delete');
Router::get('/binhluan/edit/(\d+)', 'App\Controllers\BinhluanController@showFormedit');
Router::post('/binhluan/edit', 'App\Controllers\BinhluanController@edit');
Router::post('/binhluan', 'App\Controllers\BinhluanController@add');

////hoadon
Router::post('/hoadon', 'App\Controllers\HoadonController@showForm');
Router::get('/hoadon', 'App\Controllers\HoadonController@showList');
Router::post('/hoadonxong', 'App\Controllers\HoadonController@showOk');
Router::get('/hoadonxong', 'App\Controllers\HomeController@index');
Router::post('/hoadon/delete', 'App\Controllers\HoadonController@delete');
Router::get('/hoadon/donhuy/(\d+)', 'App\Controllers\HoadonController@donhuy');
//banhang
Router::get('/DKbanhang', 'App\Controllers\UserController@DKbanhangform');

Router::post('/DKbanhang', 'App\Controllers\UserController@DKbanhang');

Router::error(function () {
    echo '404 :: Page Not Found';
});
