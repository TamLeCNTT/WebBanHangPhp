<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center" style="margin-bottom:10px;" id="dathang">
    <div style="color: while; text-align: center;margin-bottom:10px;">
        <a class="text-primary" style=" font-size:1.8rem;"><strong>Chi tiết hóa đơn của quý khách!</strong></a>
    </div>
    <div class="row col-6 ">
        <main class="container">
            <div class="card">
                <form enctype="multipart/form-data" action="/hoadonxong" method="POST">
                    <div class="input-group mb-3" hidden>

                        <input type="text" id="id" name="id" readonly value="<?= $hoadon->ID ?>" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tên người nhận hàng </span>
                        </div>
                        <input type="text" id="id" name="username" value="<?= $profile->username ?>" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Địa chỉ:</span>
                        </div>
                        <input type="text" id="id" name="diachi" value="<?= $profile->location ?>" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Số điện thoại</span>
                        </div>
                        <input type="text" name="sdt" class="form-control" value="<?= $profile->phone ?>" placeholder="Nhập tên sản phẩm" name="sanpham_name">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ngày lập hóa đơn</span>
                        </div>
                        <input type="text" value="<?= date("d/m/Y") ?>" class="form-control" placeholder="Nhập số lượng" name="gia">
                    </div>
                    <table id="table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Số thứ tự</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thanh tiền</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $tongtien = 0;
                            $stt = 0; ?>
                            <?php foreach ($sanpham_mua as $sanpham_muaa) : ?>
                                <tr>
                                    <?php $thanhtien = 0;
                                    $stt++; ?>
                                    <td><?= $stt ?></td>
                                    <td><?= $sanpham_muaa->name; ?></td>
                                    <td><?= number_format($sanpham_muaa->giasaukhuyenmai ?? $sanpham_muaa->gia, 0, ",", "."); ?> </td>
                                    <?php $thanhtien += ($sanpham_muaa->giasaukhuyenmai ?? $sanpham_muaa->gia) * $_SESSION[$user->username][$sanpham_muaa->id]['soluong'] ?>
                                    <?php $tongtien +=  ($sanpham_muaa->giasaukhuyenmai ?? $sanpham_muaa->gia) * $_SESSION[$user->username][$sanpham_muaa->id]['soluong'] ?>
                                    <td> <?= $_SESSION[$user->username][$sanpham_muaa->id]['soluong'] ?></td>
                                    <td>
                                        <?= number_format($thanhtien, 0, ",", ".") ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td scolspan="2">Tổng tiền:</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?= number_format($tongtien, 0, ",", ".") ?> VNĐ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary ">
                            Thanh toán
                        </button>
                        <a class="btn btn-primary" href="<?= request()->baseUrl(); ?>/hoadon/donhuy/<?= $hoadon->ID ?>">Hủy</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php $this->stop(); ?>
<?php $this->start('js') ?>
<?= $this->insert('hoadon/hoadon-script'); ?>
<?php $this->stop(); ?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>