<form enctype="multipart/form-data" action="/nhasanxuat/add" method="POST" style="display:none;" id="add">
    <div class="form-group" style="text-align: center;">
        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Thêm nơi sản xuất</h3>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tên nhà sản xuất</span>
        </div>
        <input required type="text" class="form-control" placeholder="Nhập tên nhà sản xuất" name="nhasanxuat_name">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Kí hiệu</span>
        </div>
        <input required type="text" class="form-control" placeholder="Nhập kí hiệu nhà sản xuất" name="nhasanxuat_kihieu">
    </div>

    <div class="form-group" style="text-align: center;">
        <button type="submit" class="btn btn-primary btn-block">
            Thêm
        </button>
    </div>
</form>