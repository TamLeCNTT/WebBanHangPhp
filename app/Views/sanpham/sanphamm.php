<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section">
    <div class="containter row justify-content-center">
        <div class="row">
            <div class="col-10 m-auto">
                <?php $this->insert(
                    'sanpham/sanpham-listshow',
                    [
                        'sanpham' => $sanpham,
                        'khuyenmai' => $khuyenmai,
                        'paginator' => $paginator
                    ]
                );
                ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>