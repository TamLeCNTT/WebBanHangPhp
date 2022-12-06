<?php $this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('tintuc/tintuc-css'); ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="section-title " style="text-align: center;">
        <h2 class="a-h2">Tin tức cửa hàng</h2>
      </div>
    </div>
  </div>
  <div class="row">
    <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
    <?php foreach ($tintuc as $tintucs) : ?>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="cap">
          <img class="img-tintuc" src="<?= request()->baseUrl(); ?>/assets/images/tintuc/<?= $tintucs->image ?>">
          <div class="overplay">
            <div class="content">
              <p><?= $tintucs->noidung ?></p>
            </div>
          </div>
          <div class="news">
            <i class="badge"><?= $tintucs->loaitin ?></i>
            <p><?= $tintucs->name ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
  </div>
</div>
<?php $this->stop(); ?>
<?php $this->start('js') ?>
<?= $this->insert('tintuc/tintucshow-script'); ?>
<?php $this->stop(); ?>