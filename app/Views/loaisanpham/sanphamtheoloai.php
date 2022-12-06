<?php

use App\Models\Hoadon;

$this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container">
    <?php $check = 1 ?>
    <?php if ($countsanpham == 0) : ?>
        <div class="col-10 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h5 style="font-size: 1.8rem;text-align: center;" class="a-h2">
                                Đã hết hàng theo loại: <span class="text-dark"><?= $loaisanpham->name ?>!</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-10 col-md-10 col-12">
                        <div class="top-middle">
                            <marquee direction="right" scrolldelay="8" scrollamount="8" onmouseover="this.stop()" onmouseout="this.start()"><a href="/home">
                                    <h3 style="color: black;">Rất tiếc sản phẩm theo loại <?= $loaisanpham->name ?> đã bán
                                        hết, vui lòng quay lại sau!</h3>
                                </a></marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:200px;">
            <?php $check = 0; ?>
        </div>
    <?php else : ?>
        <div class="col-5 m-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title ">
                            <h5 style="font-size: 1.8rem;margin:0px 10px 10px  ;text-align: center;" class="a-h2">
                                Sản phẩm theo loại: <span class="text-dark"><?= $loaisanpham->name ?>!</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-5">
        <div class="col-12 m-auto item-list">
            <div class="row">
                <?php
                foreach ($sanpham as  $sanphams) :
                    $km = 0;
                    if ($sanphams->id_loai == $loaisanpham->id) : ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">
                            <a href="<?= "/sanpham/chitietsanpham/" . $sanphams->id ?>">
                                <div class="card card-1" style="width: 18rem;">
                                    <?php
                                    if ($sanphams->soluong == 0) : ?>
                                        <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 3;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                                            Hết hàng</div>
                                        <?php else :
                                        foreach ($khuyenmai as $khuyenmaiss) :
                                            if ($khuyenmaiss->id_sanpham == $sanphams->id) :
                                                $km = 1;
                                        ?>
                                                <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 3;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                                                    sale <br> <span style="color:red"><?= $khuyenmaiss->phantram ?>%</span></div>
                                    <?php break;
                                            endif;
                                        endforeach;
                                    endif; ?>

                                    <img class="card-img-top center " style="height:225px ;width:275px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanphams->image ?>" alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title" style="color:black ;">
                                            <?= $sanphams->name ?>
                                        </h5>
                                        <?php if ($km == 0) : ?>
                                            <a class="card-text" style="color:red ;font-size:25px;">đ<?= number_format($sanphams->gia, 0, ",", "."); ?>
                                            </a>
                                        <?php else : ?>
                                            <a class="card-text" style="color:red ;font-size:25px;">đ<?= number_format($sanphams->giasaukhuyenmai, 0, ",", "."); ?>
                                            </a>
                                            <a class="card-text" style="font-size:20px;color:gray; text-decoration: line-through;">đ<?= number_format($sanphams->gia, 0, ",", "."); ?>
                                            </a>
                                        <?php endif ?>
                                        <br>
                                        <?php
                                        $counts = 0;
                                        $hoadon = Hoadon::all();
                                        foreach ($hoadon as  $hoadonsa) :

                                            if ($hoadonsa->id_sanpham == $sanphams->id) :
                                                $counts += $hoadonsa->soluong;
                                            endif;
                                        endforeach; ?>

                                        <p> <?php
                                            if ($sanphams->sosaotb == 0) : $sanphams->sosaotb = 5;
                                            endif;
                                            for ($i = 0; $i < ceil($sanphams->sosaotb); $i++) : ?>
                                                <span class="fa fa-star checked"></span>
                                            <?php endfor; ?>
                                            <?php for ($i = 0; $i < ceil(5 - $sanphams->sosaotb); $i++) : ?>
                                                <span class="fa fa-star "></span>
                                            <?php endfor; ?> | Đã bán : <?= $counts ?>
                                        </p>


                                        <form action="/home/giohang" method="POST">
                                            <button type="submit" class="btn btn-primary" style="width:50% ;margin-left:5%;">
                                                <i class="lni lni-shopping-basket"></i> Mua
                                            </button>
                                            <input type="number" name="soluong" id="soluong" min="1" max="<?= $sanphams->soluong ?>" value="1" oninput="checkValue(this);" style="width:30% ;text-align:center;margin-left:5%;height:35px!important;">
                                            <input type="hidden" name="id" value="<?= $sanphams->id ?>">
                                        </form>
                                    </div>
                                </div>
                            </a>

                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php if ($check != 0) : ?>
                <div class="pagination" style="margin-bottom:15px;">
                    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $this->stop(); ?>