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
use App\Models\Profile;

class CuahangController extends BaseController
{
    public function showAddForm()
    {
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
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
        $id_loai = $_POST['id_loai'] ?? null;
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
            $sanpham = SanPham::wherename($name)->first();
            if (!$sanpham) {
                $sanpham = new SanPham();
                $sanpham->id_loai = $id_loai;
                $sanpham->id_nsx = $id_nsx;
                $sanpham->name = $name;
                $sanpham->baoquan = $baoquan;
                $sanpham->image = $_FILES['image']['name'];
                $sanpham->gia = $gia;
                $sanpham->id_cuahang = $user->id_nguoidung;
                $sanpham->mota = $mota;
                $sanpham->soluong = $soluong;
                $sanpham->save();
                session()->setFlash(\FLASH::SUCCESS, 'Sản phẩm đã được thêm thành công!');
            } else {
                session()->setFlash(\FLASH::WARNING, 'Tên sản phẩm đã tồn tại!');
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Tên sản phẩm không được để trống!');
        }
        return $this->showAddForm();
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
        if (!isset($_SESSION['quyen']) || $_SESSION['quyen'] != 'Admin') {
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
        $id_loai = $_POST['id_loai'];
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
                $sanpham->id_loai = $id_loai;
                $sanpham->id_nsx = $id_nsx;
                $sanpham->name = $name;
                $sanpham->gia = $gia;
                $sanpham->baoquan = $baoquan;
                $sanpham->mota = $mota;
                $sanpham->soluong = $soluong;
                $sanpham->save();
                session()->setFlash(\FLASH::SUCCESS, 'Tên sản phẩm đã thay đổi thành công!');
            } else {
                session()->setFlash(\FLASH::ERROR, 'Tên sản phẩm đã tồn tại!');
                $ok = 0;
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Không tìm thấy id sản phẩm!');
            $ok = 0;
        }

        if ($ok != 0) {
            redirect('/sanpham');
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
                    ]
                );
                return $this->json(['data' => $html]);
            }
            return $this->render(
                'sanpham/sanphamm',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
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
                        ]
                    );
                    return $this->json(['data' => $html]);
                }
                return $this->render(
                    'sanpham/sanphamm',
                    [
                        'sanpham' => $sanpham,
                        'paginator' => $paginator,
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
                    <span><a href="/loaisanpham/loaisanphamlist/' . $loaisanpham->id . '"> <img src="/assets/images/loaisanpham/' . $loaisanpham->image . '" ></a></span>
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
        $hoadon = Hoadon::all();
        $sanpham = SanPham::where('id', $id_sanpham)->first();
        return $this->render(
            'sanpham/sanpham-chitiet',
            [
                'sanpham' => $sanpham,
                'binhluan' => $binhluan,
                'hoadon' => $hoadon

            ]
        );
    }

    public function chitietdonhang($id_hoadon)
    {



        $hoadon = Hoadon::where('ID', $id_hoadon)->first();

        $hoadons = Hoadon::all();
        return $this->render(
            'cuahang/cuahang-chitietdonhang',
            [
                'hoadons' => $hoadons,
                'hoadon' => $hoadon,
                'id_hoadon' => $id_hoadon

            ]
        );
    }


    public function donhang($id_trangthai)
    {
        $username = auth()->username;
        $user = User::where('username', $username)->first();

        $hoadon = Hoadon::orderBy('created_at', 'DESC')->where([['id_cuahang', $user->id_nguoidung], ['id_trangthai', $id_trangthai]])->paginate($this->getPerPage());

        $hoadons = Hoadon::where('id_cuahang', $user->id_nguoidung);
        $soluong[] = null;
        $soluong[1] = Hoadon::where([['id_cuahang', $user->id_nguoidung], ['id_trangthai', 1]])->count();
        $soluong[2] = Hoadon::where([['id_cuahang', $user->id_nguoidung], ['id_trangthai', 2]])->count();
        $soluong[3] = Hoadon::where([['id_cuahang', $user->id_nguoidung], ['id_trangthai', 3]])->count();
        $soluong[4] = Hoadon::where([['id_cuahang', $user->id_nguoidung], ['id_trangthai', 4]])->count();
        $soluong[5] = Hoadon::where([['id_cuahang', $user->id_nguoidung], ['id_trangthai', 5]])->count();

        if ($soluong[1] == 0) $soluong[1] = null;
        if ($soluong[2] == 0) $soluong[2] = null;
        if ($soluong[3] == 0) $soluong[3] = null;
        if ($soluong[4] == 0) $soluong[4] = null;
        if ($soluong[5] == 0) $soluong[5] = null;
        $total = Hoadon::where([['id_cuahang', $user->id_nguoidung], ['id_trangthai', $id_trangthai]])->count();
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
                        "id_trangthai" => $id_trangthai,
                        'soluong' => $soluong
                    ]
                );
                return $this->json(['data' => $html]);
            }
            return $this->render(
                'sanpham/sanphamm',
                [
                    'sanpham' => $sanpham,
                    'paginator' => $paginator,
                    "id_trangthai" => $id_trangthai,
                    'soluong' => $soluong
                ]
            );
        }
        return $this->render('cuahang/cuahang-donhang', [
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

        $hoadon = Hoadon::where('ID', $id_hoadon)->first();
        if ($hoadon != null) :
            if ($hoadon->id_trangthai != 3 && $hoadon->id_trangthai != 4) :
                $hoadons = Hoadon::all();
                foreach ($hoadons as $hoadons) :
                    if (
                        $hoadons->id_nguoidung == $hoadon->id_nguoidung && $hoadons->id_cuahang == $hoadon->id_cuahang
                        && $hoadons->created_at == $hoadon->created_at
                    ) :

                        $hoadons->id_trangthai += 1;
                        $hoadons->save();
                    endif;
                endforeach;
                redirect("/cuahang/donhang/$hoadon->id_trangthai");

            endif;



        endif;
        redirect("/cuahang/donhang/$hoadon->id_trangthai");
    }

    public function cuahang()
    {
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        redirect("cuahang/sanphamcuahang/$user->id_nguoidung");
    }
    public function sanphamcuahangs($id)
    {
        $_SESSION["trangtruoc"] = "cuahang/sanphamcuahang/$id";


        $sanpham = SanPham::where('id_cuahang', $id)->paginate($this->getPerPage());
        $sanphams = SanPham::where('id_cuahang', $id)->get();

        $countsanpham = SanPham::where('id_cuahang', $id)->count();
        $loaisanpham = LoaiSanPham::where('id', $id)->first();
        $paginator = new Paginator($this->request, $sanpham, $countsanpham, 25);
        $paginator->onEachSide(2);
        $khuyenmai = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->get();
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'cuahang/cuahang-sanphamcuahang',
                [
                    'sanpham' => $sanpham,
                    'sanphams' => $sanphams,
                    'loaisanpham' => $loaisanpham,
                    'countsanpham' => $countsanpham,
                    'paginator' => $paginator,
                    'id' => $id,

                    'khuyenmai' => $khuyenmai

                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'cuahang/cuahang',
            [
                'sanpham' => $sanpham,
                'loaisanpham' => $loaisanpham,
                'countsanpham' => $countsanpham,
                'sanphams' => $sanphams,
                'paginator' => $paginator,
                'id' => $id,
                'khuyenmai' => $khuyenmai

            ]
        );
    }

    public function showchat($id_nguoinhan)
    {

        $username = auth()->username;
        $user = User::where('username', $username)->first();
        if ($id_nguoinhan == 0)
            $id_nguoinhan = $user->id_nguoidung;
        $flag = 0;
        $chats = Chat::where('id_nguoinhan', $user->id_nguoidung)->orderBy('id_nguoigui', 'DESC')->get();
        $sotinnhan[] = null;
        $nguoigui = null;
        foreach ($chats as $chats) {

            if ($chats->nguoigui->username != $nguoigui) {
                $nguoigui = $chats->nguoigui->username;
                if ($chats->trangthai == 0)
                    $sotinnhan[$chats->id_nguoigui] = 1;
                else
                    $sotinnhan[$chats->id_nguoigui] = 0;
            } else
             if ($chats->trangthai == 0)
                $sotinnhan[$chats->id_nguoigui] += 1;
        }
        if ($user->id_nguoidung == $id_nguoinhan) {
            $flag = 1;
            $chattn = Chat::where('id_nguoinhan', $user->id_nguoidung)
                ->orderBy('created_at', 'DESC')->get();
            return $this->render(
                'cuahang/cuahang-chat',
                [
                    'chattn' => $chattn,
                    'id_nguoinhan' => $id_nguoinhan,
                    'sotinnhan' => $sotinnhan,
                    'chat' => null,
                    'flag' => $flag
                ]
            );
        }
        $profile = Profile::where('user_id', $id_nguoinhan)->first();
        $chatkt = $chat = Chat::where([['id_nguoigui', $user->id_nguoidung], ['id_nguoinhan', $id_nguoinhan]])
            ->orWhere([['id_nguoinhan', $user->id_nguoidung], ['id_nguoigui', $id_nguoinhan]])->count();
        if ($chatkt == 0) {
            $chatnew = new Chat();
            $chatnew->id_nguoigui = $id_nguoinhan;
            $chatnew->id_nguoinhan = $user->id_nguoidung;
            $chatnew->noidung = "Xin chào $username Chúng tôi có thể giúp gì cho bạn";
            $chatnew->trangthai = 1;
            $chatnew->save();
        }

        $chat = Chat::where([['id_nguoigui', $user->id_nguoidung], ['id_nguoinhan', $id_nguoinhan]])
            ->orWhere([['id_nguoinhan', $user->id_nguoidung], ['id_nguoigui', $id_nguoinhan]])->orderBy('created_at', 'DESC')->get();

        $chattn = Chat::where('id_nguoinhan', $user->id_nguoidung)
            ->orderBy('created_at', 'DESC')->get();
        return $this->render(
            'cuahang/cuahang-chat',
            [
                'id_nguoinhan' => $id_nguoinhan,
                'chattn' => $chattn,
                'profile' => $profile,
                'chat' => $chat,
                'sotinnhan' => $sotinnhan,
                'chats' => $chats,
                'flag' => $flag
            ]
        );
    }

    public function chat($id_nguoinhan)
    {

        $noidung = $_POST["noidung"];

        $username = auth()->username;
        $user = User::where('username', $username)->first();
        if ($user->id_nguoidung != $id_nguoinhan) {
            $profile = Profile::where('user_id', $id_nguoinhan)->first();
            $chats = Chat::where([['id_nguoigui', $user->id_nguoidung], ['id_nguoinhan', $id_nguoinhan], ['noidung', $noidung]])->first();
            if ($chats == null) {
                $chat = new Chat();
                $chat->id_nguoinhan = $id_nguoinhan;
                $chat->id_nguoigui = $user->id_nguoidung;
                $chat->noidung = $noidung;
                $chat->trangthai = 0;
                $chat->save();
            }
        }
        redirect("/cuahang/chat/$id_nguoinhan");
    }
    public function chart($id_cuahang)
    {

        return $this->render(
            'cuahang/cuahang-chart',
            []
        );
    }
}
