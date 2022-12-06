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



                    <h2 class="a-h2">Danh sách nơi sản xuất</h2>


                </div>
                <div class="col-3 row align-items-start ">

                    <a class="btn btn-primary" href="#add" rel="modal:open">Thêm nơi sản xuất</a>
                    <?= $this->insert('../Views/nhasanxuat/nhasanxuat-add') ?>

                </div>
            </div>
            <div class="row" style="margin-bottom: 90px;">
                <div class="col-12 m-auto mt-2 item-list" id="nhasanxuat-list">
                    <?php $this->insert('nhasanxuat/nhasanxuat-list', [
                        'items' => $items,
                        'paginator' => $paginator
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
<?php $this->start('js') ?>
<?= $this->insert('nhasanxuat/nhasanxuat-script'); ?>
<?php $this->stop(); ?>