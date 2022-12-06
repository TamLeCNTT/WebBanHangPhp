<div class="list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#No</th>
                <th scope="col">Tên tin tức</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Loại tin</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Actions</th>
                <!-- <th scope="col"></th> -->
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($tintuc as $tintucs) : ?>
                <tr>
                    <td scope="row"><?= $start++; ?></td>
                    <td><?= $tintucs->name; ?></td>
                    <td><?= substr($tintucs->noidung, 0, 82) ?>
                        <?php if (strlen($tintucs->noidung) > 80) : ?>
                            ....
                        <?php endif; ?>
                        </li>
                    </td>
                    <td><?= $tintucs->loaitin; ?></td>
                    <td><img style="width: 60px; height: 60px;" src="<?= request()->baseUrl(); ?>/assets/images/tintuc/<?= $tintucs->image ?>" alt=""></td>
                    <td class="action-icon" style="vertical-align:middle;">
                        <a href="<?= '/tintuc/edit/' . $tintucs->id ?>">
                            <img src="/assets/images/logo/edit.png" style="width:30px;">
                            </i>
                        </a>
                        <a class="remove-city delete" href="<?= request()->baseUrl(); ?>/tintuc/delete" data-id="<?= $tintucs->id; ?>" title="Delete <?= $tintucs->name; ?>" data-name="<?= $tintucs->name; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                            <img src="/assets/images/logo/delete.png" style="width:30px;">
                        </a>
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