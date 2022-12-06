<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center" style="margin-bottom:10px;">
    <div style="color: while; text-align: center;margin-bottom:10px;">
        <a class="text-primary" style=" font-size:1.8rem;"><strong>Chi tiết hóa đơn của quý khách!</strong></a>
    </div>
    <div class="row col-6 ">
        <main class="container">
            <div class="card">
                <form enctype="multipart/form-data" action="<?= '/cuahang/chapnhandonhang/' . $id_hoadon ?>" method="POST">
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
                            <?php foreach ($hoadons as $hoadons) : ?>
                                <?php if ($hoadons->created_at == $hoadon->created_at && $hoadons->id_nguoidung == $hoadon->id_nguoidung && $hoadons->id_cuahang == $hoadon->id_cuahang) : ?>
                                    <tr>
                                        <?php $thanhtien = 0;
                                        $stt++; ?>
                                        <td><?= $stt ?></td>
                                        <td><?= $hoadons->sanpham->name; ?></td>
                                        <td><?= number_format($hoadons->sanpham->gia, 0, ",", "."); ?> VNĐ</td>
                                        <?php $thanhtien += $hoadons->sanpham->gia * $hoadons->soluong ?>
                                        <?php $tongtien += $hoadons->sanpham->gia * $hoadons->soluong ?>
                                        <td> <?= $hoadons->soluong ?></td>
                                        <td>
                                            <?= number_format($thanhtien, 0, ",", "."); ?> VNĐ

                                        </td>
                                    </tr>
                            <?php endif;
                            endforeach; ?>
                            <tr>
                                <td scolspan="2">Tổng tiền:</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?= number_format($tongtien, 0, ",", "."); ?> VNĐ

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 form-group" style="text-align: center;">
                            <button type="submit" class="btn btn-primary btn-block">
                                Chấp nhận
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php $this->stop(); ?><script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>