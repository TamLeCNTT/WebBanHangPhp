<?php

namespace App\Controllers;

use App\Http\Paginator;
use App\Http\Response;

use App\Models\Tintuc;

use App\Models\Hoadon;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Khuyenmai;
use App\Models\Trahang;

class TrahangController extends BaseController
{
    public function showAddForm($id)
    {
       $hoadon=Hoadon::where('ID',$id)->first();
       $trahang=Trahang::where('id_hoadon',$id)->first();

        return $this->render(
            'trahang/trahang-add',
            [
                'hoadon'=>$hoadon,
                'trahang'=>$trahang
            ]
        );
    }
    public function add($id)
    {
        $hoadon=Hoadon::where('ID',$id)->first();
        $hoadon->id_trangthai=5;
        $hoadon->save();
        $trahang=new Trahang();
        $lido=$_POST["lido"]??null;
        if (($_FILES['image']['name'] != null)) {
            $uploaddir = 'assets/images/trahang/';
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
            $trahang->hinhanh = $_FILES['image']['name'];
        }
       
        $trahang->id_hoadon=$id;
        $trahang->lido=$lido;
        $trahang->save();

        return  redirect("/sanpham/sanphamdamua/4");
    }

    public function xacnhan($id)
    {
     
        $hoadon=Hoadon::where('ID',$id)->first();
        $hoadon->id_trangthai=6;
        $hoadon->save();
        $sanpham=SanPham::where('id',$hoadon->id_sanpham)->first();
        $sanpham->soluong+=$hoadon->soluong;
        $sanpham->save();
        return  redirect("/cuahang/donhang/5");
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
