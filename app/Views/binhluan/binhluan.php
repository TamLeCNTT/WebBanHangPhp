<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>List of Ward and Communes</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="binhluan-list">
                <?php $this->insert('binhluan/binhluan-list', [
                    'items' => $items,
                    'paginator' => $paginator
                ]); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->stop(); ?>