<form enctype="multipart/form-data" action="/loaisanpham/edit" method="POST" id="ex2" style="display:none;">
    <h3 class="a-h2" style="margin-top:20px ;">Cập nhật loại sản phẩm</h3>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">ID loại sản phẩm:</span>
        </div>
        <input type="text" id='id' name='id' class="form-control form-input " readonly value="<?= $loaisanphams->id ?>" />
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tên loại sản phẩm:</span>
        </div>
        <input required type="text" name="loaisanpham_name" class="form-control form-input " value="<?= $loaisanphams->name ?? null ?>" />
    </div>
    <div class="input-group mb-3">
        <span class="input-group" style="color: #000;">Hình ảnh loại sản phẩm</span>
        <div class="input-group">
            <img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/loaisanpham/<?= $loaisanphams->image ?>" alt="">
        </div>
        <input type="file" value="" name="image">
    </div>

    <div class="form-group" style="text-align: center;">
        <button type="submit" class="btn btn-primary btn-block">
            Lưu
        </button>
    </div>

</form>