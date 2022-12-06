<form enctype="multipart/form-data" action="/loaisanpham/add" method="POST" id="add" style="display:none;">
    <div class="form-group" style="text-align: center;">
        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Thêm loại sản phẩm</h3>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tên loại sản phẩm:</span>
        </div>
        <input required type="text" name="loaisanpham_name" class="form-control form-input " placeholder="nhập vào loại sản phẩm" value="" />
    </div>
    <div class="input-group mb-3">
        <div class="input-group">
            <span class="input-group" style="color: #fff;">Hình ảnh loại sản phẩm</span>
        </div>
        <input required type="file" placeholder="Hình ảnh sản phẩm" required name="image">
    </div>
    <div class="form-group" style="text-align: center;">
        <button type="submit" class="btn btn-primary btn-block">
            Thêm
        </button>
    </div>
</form>