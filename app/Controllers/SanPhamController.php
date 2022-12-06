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
use App\Models\Nhaphang;
use App\Models\Profile;
use App\Models\User;

class SanPhamController extends BaseController
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
        $loaisanpham = LoaiSanPham::all();
        $nsx = NhaSanXuat::all();
        return $this->render('sanpham/sanpham-add', [
            'loaisanpham' => $loaisanpham,
            'nsx' => $nsx
        ]);
    }
    public function add()
    {


        $id_nsx = $_POST['id_nsx'] ?? null;
        $name = $_POST['sanpham_name'] ?? null;
        $gia = $_POST['gia'] ?? null;
        $soluong = $_POST['soluong'] ?? null;
        $mota = $_POST['mota'] ?? null;
        $baoquan = $_POST['baoquan'] ?? null;
        if (($_FILES['image']['name'] != null)) {
            $uploaddir = 'assets/images/sanpham/';
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
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        if ($name != null) {
            $sanpham = new SanPham();
            $sanpham->id_loai = $user->id_loaihang;
            $sanpham->id_nsx = $id_nsx;
            $sanpham->name = $name;
            $sanpham->baoquan = $baoquan;
            $sanpham->image = $_FILES['image']['name'];
            $sanpham->gia = $gia * 1.3;
            $sanpham->id_cuahang = $user->id_nguoidung;
            $sanpham->mota = $mota;
            $sanpham->soluong = $soluong;
            $sanpham->save();
            $date = date("Y-m-d");
            $nhaphang = new Nhaphang();
            $nhaphang->id_sanpham = $sanpham->id;
            $nhaphang->id_cuahang = $user->id_nguoidung;
            $nhaphang->gia = $gia;
            $nhaphang->soluong = $soluong;
            $nhaphang->ngaynhap = $date;
            $nhaphang->save();
            session()->setFlash(\FLASH::SUCCESS, 'Sản phẩm đã được thêm thành công!');
        } else {
            session()->setFlash(\FLASH::ERROR, 'Tên sản phẩm không được để trống!');
        }
        return redirect("/cuahang/sanphamcuahang/$user->id_nguoidung");
    }

    public function showList()
    {

        $khuyenmai = Khuyenmai::all();
        $hoadon = Hoadon::all();
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
            session()->setFlash(\FLASH::ERROR, 'Bạn không đủ quyền truy cập!');
            $sanpham = SanPham::take(8)->get();
            $loaisanpham = LoaiSanPham::take(6)->get();

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
        $binhluan = Binhluan::all();
        $sanpham = SanPham::paginate($this->getPerPage());
        $total = SanPham::count();
        $paginator = new Paginator($this->request, $sanpham, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'sanpham/sanpham-list',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                    'khuyenmai' => $khuyenmai,
                    'hoadon' => $hoadon,
                    'binhluan' => $binhluan
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'sanpham/sanpham',
            [
                'sanpham' => $sanpham,
                'paginator' => $paginator,
                'khuyenmai' => $khuyenmai,
                'hoadon' => $hoadon,
                'binhluan' => $binhluan
            ]
        );
    }
    public function showEditForm($id)
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] == 'Customer') {
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
        $sanpham = SanPham::where('id', $id)->first();
        $loaisanpham = LoaiSanPham::all();
        $nsx = NhaSanXuat::all();
        return $this->render(
            'sanpham/sanpham-edit',
            [
                'sanpham' => $sanpham,
                'loaisanpham' => $loaisanpham,
                'nsx' => $nsx
            ]
        );
    }

    public function edit()
    {
        $id = $this->request->post('id');

        $id_nsx = $_POST['id_nsx'] ?? null;
        $name = $_POST['sanpham_name'] ?? null;
        $mota = $_POST['mota'] ?? null;
        $gia = $_POST['gia'] ?? null;
        $baoquan = $_POST['baoquan'] ?? null;
        $soluong = $_POST['soluong'] ?? null;
        $loaisanpham = LoaiSanPham::all();
        $nhasanxuat = NhaSanXuat::all();
        $sanpham = SanPham::where('id', $id)->first();
        $ok = 1;
        if (($_FILES['image']['name'] != null)) {
            $uploaddir = 'assets/images/sanpham/';
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
            $sanpham->image = $_FILES['image']['name'];
        }
        if ($sanpham->name) {
            if ($name != null) {
                $sanpham->id =  $id;

                $sanpham->id_nsx = $id_nsx;
                $sanpham->name = $name;
                $sanpham->gia = $gia;
                $sanpham->baoquan = $baoquan;
                $sanpham->mota = $mota;
                $sanpham->soluong = $soluong;
                $sanpham->save();
                session()->setFlash(\FLASH::SUCCESS, 'Cập nhật sản phẩm thành công!');
            } else {
                session()->setFlash(\FLASH::ERROR, 'Tên sản phẩm đã tồn tại!');
                $ok = 0;
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id sản phẩm!');
            $ok = 0;
        }

        if ($ok != 0) {
            redirect("/cuahang/sanphamcuahang/$sanpham->id_cuahang");
        }
        return $this->render(
            'sanpham/sanpham-edit',
            [
                'sanpham' => $sanpham,
                'loaisanpham' => $loaisanpham,
                'nhasanxuat' => $nhasanxuat
            ]
        );
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $sanpham = SanPham::where('id', $id)->first();
        if ($this->request->ajax()) {
            if ($sanpham) {
                if ($sanpham->delete()) {
                    return $this->json([
                        'message' => $sanpham->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa'
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

    public function search()
    {
        $_SESSION["trangtruoc"] = "sanpham/search";


        $keyword = $this->request->post('searchKeyWord');

        if ($keyword != null)
            $_SESSION['keyword'] = $keyword;
        else
            $keyword = $_SESSION['keyword'] ?? null;
        $sanpham = SanPham::where('name', 'like', '%' . $keyword . '%')->paginate($this->getPerPage());
        $total = SanPham::where('name', 'like', '%' . $keyword . '%')->count();
        //nếu không tìm thấy thì in thông báo
        $flag = 0;
        $sanphams = $sanpham->first();
        if ($sanphams == null) {
            $flag = 1;
        }
        //end
        $paginator = new Paginator($this->request, $sanpham, $total, 25);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'sanpham/sanpham-search',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                    'keyword' => $keyword,
                    'flag' => $flag,
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'sanpham/sanphamsearch',
            [
                'sanpham' => $sanpham,
                'paginator' => $paginator,
                'keyword' => $keyword,
                'flag' => $flag,
            ]
        );
    }
    public function giohang()
    {
        $khuyenmai = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->get();
        $hoadon = Hoadon::all();
        if (auth() == null) {
            session()->setFlash(\FLASH::INFO, 'Vui lòng đăng nhập khi sự dụng');
            return $this->render('auth/login');
        }
        $sanpham_mua = [];
        $user = auth()->username;
        if (!isset($_SESSION[$user])) {
            session()->setFlash(\FLASH::INFO, 'Bạn chưa có đơn hàng nào !');
            $sanpham = SanPham::paginate($this->getPerPage());

            $total = SanPham::count();
            $paginator = new Paginator($this->request, $sanpham, $total, 15);
            $paginator->onEachSide(2);
            if ($this->request->ajax()) {
                $html = $this->view->render(
                    'sanpham/sanpham-listshow',
                    [
                        'sanpham' => $sanpham,
                        'paginator' => $paginator,
                        'khuyenmai' => $khuyenmai,
                        'hoadon' => $hoadon
                    ]
                );
                return $this->json(['data' => $html]);
            }
            return $this->render(
                'sanpham/sanphamm',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                    'khuyenmai' => $khuyenmai,
                    'hoadon' => $hoadon
                ]
            );
        } else {
            foreach ($_SESSION[$user] as $muahnag) {
                if (isset($muahnag['id']))
                    $sanpham_mua[] = SanPham::where('id', $muahnag['id'])->first();
            }
            if ($sanpham_mua == null) {
                session()->setFlash(\FLASH::INFO, 'Bạn chưa có đơn hàng nào !');
                $sanpham = SanPham::paginate($this->getPerPage());
                $total = SanPham::count();
                $paginator = new Paginator($this->request, $sanpham, $total, 15);
                $paginator->onEachSide(2);
                if ($this->request->ajax()) {
                    $html = $this->view->render(
                        'sanpham/sanpham-listshow',
                        [
                            'sanpham' => $sanpham,
                            'paginator' => $paginator,
                            'khuyenmai' => $khuyenmai,
                            'hoadon' => $hoadon
                        ]
                    );
                    return $this->json(['data' => $html]);
                }
                return $this->render(
                    'sanpham/sanphamm',
                    [
                        'sanpham' => $sanpham,
                        'paginator' => $paginator,
                        'khuyenmai' => $khuyenmai,
                        'hoadon' => $hoadon
                    ]
                );
            }

            return $this->render('cart/cart', [
                'sanpham_mua' => $sanpham_mua,
                'user' => $user
            ]);
        }
    }

    // xóa trong giỏ hàng
    public function giohangg($id)
    {

        if (auth() == null) {
            session()->setFlash(\FLASH::INFO, 'Vui lòng đăng nhập khi sự dụng');
            return $this->render('auth/login');
        }
        $sanpham_mua = [];
        $user = auth()->username;
        if (isset($_SESSION[$user])) {
            foreach ($_SESSION[$user] as $muahnag) {
                if (isset($muahnag['id'])) {
                    if ($id != $muahnag['id']) {
                        $sanpham_mua[] = SanPham::where('id', $muahnag['id'])->first();
                    } else {
                        unset($_SESSION[$user][$id]);
                        $_SESSION[$user]["sodon"] -= 1;
                        if ($_SESSION[$user]["sodon"] <= 0)
                            $_SESSION[$user]["sodon"] = null;
                    }
                }
            }
            return $this->render('cart/cart', [
                'sanpham_mua' => $sanpham_mua,
                'user' => $user
            ]);
        }
    }

    public function drawloaisanpham($loaisanphams)
    {
        $output = "";
        foreach ($loaisanphams as $loaisanpham) {
            $output .=
                '<div class="col-lg-2 col-md-6 col-sm-12 new-item">
                <div class="cardss">
                    <div class="overlayy d-none">
                        <small class="fa fa-close"></small>
                 
                    </div>
                    <div class="top-divv">
                    </div>
                    <div class="imagee">
                    <span><a href="/loaisanpham/loaisanphamlist/' . $loaisanpham->id . '"> <img style="width:200px;height:105px ;" src="/assets/images/loaisanpham/' . $loaisanpham->image . '" ></a></span>
                    </div> 
                    <div class="aboutt">
                        <div class="card" style="width: 17rem;">
                            <ul class="list-groupp">
                            <li class="list-group-item">' . $loaisanpham->name . '</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>';
        }
        return $output;
    }


    public function loadpage()
    {
        $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 2;
        $limit = 6;
        $start = ($current_page - 1) * $limit;
        $loaisanphams = LoaiSanPham::skip($start)->take($limit)->get();
        $output = "";
        $output = $this->drawloaisanpham($loaisanphams);
        echo $output;
    }


    public function drawsanpham($sanphams)
    {
        $output = "";
        foreach ($sanphams as $sanpham) {
            $output .=
                '<div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">
                <div class="cards">
                    <div class="overlay d-none">
                        <small class="fa fa-close"></small>
                        <a href="/sanpham/chitietsanpham/' . $sanpham->id . '"> <img src="/assets/images/sanpham/' . $sanpham->image . '" class="img-fluid"></a>
                    </div>
                    <div class="top-div">
                        <i><a href="http://facebook.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-original"></a></i>
                        <i><a href="http://gmail.com" target="_blank" rel="noopener noreferrer" class="lni lni-facebook-messenger"></a></i>
                    </div>
                    <div class="image">
                        <span>  <a href="/sanpham/chitietsanpham/' . $sanpham->id . '"> <img src="/assets/images/sanpham/' . $sanpham->image . '" class="img-fluid"></a></span>
                        <h3>' . $sanpham->name . '</h3>
                    </div>
                    <div class="arc">
                        <span></span>
                    </div>
                    <div class="about">
                        <div class="card" style="width: 17rem;">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Thông tin sản phẩm</b></li>
                                <li class="list-group-item">' . $sanpham->name . '</li>
                                <li class="list-group-item">' . $sanpham->noisanxuat->name . '</li>
                                <li class="list-group-item">' . number_format($sanpham->gia, 0, ",", ".") . ' VNĐ</li>
                                <li class="list-group-item">

                                    <form action="/home/giohang" method="POST">
                                        <button type="submit">
                                            <i class="lni lni-shopping-basket"></i> Mua
                                        </button>
                                        <input type="number" name="soluong" id="soluong" min="1" max="50" value="1">
                                        <input type="hidden" name="id" value="' . $sanpham->id . '">
                                     </form>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>';
        }
        return $output;
    }
    public function loadpage_sanpham()
    {
        $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 4;
        $limit = 4;
        $start = ($current_page - 1) * $limit;
        $sanphams = SanPham::skip($start)->take($limit)->get();
        $output = "";
        $output = $this->drawsanpham($sanphams);
        echo $output;
    }
    public function showDetail($id_sanpham)
    {

        $_SESSION["trangtruoc"] = "sanpham/chitietsanpham/$id_sanpham";

        $binhluan = Binhluan::ALL();
        if (auth() != null) {
            $user = auth()->username;
            $_SESSION[$user]["binhluan"] = $id_sanpham;
        }
        if (!isset($_SESSION['B1909982'][$id_sanpham])) {
            $_SESSION['B1909982'][$id_sanpham] = array(
                'id' => $id_sanpham
            );
        }
        $khuyenmai = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->get();
        $hoadon = Hoadon::all();
        $sanpham = SanPham::where('id', $id_sanpham)->first();
        $sanphams = SanPham::where('id_loai', $sanpham->id_loai)->get();

        return $this->render(
            'sanpham/sanpham-chitiet',
            [
                'sanpham' => $sanpham,
                'binhluan' => $binhluan,
                'hoadon' => $hoadon,
                'sanphams' => $sanphams,
                'khuyenmai' => $khuyenmai

            ]
        );
    }

    public function chitietdonhang($id_hoadon)
    {



        $hoadon = Hoadon::where('ID', $id_hoadon)->first();

        $hoadons = Hoadon::all();
        $profile = Profile::where('user_id', $hoadon->id_nguoidung)->first();
        return $this->render(
            'sanpham/sanpham-chitietdonhang',
            [
                'hoadons' => $hoadons,
                'hoadon' => $hoadon,
                'profile' => $profile

            ]
        );
    }


    public function sanphamdamua($id_trangthai)
    {
        $username = auth()->username;
        $user = User::where('username', $username)->first();

        $hoadon = Hoadon::orderBy('created_at', 'DESC')->orderBy('id_cuahang', 'DESC')->where([['id_nguoidung', $user->id_nguoidung], ['id_trangthai', '>=', $id_trangthai]])->paginate($this->getPerPage());


        $total = Hoadon::where([['id_nguoidung', $user->id_nguoidung], ['id_trangthai', $id_trangthai]])->count();



        $soluong[] = null;
        $soluong[1] = Hoadon::where([['id_nguoidung', $user->id_nguoidung], ['id_trangthai', 1]])->count();
        $soluong[2] = Hoadon::where([['id_nguoidung', $user->id_nguoidung], ['id_trangthai', 2]])->count();
        $soluong[3] = Hoadon::where([['id_nguoidung', $user->id_nguoidung], ['id_trangthai', 3]])->count();
        $soluong[4] = Hoadon::where([['id_nguoidung', $user->id_nguoidung], ['id_trangthai', 4]])->count();
        if ($soluong[1] == 0) $soluong[1] = null;
        if ($soluong[2] == 0) $soluong[2] = null;
        if ($soluong[3] == 0) $soluong[3] = null;
        if ($soluong[4] == 0) $soluong[4] = null;

        $paginator = new Paginator($this->request, $hoadon, $total);
        $paginator->onEachSide(2);

        if ($hoadon == null) {
            session()->setFlash(\FLASH::INFO, 'Bạn chưa có đơn hàng nào !');
            $sanpham = SanPham::paginate($this->getPerPage());
            $total = SanPham::count();
            $paginator = new Paginator($this->request, $sanpham, $total);
            $paginator->onEachSide(2);
            if ($this->request->ajax()) {
                $html = $this->view->render(
                    'sanpham/sanpham-listshow',
                    [
                        'sanpham' => $sanpham,
                        'paginator' => $paginator,
                        "id_trangthai" => $id_trangthai
                    ]
                );
                return $this->json(['data' => $html]);
            }
            return $this->render(
                'sanpham/sanphamm',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                    "id_trangthai" => $id_trangthai
                ]
            );
        }
        return $this->render('sanpham/sanpham-damua', [

            'hoadon' => $hoadon,
            'paginator' => $paginator,
            "id_trangthai" => $id_trangthai,
            'soluong' => $soluong
        ]);
    }


    public function deletekhongchoxoa()
    {
        session()->setFlash(\FLASH::INFO, 'Sản phẩm không được xóa do khóa ngoại có dữ liệu !');
        $this->showList();
    }
    public function chapnhandonhang($id_hoadon)
    {

        $username = auth()->username;

        $hoadonss = Hoadon::where('ID', $id_hoadon)->first();
        $hoadons = Hoadon::all();
        foreach ($hoadons as $hoadons) :
            if (
                $hoadons->id_nguoidung == $hoadonss->id_nguoidung && $hoadons->id_cuahang == $hoadonss->id_cuahang
                && $hoadons->created_at == $hoadonss->created_at
            ) :

                $hoadons->id_trangthai += 1;
                $hoadons->save();
            endif;
        endforeach;

        redirect('/sanpham/sanphamdamua/3');
    }

    public function doisoluong($id_sanpham, $soluong)
    {

        $username = auth()->username;
        $sanpham = SanPham::where('id', $id_sanpham)->first();
        if ($sanpham->soluong >= $soluong)
            $_SESSION[$username][$id_sanpham]['soluong'] = $soluong;
        else
            session()->setFlash(\FLASH::INFO, "$sanpham->name chỉ còn $sanpham->soluong sản phẩm");


        redirect('/sanpham/giohang');
    }
}
