<form enctype="multipart/form-data" action="/sanpham/add" method="POST" style="display:none;" id="add">
    <div class="form-group" style="text-align: center;">
        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Thêm sản phẩm</h3>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tên sản phẩm:</span>
        </div>
        <input required type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="sanpham_name">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Nơi sản xuất:</span>
        </div>
        <select required name="id_nsx" style="display: block;">
            <option value="" selected>-- Chọn nơi sản xuất--</option>
            <?php

            use App\Models\NhaSanXuat;

            $nsx = NhaSanXuat::all();
            foreach ($nsx as $nsxs) : ?>
                <option name="id_nsx" value="<?php echo $nsxs->id ?>">
                    <?= $nsxs->id . " - " . $nsxs->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group">
            <span class="input-group-file" style="color: #fff;">Hình ảnh sản phẩm</span>
        </div>
        <input required type="file" placeholder="Hình ảnh sản phẩm" required name="image">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Mô tả sản phẩm:</span>
        </div>
        <input required type="text" class="form-control" placeholder="Nhập mô tả sản phẩm" name="mota">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Bảo quản sản phẩm:</span>
        </div>
        <input required type="text" class="form-control" placeholder="Nhập hướng dẫn bảo quản" name="baoquan">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Giá sản phẩm</span>
        </div>
        <input required type="text" class="form-control" placeholder="Nhập số lượng" name="gia">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Số lượng sản phẩm</span>
        </div>
        <input required type="number" class="form-control" placeholder="Nhập số lượng" name="soluong">
    </div>
    <div class="form-group" style="text-align: center;">
        <button type="submit" class="btn btn-primary btn-block">
            Thêm
        </button>
    </div>
</form>