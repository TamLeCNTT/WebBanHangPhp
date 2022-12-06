<?php

namespace App\Controllers;

use App\Models\NhaSanXuat;
use App\Http\Paginator;
use App\Http\Response;
use DateTime;
use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Khuyenmai;

class NhaSanXuatController  extends BaseController
{

    public function showAddForm()
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
        return $this->render('nhasanxuat/nhasanxuat-add');
    }
    public function add()
    {
        $name = $_POST['nhasanxuat_name'] ?? null;
        $ngay = $_POST['nhasanxuat_ngay'] ?? null;
        $ok = 1;

        if ($name != null) {
            $pattern = "/^[a-z 'ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/i";
            if (!preg_match($pattern, $name)) {
                session()->setFlash(\FLASH::ERROR, 'Invalid nhasanxuat name! Only unicode letter and space are allowed and maximum length is 191');
                $ok = 0;
            } else {
                $nhasanxuats = NhaSanXuat::where(['name' => $name])->first();
                if (!$nhasanxuats && $ok == 1) {
                    $nhasanxuat = new NhaSanXuat();
                    $nhasanxuat->name = $name;
                    $nhasanxuat->ngaysx = $ngay;
                    $nhasanxuat->save();
                    session()->setFlash(\FLASH::SUCCESS, 'nhasanxuat added successfully!');
                } else {
                    session()->setFlash(\FLASH::WARNING, 'nhasanxuat name already existed!');
                    //$errors = "nhasanxuat name already existed!";
                }
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'nhasanxuat name must not be null!');
            //$errors = "nhasanxuat name can not null!";
        }
        return $this->showAddForm();
    }
    public function nhasanxuat_list()
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
        $items = NhaSanXuat::paginate($this->getPerPage());
        $total = NhaSanXuat::count();
        $pageper = $this->getPerPage();


        $paginator = new Paginator($this->request, $items, $total, 15);
        $paginator->appends('nhasanxuat_id', '2');
        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render('nhasanxuat/nhasanxuat-list', [
                'items' => $items,
                'paginator' => $paginator
            ]);
            return $this->json([
                'data' => $html
            ]);
        }

        return $this->render('nhasanxuat/nhasanxuat', [
            'items' => $items,
            'paginator' => $paginator
        ]);
    }
    public function deletekhongchoxoa()
    {
        session()->setFlash(\FLASH::INFO, 'Đối tượng được chọn không thể xóa xóa do khóa ngoại có dữ liệu !');
        $this->nhasanxuat_list();
    }
    public function delete()
    {
        $id = $this->request->post('id');
        $nhasanxuat = NhaSanXuat::find($id);



        if ($this->request->ajax()) {
            if ($nhasanxuat) {
                if ($nhasanxuat->delete()) {
                    return $this->json(['message'   => $nhasanxuat->name . 'has been deleted successfully.'], Response::HTTP_OK);
                } else {
                    return $this->json(['message' => 'Unable to delete nhasanxuat'], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json(['message' => 'nhasanxuat ID dóe not exists!'], Response::HTTP_NOT_FOUND);
        }

        if ($nhasanxuat) {
            if ($nhasanxuat->delete()) {

                session()->setFlash(\FLASH::SUCCESS, $nhasanxuat->name . 'has been deleted successfully.');
            } else {
                session()->setFlash(\FLASH::ERROR, "Unable to delete nhasanxuat");
            }
        } else {
            session()->setFlash(\FLASH::ERROR, "nhasanxuat D does not exists!");
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }

    public function showFormedit($id)
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
        $nhasanxuat = nhasanxuat::find($id);
        if ($nhasanxuat == null) {
            $this->nhasanxuat_list();
        } else
            return $this->render('nhasanxuat/nhasanxuat-edit', ['nhasanxuat' => $nhasanxuat]);
    }
    public function edit()
    {

        $id = $this->request->post('nhasanxuat_id');
        $nhasanxuat = nhasanxuat::find($id);
        $name = $_POST['nhasanxuat_name'];
        $ngay = $_POST['nhasanxuat_ngaymoi'] ?? null;
        $ok = 1;
        if ($nhasanxuat) {
            if ($name != '') {
                $pattern = "/^[a-z 'ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/i";

                if (!preg_match($pattern, $name)) {
                    session()->setFlash(\FLASH::ERROR, 'Invalid nhasanxuat name! Only letter and space are allowed and maximum length is 191');
                    $nhasanxuat->errors['username'] = "Tên nhà sản xuất chỉ chứa kí tự";
                    $ok = 0;
                } else {
                    $datetime = new DateTime('now');
                    if ($ngay > $datetime)
                        $nhasanxuat->errors['ngay'] = "Tên nhà sản xuất chỉ chứa kí tự";
                    if ($ngay != null)
                        $nhasanxuat->ngaysx = $ngay;
                    $nhasanxuat->name = $name;
                    $nhasanxuat->save();
                    session()->setFlash(\FLASH::SUCCESS, 'Nơi sản xuất đã được cập nhật !');
                }
            } else {
                session()->setFlash(\FLASH::ERROR, 'Tên nhà sản xuất không được đẻ trống');
                $ok = 0;
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'id nhà sản xuất không tìm thấy!');
            $ok = 0;
        }

        if ($ok != 0) {
            redirect('/nhasanxuat');
        }
        return $this->render('nhasanxuat/nhasanxuat-edit', ['nhasanxuat' => $nhasanxuat, 'errors' => $nhasanxuat->errors]);
    }
}
