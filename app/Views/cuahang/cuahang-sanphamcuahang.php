<?php

use App\Models\Hoadon;
use App\Models\Profile;
use App\Models\User;

if ($sanpham != null) :
    $username = "guest";
    if (auth()) :
        $username = auth()->username;


    endif;

    $user = User::where('username', $username)->first();
    $profile = Profile::where('user_id', $id)->first();
endif
?>
<style>
    .nhaphang {
        max-width: 1000px !important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-10">
            <a>
                <img style="width:80px;height: 80px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $profile->avatar ?? "avatar.png" ?>" class="rounded-circle" height="25" alt="" loading="lazy" />
                <?= $profile->username ?? $sanpham->user->username ?>
            </a>

            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Partner' && ($id == $user->id_nguoidung)) :  ?>
                <a class="btn btn-primary" href="#add" rel="modal:open" style="margin-right: 0px;"><i class="fas fa-certificate fa-sm text-white-50"></i> Thêm sản phẩm
                    <?= $this->insert('../Views/sanpham/sanpham-add') ?>
                </a>
                <a class="btn btn-primary " href="#nhaphang" rel="modal:open" style="margin-right: 0px;"><i class="fas fa-certificate fa-sm text-white-50"></i>Nhập hàng
                </a>
                <?= $this->insert('../Views/nhaphang/nhaphang-add') ?>
            <?php else : ?>
                <a href="/chat/<?= $sanpham->first()->user->id_nguoidung ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas  fa-sm text-white-50"></i>Chat ngay
                </a>
            <?php endif; ?>

        </div>
        <?php $check = 1 ?>
        <?php if ($countsanpham == 0) : ?>
            <div class="row mt-5" style="margin-bottom:7.2% ;">
                <div class="col-10 m-auto mt-2 item-list" style="text-align:center ;" id="sanpham-list">
                    <img style="width:50px;height: 50px;" src="<?= request()->baseUrl(); ?>/assets/images/logo/donhang.jpg ?>" />
                    <a style="text-align: center;">Chưa có sản phẩm nào </a>
                </div>
            </div>
            <div style="height:200px;">
                <?php $check = 0; ?>
            </div>
        <?php else : ?>


        <?php endif; ?>
    </div>
    <div class="row">
        <?php foreach ($sanpham as  $sanphams) : ?>
            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Partner' && ($id == $user->id_nguoidung)) :  ?>
                <div class="col-xl-4 col-md-6 mb-4" id="sanpham-list">
                <?php else : ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                    <?php endif; ?>


                    <a href="<?= "/sanpham/chitietsanpham/" . $sanphams->id ?>">
                        <div class="card card-1" style="width: 18rem;">
                            <?php
                            $km = 0;
                            if ($sanphams->soluong == 0) : ?>
                                <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 1;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                                    Hết hàng</div>
                                <?php else :
                                foreach ($khuyenmai as $khuyenmaiss) :
                                    if ($khuyenmaiss->id_sanpham == $sanphams->id) :
                                        $km = 1;
                                ?>
                                        <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 1;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                                            sale <br> <span style="color:red"><?= $khuyenmaiss->phantram ?>%</span></div>
                            <?php break;
                                    endif;
                                endforeach;
                            endif; ?>

                            <img class="card-img-top center " style="height:225px ;width:275px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanphams->image ?>" alt="Card image cap">

                            <div class="card-body">
                                <h5 class="card-title" style="color:black ;">
                                    <?= $sanphams->name ?>
                                </h5>
                                <?php if ($km == 0) : ?>
                                    <a class="card-text" style="color:red ;font-size:25px;">đ<?= number_format($sanphams->gia, 0, ",", "."); ?>
                                    </a>
                                <?php else : ?>
                                    <a class="card-text" style="color:red ;font-size:25px;">đ<?= number_format($sanphams->giasaukhuyenmai, 0, ",", "."); ?>
                                    </a>
                                    <a class="card-text" style="font-size:20px;color:gray; text-decoration: line-through;">đ<?= number_format($sanphams->gia, 0, ",", "."); ?>
                                    </a>
                                <?php endif ?>
                                <br>
                                <?php
                                $counts = 0;
                                $hoadon = Hoadon::all();
                                foreach ($hoadon as  $hoadonsa) :

                                    if ($hoadonsa->id_sanpham == $sanphams->id) :
                                        $counts += $hoadonsa->soluong;
                                    endif;
                                endforeach; ?>

                                <p> <?php
                                    if ($sanphams->sosaotb == 0) : $sanphams->sosaotb = 5;
                                    endif;
                                    for ($i = 0; $i < ceil($sanphams->sosaotb); $i++) : ?>
                                        <span class="fa fa-star checked"></span>
                                    <?php endfor; ?>
                                    <?php for ($i = 0; $i < ceil(5 - $sanphams->sosaotb); $i++) : ?>
                                        <span class="fa fa-star "></span>
                                    <?php endfor; ?> | Đã bán : <?= $counts ?>
                                </p>

                                <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Partner' && ($id == $user->id_nguoidung)) :  ?>

                                    <a class="btn btn-primary" style="width:40% ;" href="#edit" rel="modal:open">
                                        Sửa
                                    </a>
                                    <?= $this->insert(
                                        '../Views/sanpham/sanpham-edit',
                                        [
                                            'sanpham' => $sanphams
                                        ]
                                    ) ?>

                                    <a class="btn btn-primary delete" style="width:40% ;text-align:center;margin-left:5%;height:35px!important;" href="<?= request()->baseUrl(); ?>/sanpham/delete" data-id="<?= $sanphams->id; ?>" title="Delete <?= $sanphams->name; ?>" data-name="<?= $sanphams->name; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                        Xóa
                                    </a>
                                <?php else : ?>
                                    <form action="/home/giohang" method="POST">
                                        <button <?php if ($sanphams->soluong == 0) : ?> disabled<?php endif; ?> type="submit" class="btn btn-primary" style="width:50% ;margin-left:5%;">
                                            <i class="lni lni-shopping-basket"></i> Mua
                                        </button>
                                        <input <?php if ($sanphams->soluong == 0) : ?> disabled<?php endif; ?> type="number" name="soluong" id="soluong" min="1" max="<?= $sanphams->soluong ?>" value="1" oninput="checkValue(this);" style="width:30% ;text-align:center;margin-left:5%;height:35px!important;">
                                        <input type="hidden" name="id" value="<?= $sanphams->id ?>">
                                    </form>
                                <?php endif; ?>

                            </div>
                        </div>

                    </a><!-- Button trigger modal -->

                    </div>

                <?php endforeach; ?>
                </div>

                <?php if ($check != 0) : ?>
                    <div class="pagination" style="margin-bottom:15px;">
                        <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
                    </div>
                <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function int(value) {
            return parseInt(value);
        }

        // this checks the value and updates it on the control, if needed
        function checkValue(sender) {
            let min = sender.min;
            let max = sender.max;
            let value = int(sender.value);
            if (value > max) {
                alert("Sản phẩm chỉ còn " + max + " sản phẩm. Khách thông cảm nha!")
                sender.value = max;
            } else if (value < min) {
                sender.value = min;
            }
        }
    </script>