<?php $this->layout(config('view.layout')) ?>

<?php $this->start('css'); ?>
<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
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
        <?php

        use App\Models\User;

        $username = "guest";
        if (auth()) :
            $username = auth()->username;
        endif;
        $user = User::where('username', $username)->first();
        if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Partner' && ($id == $user->id_nguoidung)) : ?>
            <?= $this->insert('../Views/cuahang/cuahang-layout') ?>
        <?php endif; ?>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 m-auto mt-2 item-list" id="sanpham-list">
                    <?php $this->insert(
                        'cuahang/cuahang-sanphamcuahang',
                        [
                            'sanpham' => $sanpham,
                            'loaisanpham' => $loaisanpham,
                            'countsanpham' => $countsanpham,
                            'paginator' => $paginator,
                            'id' => $id,
                            'sanphams' => $sanphams,
                            'khuyenmai' => $khuyenmai
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop(); ?>
<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>
<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>