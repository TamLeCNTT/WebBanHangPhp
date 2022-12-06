<div class="list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">ID Loại</th>
                <th scope="col">Tên loại sản phẩm</th>
                <th scope="col">ID NSX</th>
                <th scope="col">Tên nhà sản xuất</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Hình ảnh sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th colspan="2" scope="col" style="text-align: center;">Quản lí</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($sanpham as $sanphams) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $sanphams->id; ?></td>
                    <td><?= $sanphams->id_loai; ?></td>
                    <td><?= $sanphams->loaisanpham->name; ?></td>
                    <td><?= $sanphams->id_nsx; ?></td>
                    <td><?= $sanphams->noisanxuat->name; ?></td>
                    <td><?= $sanphams->name; ?></td>
                    <td><?= substr($sanphams->mota, 0, 84) ?>
                        <?php if (strlen($sanphams->mota) > 84) : ?>
                            ....
                        <?php endif; ?>
                        </li>
                    </td>
                    <td><img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanphams->image ?>" alt=""></td>
                    <td><?= $sanphams->gia; ?></td>
                    <td><?= $sanphams->soluong; ?></td>
                    <td class="action-icon">
                        <a href="<?= '/sanpham/edit/' . $sanphams->id ?>">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                        </a>
                    </td>
                    <td class="action-icon">
                        <?php
                        $flag = 0; // kiểm tra loại sản phẩm có tồn tại trong bảng sản phẩm không .Neus có thì khong hiện nút xóa nếu không tồn tại sẽ hiện
                        foreach ($binhluan as $binhluans) :
                            if ($binhluans->id_sanpham == $sanphams->id) :
                                $flag = 1;
                            endif;
                        endforeach;
                        foreach ($hoadon as $hoadons) :
                            if ($hoadons->id_sanpham == $sanphams->id) :
                                $flag = 1;
                            endif;
                        endforeach;

                        foreach ($khuyenmai as $khuyenmais) :
                            if ($khuyenmais->id_sanpham == $sanphams->id) :
                                $flag = 1;
                            endif;
                        endforeach;
                        if ($flag == 0) :
                        ?>
                            <a class="remove-city delete" href="<?= request()->baseUrl(); ?>/sanpham/delete" data-id="<?= $sanphams->id; ?>" title="Delete <?= $sanphams->name; ?>" data-name="<?= $sanphams->name; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php else : ?>
                            <a class="remove-city" style="margin: left 0px !important;" href="/sanpham/delete">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>