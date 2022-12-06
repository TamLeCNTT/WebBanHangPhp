<?php $this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('home/home-css'); ?>
<?php $this->stop(); ?>
<!-- Load nội dung trang home/dashboard.php vào vị trí section('page') của layouts/default.php -->
<?php $this->start('page') ?>
<?php $this->insert(
    'home/dashboard',
    [
        'sanpham' => $sanpham,
        'loaisanpham' => $loaisanpham,
        'khuyenmai' => $khuyenmai,
        'hoadon' => $hoadon
    ]
); ?>
<?php $this->stop() ?>
<!-- Chèn script vào vị trí section("js") trong layout default -->
<?php $this->start('js'); ?>
<?php $this->insert('home/script'); ?>
<?php $this->stop(); ?>