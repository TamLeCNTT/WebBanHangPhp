<div class="list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên Loại Sản Phẩm</th>
                <th scope="col">Hình Ảnh Loại Sản Phẩm</th>
                <th scope="col">Quản lí</th>
            </tr>
        </thead>
        <tbody>

            <?php

            use App\Models\SanPham;

            $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($loaisanpham as $loaisanphams) : ?>

                <tr class="data-row">
                    <th scope="row"><?= $start++; ?></th>
                    <td class="align-middle id"><?= $loaisanphams->id; ?></td>
                    <td class="align-middle name"><?= $loaisanphams->name; ?></td>
                    <td><img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/loaisanpham/<?= $loaisanphams->image ?>" alt="">
                    </td>
                    <td class="action-icon">
                        <a class="btn" href="#ex2" rel="modal:open"> <img src="/assets/images/logo/edit.png" style="width:30px;"></a>

                        <!-- Modal HTML embedded directly into document -->
                        <?= $this->insert(
                            '../Views/loaisanpham/loaisanpham-edit',
                            [
                                'loaisanphams' => $loaisanphams
                            ]
                        ) ?>
                        <?php
                        $sanpham = SanPham::where("id_loai", $loaisanphams->id)->get();
                        if ($sanpham == null) :
                        ?>
                            <a class="remove-city delete" style="margin: left 0px !important;" href="<?= request()->baseUrl(); ?>/loaisanpham/delete" data-id="<?= $loaisanphams->id; ?>" title="Delete <?= $loaisanphams->name; ?>" data-name="<?= $loaisanphams->name; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php else : ?>
                            <a style="margin: left 0px !important;" href="/loaisanpham/delete">
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
<script>
    $(document).ready(function() {
        $(document).on('click', "#edit-item", function() {
            $("#edit-modal").dialog();
        });

    });
</script>

<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>