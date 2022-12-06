<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="container">
    <div id="wrapper">
        <?= $this->insert('../Views/user/user-layoutadmin') ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Danh sách hóa đơn</h2>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 m-auto mt-3 item-list" id="hoadon-list">
                    <?php $this->insert(
                        'hoadon/hoadon-list',
                        [
                            'hoadon' => $hoadon,
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
    <?= $this->insert('hoadon/hoadon-script'); ?>
    <?php $this->stop(); ?>