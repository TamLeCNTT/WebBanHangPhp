<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <div class="col-5 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title " style="text-align: center;">
                        <h2 class="a-h2">Thêm tin tức</h2>
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
            <form enctype="multipart/form-data" action="/tintuc/add" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tên tin tức</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập tên tin tức" name="name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nội dung</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập nội dung" name="noidung">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Loại tin tức</span>
                    </div>
                    <input required type="text" class="form-control" placeholder="Nhập nội dung loại tin" name="loaitin">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group">
                        <span class="input-group" style="color: #fff;">Hình ảnh tin tức</span>
                    </div>
                    <input required type="file" placeholder="Hình ảnh tintuc" required name="image">
                </div>
                <div class="form-group" style="text-align: center; margin-bottom: 15px;">
                    <button type="submit" class="btn btn-primary btn-block">
                        Thêm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->stop(); ?>