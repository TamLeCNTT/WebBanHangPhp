<?php

namespace App\Controllers;

use App\Http\Paginator;
use App\Http\Response;

use App\Models\Tintuc;

use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Khuyenmai;

class TintucController extends BaseController
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
        return $this->render(
            'tintuc/tintuc-add'
        );
    }
    public function add()
    {
        $name = $_POST['name'] ?? null;
        $noidung = $_POST['noidung'] ?? null;
        $loaitin = $_POST['loaitin'] ?? null;
        if (($_FILES['image']['name'] != null)) {
            $uploaddir = 'assets/images/tintuc/';
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
        if ($name != null) {
            $tintuc = tintuc::wherename($name)->first();
            if (!$tintuc) {
                $tintuc = new tintuc();
                $tintuc->noidung = $noidung;
                $tintuc->loaitin = $loaitin;
                $tintuc->name = $name;
                $tintuc->image = $_FILES['image']['name'];

                $tintuc->save();
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
        $tintuc = tintuc::paginate($this->getPerPage());
        $total = tintuc::count();
        $paginator = new Paginator($this->request, $tintuc, $total, 15);
        $paginator->onEachSide(2);
        if ($this->request->ajax()) {
            $html = $this->view->render(
                'tintuc/tintuc-list',
                [
                    'tintuc' => $tintuc,
                    'paginator' => $paginator,
                ]
            );
            return $this->json(['data' => $html]);
        }
        return $this->render(
            'tintuc/tintuc',
            [
                'tintuc' => $tintuc,
                'paginator' => $paginator,
            ]
        );
    }

    public function showtintuc()
    {
        $tintuc = tintuc::paginate($this->getPerPage());
        $total = tintuc::count();
        $paginator = new Paginator($this->request, $tintuc, $total, 15);
        $paginator->onEachSide(2);

        return $this->render(
            'tintuc/tintuc-show',
            [
                'tintuc' => $tintuc,
                'paginator' => $paginator,
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
        $tintuc = tintuc::where('id', $id)->first();

        return $this->render(
            'tintuc/tintuc-edit',
            [
                'tintuc' => $tintuc
            ]
        );
    }

    public function edit()
    {

        $id = $this->request->post('id');

        $name = $_POST['name'] ?? null;
        $noidung = $_POST['noidung'] ?? null;
        $loaitin = $_POST['loaitin'] ?? null;
        $uploaddir = 'assets/images/tintuc/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
        $tintuc = Tintuc::where('id', $id)->first();
        if ($tintuc) {
            $tintuc->noidung = $noidung;
            $tintuc->loaitin = $loaitin;
            $tintuc->name = $name;
            if ($_FILES['image']['name'] != null)
                $tintuc->image = $_FILES['image']['name'];
            $tintuc->save();
            session()->setFlash(\FLASH::SUCCESS, 'Sản phẩm đã được sửa thành công!');
            redirect('/tintuc/list');
        } else {
            session()->setFlash(\FLASH::WARNING, 'không tồn tại sản phẩm!');
        }
        return $this->render(
            'tintuc/tintuc-edit',
            [
                'tintuc' => $tintuc
            ]
        );
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $tintuc = tintuc::where('id', $id)->first();
        if ($this->request->ajax()) {
            if ($tintuc) {
                if ($tintuc->delete()) {
                    return $this->json([
                        'message' => $tintuc->name . ' đã được xóa thành công!'
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
