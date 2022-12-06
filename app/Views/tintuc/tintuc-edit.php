<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Chỉnh sửa khuyến mãi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-8  mb-10">
        <div class="col-4 " style="margin-bottom:10px; ;">
            <a href="<?= request()->baseUrl() ?>/tintuc/list" class="btn btn-primary">
                Đi đến danh sách tin tức</a>
        </div>
        <div class="container">
            <form enctype="multipart/form-data" action="/tintuc/edit" method="POST">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID tin tức:</span>
                    </div>
                    <input type="text" id="id" name="id" readonly value="<?= $tintuc->id ?>" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tên tin tức</span>
                    </div>
                    <input required type="text" value="<?= $tintuc->name ?>" class="form-control" placeholder="Nhập tên tin tức" name="name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nội dung</span>
                    </div>
                    <input required type="text" class="form-control" value="<?= $tintuc->noidung ?>" placeholder="Nhập nội dung" name="noidung">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Loại tin</span>
                    </div>
                    <input required type="text" class="form-control" value="<?= $tintuc->loaitin  ?>" placeholder="Nhập nội dung loại tin tức" name="loaitin">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Hình ảnh cũ</span>
                    </div>
                    <img style="width: 150px; height: 150px; margin-left: 10px;" src="<?= request()->baseUrl(); ?>/assets/images/tintuc/<?= $tintuc->image ?>" alt="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group">
                        <span class="input-group" style="color: #fff;">Hình ảnh tin tức</span>
                    </div>
                    <input type="file" placeholder="Hình ảnh tintuc" name="image">
                </div>
                <div class="form-group" style="text-align: center;margin-bottom: 10px;">
                    <button type="submit" class="btn btn-primary btn-block">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->stop(); ?>