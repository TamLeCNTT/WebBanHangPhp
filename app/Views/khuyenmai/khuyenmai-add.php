<form enctype="multipart/form-data" action="/khuyenmai/add" method="POST" style="display:none;" id="add">
    <div class="form-group" style="text-align: center;">
        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Thêm khuyến mãi</h3>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">sản phẩm:</span>
        </div>
        <select required name="id_sanpham" style="display: block;">

            <option value="" selected>-- Chọn sản phẩm--</option>
            <?php

            use App\Models\SanPham;
            use App\Models\User;

            if (auth())
                $username = auth()->username;
            else
                $username = "guest";
            $user = User::where('username', $username)->first();
            $sanpham = SanPham::where('id_cuahang', $user->id_nguoidung)->get();
            foreach ($sanpham as $sanphams) : ?>
                <option name="id_sanpham" value="<?= $sanphams->id ?>">
                    <?= $sanphams->id . " - " . $sanphams->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tên khuyến mãi:</span>
        </div>
        <input required type="text" class="form-control" placeholder="Nhập tên khuyến mãi" name="khuyenmai_name">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Phần trăm khuyến mãi</span>
        </div>
        <input required type="number" class="form-control" placeholder="Nhập phần trăm khuyến mãi" name="khuyenmai_phantram">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Thời gian bắt đầu</span>
        </div>
        <input required type="date" class="form-control" placeholder="Chọn thời gian bắt đầu" name="khuyenmai_bd">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Thời gian kết thúc</span>
        </div>
        <input required type="date" class="form-control" placeholder="Chọn thời gian kết thúc" name="khuyenmai_kt">
    </div>
    <div class="form-group" style="text-align: center;margin-bottom: 10px;">
        <button id="themkhuyenmai" type="submit" class="btn btn-primary btn-block">
            Thêm
        </button>
    </div>
</form>

<?php $this->start('js') ?>
<?= $this->insert('khuyenmai/khuyenmai-checkngay'); ?>
<?php $this->stop(); ?>