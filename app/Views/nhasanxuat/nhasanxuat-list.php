<div class="nhasanxuat-list list">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên nơi sản xuất</th>
                <th scope="col">Kí hiệu</th>
                <th scope="col">Quản lí</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1;

            use App\Models\SanPham; ?>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->KiHieu; ?></td>
                    <td class="action-icon">
                        <a href="#edit" rel="modal:open">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                        </a>
                        <?= $this->insert(
                            '../Views/nhasanxuat/nhasanxuat-edit',
                            [
                                'nhasanxuat' => $item
                            ]
                        ) ?>
                        <?php $sanpham = SanPham::where("id_nsx", $item->id)->get();
                        if ($sanpham == null) : ?>

                            <a class="delete-nhasanxuat" href="<?= request()->baseUrl() ?>/nhasanxuat/delete" data-id="<?= $item->id ?>" title="Edit <?= $item->name ?>" data-name="<?= $item->name ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php else : ?>
                            <a href="/nhasanxuat/deletekhongchoxoa">
                                <img src="/assets/images/logo/delete.png" style="width:30px;">
                            </a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>