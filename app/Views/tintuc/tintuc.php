<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section">
    <div class="containter row justify-content-center">
        <div class="col-4 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h2 class="a-h2">Danh sách tin tức</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 row align-items-start mt-4" style="margin-top:0px !important;">
            <div class="col-4 ">
                <a href="/tintuc/add" class="btn btn-primary">
                    Thêm tin tức
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 m-auto mt-2 item-list" id="tintuc-list">
                <?php $this->insert(
                    'tintuc/tintuc-list',
                    [
                        'tintuc' => $tintuc,
                        'paginator' => $paginator
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
<?= $this->insert('tintuc/tintuc-script'); ?>
<?php $this->stop(); ?>