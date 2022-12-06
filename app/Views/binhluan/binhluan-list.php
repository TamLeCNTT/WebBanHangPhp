<div class="user-list list">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">ten san pham</th>
                <th scope="col">ten nguoi dung</th>
                <th scope="col">noi dung</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $item->ID; ?></td>
                    <td>hjhjsjs</td>
                    <td><?= $item->diachi; ?></td>
                    <td><?= $item->email; ?></td>
                    <td><?= $item->sdt; ?></td>

                    <td>
                        <a href="<?= '/binhluan/edit/' . $item->id_nguoidung ?>">
                            Edit
                        </a>
                        <a class="delete-user" href="<?= request()->baseUrl() ?>/user/delete" data-id="<?= $item->id_nguoidung ?>" title="Edit <?= $item->username ?>" data-name="<?= $item->username ?>" data-return-url="<?= request()->fullUrl(); ?>">
                            delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>