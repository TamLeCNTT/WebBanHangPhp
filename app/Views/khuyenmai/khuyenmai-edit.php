<form enctype="multipart/form-data" action="/khuyenmai/edit" method="POST" style="display:none;" id="edit">
    <div class="form-group" style="text-align: center;">
        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Cập nhật khuyến mãi</h3>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">ID khuyến mãi:</span>
        </div>
        <input type="text" id="id" name="id" readonly value="<?= $khuyenmai->id ?>" class="form-control form-input">
    </div>
    <div class="input-group mb-3">

        <div class="input-group-prepend">
            <span class="input-group-text">Sản phẩm:</span>
        </div>
        <input type="text" id="id" name="id" readonly value="<?= $khuyenmai->sanpham->name ?>" class="form-control form-input">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tên khuyến mãi:</span>
        </div>
        <input required type="text" class="form-control" value="<?= $khuyenmai->name ?>" placeholder="Nhập tên sản phẩm" name="khuyenmai_name">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Phần trăm khuyến mãi</span>
        </div>
        <input required type="number" class="form-control" value="<?= $khuyenmai->phantram ?>" placeholder="Nhập phần trăm" name="khuyenmai_phantram">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Thời gian bắt đầu</span>
        </div>
        <input required type="date" class="form-control" value="<?= $khuyenmai->NgayBD ?>" placeholder="Nhập số lượng" name="khuyenmai_bd">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Thời gian kết thúc</span>
        </div>
        <input required type="date" class="form-control" value="<?= $khuyenmai->NgayKT ?>" placeholder="Nhập số lượng" name="khuyenmai_kt">
    </div>

    <div class="form-group" style="text-align: center; margin-bottom: 10px;">
        <button id="themkhuyenmai" type="submit" class="btn btn-primary btn-block">
            Lưu
        </button>
    </div>
</form>

<?php $this->start('js') ?>
<?= $this->insert('khuyenmai/khuyenmai-checkngay'); ?>
<?php $this->stop(); ?>