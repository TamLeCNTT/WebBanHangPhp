<form action="/nhasanxuat/edit" method="POST" id="edit" style="display:none;">
    <div class="form-group" style="text-align: center;">
        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Cập nhật nơi sản xuất</h3>
    </div>
    <div class="form-row">
        <label>ID nhà sản xuất </label>
        <input type="text" id="nhasanxuat_id" name="nhasanxuat_id" readonly value="<?= $nhasanxuat->id ?>" class="form-control form-input">
    </div>
    <div class="form-row">
        <label>Tên nhà sản xuất</label>
        <input required type="text" name="nhasanxuat_name" class="form-control form-input " placeholder="Ten nha san xuat" value="<?= $nhasanxuat->name ?? null ?>" />
        <div class="invalid-feedback">
            <?= $errors['username'] ?? null; ?>
        </div>
        <label style="color: red;"> <?= $errors['username'] ?? null; ?></label>

    </div>

    <div class="form-row">
        <label>Kí hiệu </label>
        <input required type="text" name="nhasanxuat_kihieu" class="form-control form-input " value="<?= $nhasanxuat->KiHieu ?>" />
        <div class="invalid-feedback">
            <?= $errors['ngaysanxuat'] ?? null; ?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;margin-top:30px;">
        <button type="submit" class="btn btn-primary btn-block">
            Lưu
        </button>
    </div>
</form>