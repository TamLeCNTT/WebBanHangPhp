<div class=" list">
    <?php if ($sanpham_mua != null) : ?>
        <form enctype="multipart/form-data" action="/hoadon" method="POST">

            <table id="table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $tongtien = 0;
                    $i = 1; ?>

                    <?php foreach ($sanpham_mua as $sanpham_muaa) : ?>
                        <?php
                        $km = $sanpham_muaa->khuyenmai->where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->first() ?? null;
                        if ($km != null) {
                            $sanpham_muaa->giasaukhuyenmai = $sanpham_muaa->gia * ((100 - $km->phantram)) / 100;
                            $sanpham_muaa->save();
                        } else {
                            $sanpham_muaa->giasaukhuyenmai = $sanpham_muaa->gia;
                            $sanpham_muaa->save();
                        }

                        ?>

                        <tr>
                            <td>
                                <input class="<?= $i ?>" name="<?= $sanpham_muaa->id ?>" type="checkbox" onchange="change(<?= $i ?>,value)" <?= $_SESSION[$sanpham_muaa->id]["check"] ?? null ?> value="<?= $_SESSION[$user][$sanpham_muaa->id]['soluong'] *   ($sanpham_muaa->giasaukhuyenmai ?? $sanpham_muaa->gia) ?>" id="<?= $i ?>" />
                            </td>

                            <label class="form-check-label" for="<?= $i ?>">

                                <td><a href="/sanpham/chitietsanpham/<?= $sanpham_muaa->id ?>">
                                        <img src="<?= request()->baseUrl() ?>/assets/images/sanpham/<?= $sanpham_muaa->image ?>" alt="ảnh sản phẩm" class="cartDetail-img">
                                    </a></td>
                                <td><?= $sanpham_muaa->name; ?></td>
                                <td><?= number_format($sanpham_muaa->giasaukhuyenmai ?? $sanpham_muaa->gia, 0, ",", "."); ?> VNĐ</td>

                                <td>
                                    <input type="button" style="width:20px;border:none;background-color:aliceblue;" onclick="tru(<?= $sanpham_muaa->id ?>) " value="-">

                                    <input type="number" style="width:40px;text-align:center;" onchange="soluong(value,<?= $sanpham_muaa->id ?>)" value="<?= $_SESSION[$user][$sanpham_muaa->id]['soluong']; ?>" id="sluong<?= $sanpham_muaa->id ?>">
                                    <input type="button" style="width:20px;border:none;background-color:aliceblue;" onclick="cong(<?= $sanpham_muaa->id ?>) " value="+">
                                </td>
                                <td>

                                    <a href="/sanpham/giohangg/<?= $sanpham_muaa->id ?>">
                                        <img src="/assets/images/logo/delete.png" style="width:30px;">
                                    </a>
                                </td>
                            </label>
                        </tr>


                    <?php $i += 1;
                    endforeach; ?>



                </tbody>
            </table>


            <div class="d-flex justify-content-between" style="margin-bottom: 20px;">
                <button style="height: 70px; width: 120px;" id="thanhtoan" type="submit" class="btn btn-primary thanhtoan">Đặt hàng</button>
                <h3 id="total">Tổng giá tiền: <a id="tongtien"><?= $tongtien ?> </a> VNĐ</h3>
                <!--number_format($tongtien, 0, ",", ".");  -->
            </div>
        </form>
    <?php else : ?>
        <div style="height: 200px;"></div>
    <?php endif; ?>
</div>
<script>
    function change(i, val) {

        let tien;

        console.log(i, $('.' + i).is(':checked'));

        if ($('.' + i).is(':checked')) {
            tien = (Number($("a#tongtien").html()) + Number(val));
        } else {
            tien = (Number($("a#tongtien").html()) - Number(val));

        }

        $("a#tongtien").html(tien);

    }

    function soluong(val, id) {

        if (val != 0) {
            url = "/card/doisoluong/" + id + "/" + val;
            $(location).attr("href", url);
        }

    }

    function tru(id) {
        val = document.getElementById("sluong" + id).value - 1;

        if (val != 0) {
            url = "/card/doisoluong/" + id + "/" + val;
            $(location).attr("href", url);
        }
    }

    function cong(id) {

        let val = document.getElementById("sluong" + id).value;
        console.log(val);
        val++;
        if (val != 0) {
            url = "/card/doisoluong/" + id + "/" + val;
            $(location).attr("href", url);
        }

    }
</script>
<style>
    table>thead {
        vertical-align: top !important;
    }

    .cartDetail-img {
        height: 10rem;
    }

    #total {
        text-align: right;
    }

    .thanhtoan {
        width: 112px;
        height: 38px;
        background-color: #006400;
    }

    .cart_soluong {
        width: 50px;
    }
</style>