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
<div style="padding-top: 10px; padding-bottom: 50px;">
    <div class="containter row justify-content-center">
        <div class="col-4 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách sản phẩm</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 row align-items-start ">
            <div class="col-4">
                <a class="btn btn-primary" href="#add" rel="modal:open">Thêm Sản Phẩm</a>

            </div>
            <?= $this->insert('../Views/sanpham/sanpham-add') ?>
        </div>
        <div class="row">
            <div class="col-10 m-auto mt-2 item-list" id="sanpham-list">
                <?php $this->insert(
                    'sanpham/sanpham-list',
                    [
                        'sanpham' => $sanpham,
                        'paginator' => $paginator,
                        'khuyenmai' => $khuyenmai,
                        'hoadon' => $hoadon,
                        'binhluan' => $binhluan

                    ]
                );
                ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>
<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>