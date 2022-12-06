<?php

use App\Models\Hoadon;

$this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="container">
    <div id="wrapper">
        <?= $this->insert('../Views/cuahang/cuahang-layout') ?>

        <div class="container-fluid">

            <div class="row">

                <div class="col-12 m-auto mt-2 item-list">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <?php if ($id_trangthai == 1) : ?>
                                <a class="nav-link active" style="color: black;" href="/cuahang/donhang/1">Chờ xác nhận
                                    <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[1] ?? null ?></span></a>
                            <?php else : ?>
                                <a class="nav-link " style="color: black;" href="/cuahang/donhang/1">Chờ xác nhận <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[1] ?? null ?></span></a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($id_trangthai == 2) : ?>
                                <a class="nav-link active" style="color: black;" href="/cuahang/donhang/2">Chờ lấy hàng
                                    <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[2] ?? null ?></span></a>
                            <?php else : ?>
                                <a class="nav-link " style="color: black;" href="/cuahang/donhang/2">Chờ lấy hàng <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[2] ?? null ?></span></a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($id_trangthai == 3) : ?>
                                <a class="nav-link active" style="color: black;" href="/cuahang/donhang/3">Đang giao
                                    <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[3] ?? null ?></span></a>
                            <?php else : ?>
                                <a class="nav-link " style="color: black;" href="/cuahang/donhang/3">Đang giao <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[3] ?? null ?></span></a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($id_trangthai == 4) : ?>
                                <a class="nav-link active" style="color: black;" href="/cuahang/donhang/4">Đã giao</a>
                            <?php else : ?>
                                <a class="nav-link " style="color: black;" href="/cuahang/donhang/4">Đã giao</a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($id_trangthai == 5) : ?>
                                <a class="nav-link active" style="color: black;" href="/cuahang/donhang/5">Trả hàng
                                    <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[5] ?? null ?></span></a>
                            <?php else : ?>
                                <a class="nav-link " style="color: black;" href="/cuahang/donhang/5">Trả hàng <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[5] ?? null ?></span></a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>


                <?php if (isset($id_trangthai) && isset($soluong[$id_trangthai]) && $soluong[$id_trangthai] != null) : ?>


                    <div class="col-12 m-auto mt-2 item-list" id="sanpham-list">


                        <div class="list">

                            <table id="table" class="table table-striped table-hover">
                                <thead>

                                    <tr>
                                        <th scope="col">STT</th>

                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Ngày mua</th>

                                        <th colspan="2" scope="col" style="text-align: center;">Quản lí</th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>

                                    <?php
                                    $ngaymua = null;
                                    foreach ($hoadon as $hoadons) :
                                        if ($hoadons->id_trangthai == $id_trangthai) :

                                            if ($ngaymua != $hoadons->created_at) :
                                                $ngaymua = $hoadons->created_at;
                                    ?>
                                                <tr>
                                                    <th scope="row"><?= $start++; ?></th>
                                                    <td><?= $hoadons->sanpham->name; ?></td>

                                                    <td><img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $hoadons->sanpham->image ?>" alt=""></td>
                                                    <td><?= $hoadons->soluong; ?></td>
                                                    <td><?=
                                                        date_format($hoadons->created_at, " H:i:s d/m/Y "); ?></td>

                                                    <td class="action-icon">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col">
                                                                </div>
                                                                <div class="col">
                                                                    <?php if ($id_trangthai == 5) : ?>
                                                                        <a href="<?= "/trahang/" . $hoadons->ID ?>">


                                                                            <button id="thanhtoan" type="submit" class="btn btn-primary thanhtoan">Xem
                                                                                chi tiết</button>



                                                                        </a>
                                                                    <?php else : ?>
                                                                        <a href="<?= '/cuahang/chitietdonhang/' . $hoadons->ID ?>">


                                                                            <button id="thanhtoan" type="submit" class="btn btn-primary thanhtoan">Xem
                                                                                chi tiết</button>



                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="col-6">
                                                                    <?php if ($id_trangthai == 1 || $id_trangthai == 2) : ?>
                                                                        <a href="<?= '/cuahang/chapnhandonhang/' . $hoadons->ID ?>">


                                                                            <button id="thanhtoan" type="submit" class="btn btn-primary ">
                                                                                <?php if ($id_trangthai == 1) : ?> Nhận đơn
                                                                                    <?php else : ?>Đã chuyển hàng
                                                                                <?php endif; ?></button>



                                                                        </a>
                                                                    <?php elseif ($id_trangthai == 5) : ?>



                                                                        <a href="<?= "/trahang/xacnhan/" . $hoadons->ID ?>" id="thanhtoan" type="submit" class="btn btn-primary thanhtoan">Xác nhận
                                                                        </a>





                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>
                                                        </div>



                                                    </td>

                                                </tr>

                                    <?php
                                            endif;
                                        endif;
                                    endforeach; ?>
                                </tbody>
                            </table>
                            <div class="pagination">
                                <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
                            </div>
                        </div>
                        <!-- Hiển thị phân trang bên dưới bảng -->
                    </div>
            </div>
        <?php else : ?>
            <div class="row mt-5" style="margin-bottom:7.2% ;">
                <div class="col-10 m-auto mt-2 item-list" style="text-align:center ;" id="sanpham-list">
                    <img style="width:50px;height: 50px;" src="<?= request()->baseUrl(); ?>/assets/images/logo/donhang.jpg ?>" />
                    <a style="text-align: center;">Chưa có đơn hàng </a>
                </div>
            </div>

        <?php endif ?>

        </div>
    </div>

</div>
<style>
    table>thead {
        vertical-align: top !important;
    }

    .cartDetail-img {
        height: 10rem;
    }

    #total {
        text-align: right;
    }

    .thanhtoan {
        width: 112px;
        height: 38px;
        background-color: gray;
    }

    .cart_soluong {
        width: 50px;
    }
</style>

<?php $this->stop(); ?>
<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>
<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>