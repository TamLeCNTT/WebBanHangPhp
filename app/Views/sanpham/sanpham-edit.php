<form enctype="multipart/form-data" action="/sanpham/edit" method="POST" style="display:none;" id="edit">
    <div class="input-group mb-3" hidden>
        <div class="input-group-prepend">
            <span class="input-group-text">ID Sản Phẩm:</span>
        </div>
        <input type="text" id="id" name="id" readonly value="<?= $sanpham->id ?>" class="form-control">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tên sản phẩm:</span>
        </div>
        <input required type="text" class="form-control" value="<?= $sanpham->name ?>" placeholder="Nhập tên sản phẩm" name="sanpham_name">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Loại sản phẩm:</span>
        </div>
        <input required type="text" class="form-control" value="<?= $sanpham->loaisanpham->name ?>" placeholder="Nhập tên sản phẩm" readonly name="id_loai">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Nơi sản xuất:</span>
        </div>
        <select required name="id_nsx" style="display: block;">
            <option value="<?= $sanpham->id_nsx ?>">
                <?= $sanpham->noisanxuat->name ?>
            </option>
            <?php

            use App\Models\Nhaphang;
            use App\Models\NhaSanXuat;

            $nsx = NhaSanXuat::all();
            foreach ($nsx as $nsxs) : ?>
                <?php if ($nsxs->name != $sanpham->noisanxuat->name) : ?>
                    <option name="id_nsx" value="<?php echo $nsxs->id ?>">
                        <?= $nsxs->id . " - " . $nsxs->name ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group mb-3">
        <span class="input-group" style="color: #000;">Hình ảnh loại sản phẩm</span>
        <div class="input-group">
            <img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanpham->image ?>" alt="">
        </div>
        <input type="file" value="" name="image">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Mô tả sản phẩm:</span>
        </div>
        <input required type="text" class="form-control" value="<?= $sanpham->mota ?>" placeholder="Nhập mô tả sản phẩm" name="mota">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Bảo quản sản phẩm:</span>
        </div>
        <input required type="text" class="form-control" value="<?= $sanpham->baoquan ?>" name="baoquan">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Giá sản phẩm</span>
        </div>
        <input type="text" value="<?= $sanpham->gia ?>" readonly class="form-control" placeholder="Nhập số lượng" name="gia">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Số lượng tồn kho</span>
        </div>
        <input readonly type="number" value="<?= $sanpham->soluong ?>" class="form-control" placeholder="Nhập số lượng" name="soluong">
    </div>
    <div class="form-group" style="text-align: center;">
        <button type="submit" class="btn btn-primary btn-block">
            Lưu
        </button>
    </div>
</form>