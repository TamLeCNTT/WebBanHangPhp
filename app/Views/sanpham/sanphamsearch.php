<?php $this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<section class="trending-product section" style="padding-top: 20px; padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title ">
                    <div class="col-10 m-auto">
                        <h5 style="font-size: 1.8rem;margin:0px 10px 10px  ;text-align: center;" class="a-h2">
                            Kết quả tìm kiếm theo của từ khóa: <span class="text-dark"><?= $keyword ?></span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="noidung">
            <div class="col-11 m-auto mt-2 item-list">
                <?php $this->insert(
                    'sanpham/sanpham-search',
                    [
                        'sanpham' => $sanpham,
                        'paginator' => $paginator,
                        'keyword' => $keyword,
                        'flag' => $flag
                    ]
                );
                ?>
            </div>
        </div>
    </div>
</section>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php $this->stop(); ?>