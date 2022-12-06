<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>
    .modal a.close-modal {
        top: 0px;
        right: 0px;
    }
</style>
<div class="container">
    <div id="wrapper">

        <?= $this->insert('../Views/cuahang/cuahang-layout') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <h2 class="a-h2">Danh sách khuyến mãi</h2>
                </div>
                <div class="col-3 row align-items-start  ">
                    <?php
                    if ($sanphams > 0) :                    ?>
                        <a class="btn btn-primary" href="#add" rel="modal:open">Thêm khuyến mãi</a>
                        <?= $this->insert('../Views/khuyenmai/khuyenmai-add') ?>
                    <?php endif; ?>

                </div>
            </div>
            <?php

            if ($sanphams <= 0) :
            ?>
                <div class="row mt-5" style="margin-bottom:7.2% ;">
                    <div class="col-10 m-auto mt-2 item-list" style="text-align:center ;" id="sanpham-list">
                        <img style="width:50px;height: 50px;" src="<?= request()->baseUrl(); ?>/assets/images/logo/donhang.jpg ?>" />
                        <a style="text-align: center;">Chưa có sản phẩm nào </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row " id="khuyenmai-list">


                <?php $this->insert(
                    'khuyenmai/khuyenmai-list',
                    [

                        '$sanpham' => $sanphams,
                        'khuyenmai' => $khuyenmai,
                        'paginator' => $paginator
                    ]
                );
                ?>

            </div>

        </div>
    </div>

    <?php $this->stop(); ?>
    <!-- Đặt code JS vào phần footer của default layout -->
    <?php $this->start('js') ?>
    <?= $this->insert('khuyenmai/khuyenmai-script'); ?>
    <?php $this->stop(); ?>