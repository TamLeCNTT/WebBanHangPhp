<ul class="pagination-list">
    <li>
        <form action="<?= $paginator->url(1); ?>" method="GET">
            <select name="per-page" class="form-select" onchange="this.form.submit()">
                <option <?= $paginator->getPerPage() == 8 ? "selected" : '' ?> value="8">8</option>
                <option <?= $paginator->getPerPage() == 16 ? "selected" : '' ?> value="16">16</option>
                <option <?= $paginator->getPerPage() == 24 ? "selected" : '' ?> value="24">24</option>
                <option <?= $paginator->getPerPage() == 32 ? "selected" : '' ?> value="32">32</option>
                <option <?= $paginator->getPerPage() == 40 ? "selected" : '' ?> value="40">40</option>
            </select>
        </form>
    </li>
    <!-- Previous Page Link -->
    <?php if ($paginator->onFirstPage()) : ?>
        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
    <?php else : ?>
        <li><a href="<?php echo $paginator->previousPageUrl(); ?>" rel="prev">&laquo;</a></li>
    <?php endif; ?>

    <!-- Pagination Elements -->
    <?php foreach ($paginator->getElements() as $element) : ?>
        <!-- "Three Dots" Separator -->
        <?php if (is_string($element)) : ?>
            <li class="disabled"><a href="javascript:void(0)"><?php echo $element; ?></a></li>
        <?php endif; ?>

        <!-- Array Of Links -->
        <?php if (is_array($element)) : ?>
            <?php foreach ($element as $page => $url) : ?>
                <?php if ($page == $paginator->currentPage()) : ?>
                    <li class="active"><a href="javascript:void(0)"><?php echo $page; ?></a></li>
                <?php else : ?>
                    <li><a href="<?php echo $url; ?>"><?php echo $page;  ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- Next Page Link -->
    <?php if ($paginator->hasMorePages()) : ?>
        <li><a href="<?php echo $paginator->nextPageUrl(); ?>" rel="next">&raquo;</a></li>
    <?php else : ?>
        <li class="disabled"><a href="javascript:void(0)">&raquo;</a></li>
    <?php endif; ?>
</ul>