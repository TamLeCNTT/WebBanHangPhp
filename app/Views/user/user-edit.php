<form enctype="multipart/form-data" action="/user/edit" method="POST" style="display:none;" id="edit">
    <div class="form-group" style="text-align: center;">
        <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Cập nhật người dùng</h3>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="id" id="id" value="<?= $user->id_nguoidung ?? null ?>" readonly class="form-control">
        <label for="id">ID người dùng</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="username" value="<?= $user->username ?? null ?>" readonly class="form-control ">
        <label for="username">Tên đăng nhập</label>

    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Quyền sử dụng</span>
        </div>

        <select name="id_quyen" style="display: block;">
            <option value="<?= $user->ID_quyen ?>" selected><?= $user->quyen->quyen ?></option>
            <?php

            use App\Models\Quyen;

            $quyen = Quyen::all();

            foreach ($quyen as $quyen) :
                if ($user->ID_quyen != $quyen->ID_quyen) :
            ?>
                    <option name="id_quyen" value="<?php echo $quyen->ID_quyen ?>">
                        <?= $quyen->quyen ?>
                    </option>
            <?php endif;
            endforeach; ?>

        </select>
    </div>
    <div class="form-group" style="text-align: center;margin-top:15px;;margin-bottom:45px;">
        <button type="submit" class="btn btn-primary btn-block">
            Lưu
        </button>
    </div>

</form>