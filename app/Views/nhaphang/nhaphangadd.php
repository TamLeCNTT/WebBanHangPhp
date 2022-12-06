<?php

use App\Models\Hoadon;

$this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>

<div>
    <div class="containter row justify-content-center">

        <div class="row" style="margin-top: 0px;">
            <?= $this->insert('../Views/cuahang/cuahang-layout') ?>
            <div class="col-5 m-auto mt-2 item-list">
                <form enctype="multipart/form-data" action="/nhaphang/add" method="POST">

                    <div class="form-group" style="text-align: center;">
                        <h3 class="a-h2 align-items-start">Nhập thêm sản phẩm</h3>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ngày nhập hàng</span>
                        </div>
                        <input required type="date" value="<?= $ngay ?? null ?>" id="ngay" class="form-control" placeholder="Nhập số lượng" name="ngay">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tên sản phẩm:</span>
                        </div>
                        <select required name="sp" id="sp" style="display: block;">
                            <option selected>-- Chọn sản phẩm--</option>
                            <?php

                            use App\Models\Nhaphang;
                            use App\Models\NhaSanXuat;
                            use App\Models\SanPham;
                            use App\Models\User;

                            $username = auth()->username;
                            $user = User::where('username', $username)->first();

                            $nsx = SanPham::where('id_cuahang', $user->id_nguoidung)->get();
                            foreach ($nsx as $nsxs) : ?>
                                <option name="id_nsx" value="<?php echo $nsxs->id ?>">
                                    <?= $nsxs->id . " - " . $nsxs->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Số lượng sản phẩm</span>
                        </div>
                        <input required type="number" id="sl" value="" class="form-control sl" placeholder="Nhập số lượng" name="sl">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Giá sản phẩm</span>
                        </div>
                        <input required id="dg" type="text" value="" class="form-control dg" placeholder="Nhập số lượng" name="dg">
                    </div>

                    <div class="form-group" style="text-align: center;">

                        <button class="btn btn-primary btn-block ">
                            Thêm
                        </button>
                    </div>

                </form>
            </div>
            <div class="col-5 m-auto mt-2 item-list">
                <div class="form-group" style="text-align: center;">
                    <h3 class="a-h2 align-items-start">Danh sách nhập hàng</h3>

                </div>
                <?php $nhaphang = Nhaphang::where('ngaynhap', $ngay)->get();
                if ($ngay != null) :
                ?>
                    <b style="text-align:left;">Ngày : <?= $ngay ?></b>
                <?php endif; ?>
                <div class="input-group mb-3">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Đơn giá</th>


                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php if ($ngay != null) : ?>
                                <?php
                                foreach ($nhaphang as $nhaphang) : ?>
                                    <tr>
                                        <th class="text-center"><?= $nhaphang->sanpham->name ?></th>
                                        <th class="text-center"><?= $nhaphang->soluong ?></th>
                                        <th class="text-center"><?= $nhaphang->gia ?></th>


                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </tbody>
                    </table>


                </div>
                <?php if ($ngay != null) : ?>
                    <div class="form-group them" style="text-align: center;">

                        <a class="btn btn-primary  btn-block" href="/cuahang/sanphamcuahang/<?= $user->id_nguoidung ?>">Xong
                        </a>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>