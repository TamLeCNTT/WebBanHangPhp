<?php

use App\Models\Hoadon;

$this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>

<div style="padding-top: 20px; padding-bottom: 50px;">
    <div class="containter row justify-content-center">
        <div class="col-10 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách sản phẩm đã mua</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-10 m-auto mt-2 item-list">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <?php if ($id_trangthai == 1) : ?>
                            <a class="nav-link active" style="color: black;" href="/sanpham/sanphamdamua/1">Chờ xác nhận
                                <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[1] ?? null ?></span></a>
                        <?php else : ?>
                            <a class="nav-link " style="color: black;" href="/sanpham/sanphamdamua/1">Chờ xác nhận <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[1] ?? null ?></span></a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($id_trangthai == 2) : ?>
                            <a class="nav-link active" style="color: black;" href="/sanpham/sanphamdamua/2">Chờ lấy hàng
                                <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[2] ?? null ?></span></a>
                        <?php else : ?>
                            <a class="nav-link " style="color: black;" href="/sanpham/sanphamdamua/2">Chờ lấy hàng <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[2] ?? null ?></span></a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($id_trangthai == 3) : ?>
                            <a class="nav-link active" style="color: black;" href="/sanpham/sanphamdamua/3">Đang giao <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[3] ?? null ?></span></a>
                        <?php else : ?>
                            <a class="nav-link " style="color: black;" href="/sanpham/sanphamdamua/3">Đang giao <span class="badge badge-danger" style="background-color:red!important;font-size:15px ;color:white !important;"><?= $soluong[3] ?? null ?></span></a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($id_trangthai == 4) : ?>
                            <a class="nav-link active" style="color: black;" href="/sanpham/sanphamdamua/4">Đã giao</a>
                        <?php else : ?>
                            <a class="nav-link " style="color: black;" href="/sanpham/sanphamdamua/4">Đã giao</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>

        <?php if ($soluong[$id_trangthai] != null) : ?>

            <div class="row ">
                <div class="col-10 m-auto mt-2 item-list" id="sanpham-list">


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
                                $cuahang = null;
                                foreach ($hoadon as $hoadons) :
                                    if ($hoadons->id_trangthai >= $id_trangthai) :

                                        if ($ngaymua != $hoadons->created_at || $cuahang != $hoadons->id_cuahang) :
                                            $cuahang = $hoadons->id_cuahang;
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
                                                                <a href="<?= '/sanpham/chitietdonhang/' . $hoadons->ID ?>">
                                                                    <button id="thanhtoan" type="submit" class="btn btn-primary thanhtoan">Xem
                                                                        chi tiết</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-7">
                                                                <?php if ($id_trangthai >= 4) :
                                                                    if ($hoadons->danhgia == 0) : ?>
                                                                        <a href="/danhgia/<?= $hoadons->ID ?>" type="button" class="btn btn-primary ">
                                                                            Đánh giá ngay
                                                                        </a>
                                                                    <?php else : ?>
                                                                        <a href="/danhgia/<?= $hoadons->ID ?>" style="margin-top:5px;width:129px;" type="button" class="btn btn-primary ">
                                                                            Đánh giá lại
                                                                        </a>

                                                                    <?php endif; ?>
                                                                    <?php if ($hoadons->id_trangthai == 4) : ?>
                                                                        <a href="/trahang/<?= $hoadons->ID ?>" style="margin-top:5px;width:171px ;" type="button" class="btn btn-primary ">
                                                                            Trả hàng
                                                                        </a>
                                                                    <?php elseif ($hoadons->id_trangthai == 5) : ?>

                                                                        <a type="button" class="btn btn-primary ">
                                                                            Đang duyệt trả hàng
                                                                        </a>
                                                                    <?php else :  ?>
                                                                        <a type="button" class="btn btn-primary " style="width:171px ;">
                                                                            Đã duyệt trả hàng
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <!-- Modal -->

                                                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="staticBackdropLabel">Đánh
                                                                                        giá</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h4 class="text-center mt-2 mb-4">
                                                                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                                                    </h4>

                                                                                    <div class="form-group">
                                                                                        <textarea name="binhluan" id="user_review" class="form-control" placeholder="Bình luận"></textarea>
                                                                                    </div>
                                                                                    <input type="text" id="sosao" name="sosao" hidden>
                                                                                    <div class="form-group text-center mt-4">
                                                                                        <button type="submit" class="btn btn-primary" id="save_review" onclick="save()">Xong</button>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if ($id_trangthai == 3) : ?>
                                                                    <a href="<?= '/sanpham/chapnhandonhang/' . $hoadons->ID ?>">
                                                                        <button id="thanhtoan" type="submit" class="btn btn-primary ">
                                                                            Đã nhận hàng</button>
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
<style>
    .progress-label-left {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }

    .star-light {
        color: #e9ecef;
    }

    .bg-yellow {
        background-color: yellow;
    }


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

<script>
    const boxes = document.querySelectorAll('.submit_star');

    for (const box of boxes) {

        box.addEventListener('mouseenter', function handleClick() {
            reset_backgrounds();

            var rating = $(this).data('rating');
            document.getElementById("sosao").value = rating;

            for (var count = 1; count <= rating; count++) {
                var element = document.getElementById(
                    "submit_star_" + count);

                element.classList.add('text-warning');

            }


        });



    }


    function reset_backgrounds() {
        for (var count = 1; count <= 5; count++) {

            var element = document.getElementById("submit_star_" +
                count);

            element.classList.add('star-light');
            element.classList.remove('text-warning');


            const article = document.querySelectorAll('.danhgia');



            var rating = article.data('danhgia');

            document.getElementById("sosao").value = rating;









        }
    }
</script>


<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>