<?php

use App\Models\Hoadon;

use App\Models\Chat;
use App\Models\Profile;
use App\Models\User;

$this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container">
    <div id="wrapper">
        <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] != 'Admin') :  ?>
            <?= $this->insert('../Views/cuahang/cuahang-layout') ?>
        <?php else : ?>
            <?= $this->insert('../Views/user/user-layoutadmin') ?>

        <?php endif; ?>

        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-6 col-lg-12">

                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="margin-left:0px ;width:100% ;">
                            <h6 style="width:100% ;" class="m-0 font-weight-bold text-primary">Số lượng hàng bán ra theo tháng</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myChart"></canvas>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="margin-left:0px;width:100% ;">
                            <h6 class="m-0 font-weight-bold text-primary">Doanh thu theo tháng</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="myBarChart"></canvas>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="margin-left:0px;width:100% ;">
                            <h6 class="m-0 font-weight-bold text-primary">Lợi nhuận theo tháng</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="loinhuan"></canvas>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop(); ?>
<?php $this->start('js') ?>
<?= $this->insert('cuahang/cuahangcript'); ?>
<?php $this->stop(); ?>