<?php

use App\Models\Hoadon;
use App\Models\Profile;

$this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>

<style>
    .tt {
        background-color: #fff !important;
    }
</style>
<div class="container">
    <div id="wrapper">



        <div class="container-fluid">
            <div class="row">
                <div class="col-6">

                    <div class="form-group" style="text-align: center;">
                        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Thông tin đơn hàng</h3>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mã đơn:</span>
                        </div>
                        <input required type="text" class="form-control tt" placeholder="Nhập tên sản phẩm" name="name" value="<?= $hoadon->ID ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ngày đặt hàng:</span>
                        </div>
                        <input required type="text" class="form-control tt" placeholder="Nhập tên sản phẩm" name="name" value="<?= date_format($hoadon->created_at, "d/m/Y") ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ngày nhận hàng:</span>
                        </div>
                        <input required type="text" class="form-control tt" placeholder="Nhập tên sản phẩm" name="name" value="<?= date_format($hoadon->updated_at, "d/m/Y") ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tên sản phẩm:</span>
                        </div>
                        <input required type="text" class="form-control tt" placeholder="Nhập tên sản phẩm" name="name" value="<?= $hoadon->sanpham->name ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Số lượng</span>
                        </div>
                        <input required type="text" class="form-control tt" placeholder="Nhập tên sản phẩm" name="soluong" value="<?= $hoadon->soluong ?>" readonly>
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Đơn giá</span>
                        </div>
                        <input required type="text" class="form-control tt" placeholder="Nhập tên sản phẩm" name="soluong" value="<?= number_format($hoadon->sanpham->gia, 0, ",", ".") ?>" readonly>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tổng tiền:</span>
                        </div>
                        <input required type="text" class="form-control tt" placeholder="Nhập hướng dẫn bảo quản" value="<?= number_format($hoadon->sanpham->gia * $hoadon->soluong, 0, ",", ".") ?>" readonly>
                    </div>




                </div>
                <div class="col-6">
                    <form enctype="multipart/form-data" action="/trahang/<?= $hoadon->ID ?>" method="POST">
                        <div class="form-group" style="text-align: center;">
                            <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Biểu mẫu trả hàng</h3>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Lí do</span>
                            </div>
                            <input required type="text" <?php if ($trahang != null) : ?> value="<?= $trahang->lido ?>" readonly <?php endif; ?> class="form-control tt" placeholder="Nhập lí do trả hàng" name="lido">
                        </div>
                        <?php if ($trahang != null) : ?>

                            <div class="input-group mb-3">
                                <img id="hinhmau" src="/assets/images/trahang/<?= $trahang->hinhanh ?>" style="height:200px ;width:200px;">

                            </div>
                        <?php else : ?>
                            <div class="input-group mb-3">

                                <span class="input-group-text">Hình ảnh bằng chứng</span>


                                <input id="hinh" style="margin-top:5px ;margin-left:10px;" required type="file" placeholder="Hình ảnh sản phẩm" required name="image">
                            </div>
                            <div class="input-group mb-3">
                                <img id="hinhmau" src="" style="height:200px ;width:200px;display:none;">

                            </div>
                        <?php endif; ?>



                        <div class="form-group" style="text-align: center;">
                            <?php if ($trahang != null) : ?>



                                <a href="<?= "/trahang/xacnhan/" . $hoadon->ID ?>" id="thanhtoan" type="submit" class="btn btn-primary  btn-block">Xác nhận
                                </a>





                            <?php else : ?>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Thêm
                                </button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#hinh').on('change', function() {

            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#hinhmau").fadeIn("fast").attr('src', tmppath)


        });
    });
</script>
<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>