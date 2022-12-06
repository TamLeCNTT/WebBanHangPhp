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
        <?= $this->insert('../Views/user/user-layoutadmin') ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-9 m-auto">
                    <h2 class="a-h2">Danh sách loại sản phẩm</h2>

                </div>
                <div class="col-3 row align-items-start ">
                    <a class="btn btn-primary" href="#add" rel="modal:open">Thêm Loại Sản Phẩm</a>
                    <?= $this->insert(
                        '../Views/loaisanpham/loaisanpham-add',
                        [
                            'loaisanphams' => $loaisanpham
                        ]
                    ) ?>
                </div>
                <div class="col-12 m-auto mt-2 item-list" id="loaisanpham-list">

                    <?php $this->insert('loaisanpham/loaisanpham-list', [
                        'loaisanpham' => $loaisanpham,
                        'paginator' => $paginator,
                        'sanpham' => $sanpham,
                        'khuyenmai' => $khuyenmai
                    ]);
                    ?>
                </div>

            </div>
        </div>
    </div>

    <?php $this->stop(); ?>
    <!-- Đặt code JS vào phần footer của default layout -->
    <?php $this->start('js') ?>
    <?= $this->insert('loaisanpham/loaisanpham-script'); ?>
    <?php $this->stop(); ?>