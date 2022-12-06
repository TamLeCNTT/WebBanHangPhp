<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="containter row justify-content-center">
    <div class="row">
        <div class="col-10 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <div class="section-title ">
                            <h2 class="a-h2">Giỏ hàng</h2>
                        </div>
                    </div>
                    <div class="col-2 ">
                        <a href="/sanphamshow" class="btn btn-primary">Tiếp tục mua</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row " style="margin-top:0px ;">
    <div class="col-10 m-auto mt-2 item-list" id="loaisanpham-list">
        <?php $this->insert('cart/cart-list', [
            'sanpham_mua' => $sanpham_mua,
            'user' => $user
        ]); ?>
    </div>
</div>
<?php $this->stop() ?>

<?php $this->start('js') ?>


<?php $this->stop(); ?>