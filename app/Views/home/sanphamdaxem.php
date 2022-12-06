<?php

use App\Models\Hoadon;
use App\Models\Khuyenmai;

$this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>

<div class="section">
    <div class="containter row justify-content-center">
        <div class="row">
            <div class="col-10 m-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title " style="text-align: center;">
                                <h2 class="a-h2">Sản phẩm quý khách đã xem</h2>
                            </div>
                        </div>
                    </div>
                    <?php if ($flag == 1) : ?>
                        <div class="col-lg-10 col-md-10 col-12" style="margin:90px 0px ;">
                            <div class="top-middle">
                                <marquee direction="right" scrolldelay="8" scrollamount="8" onmouseover="this.stop()" onmouseout="this.start()"><a href="/home">
                                        <h3 style="color: black;">Quý khách chưa xem sản phẩm nào !</h3>
                                    </a></marquee>
                            </div>
                        </div>
                        <div style="height:240px;">
                        </div>
                    <?php else : ?>
                        <div class="row" id="noidungsanpham">
                            <?php foreach ($sanpham as  $sanpham) : ?>
                                <div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">
                                    <a href="<?= "/sanpham/chitietsanpham/" . $sanpham->id ?>">
                                        <div class="card card-1" style="width: 18rem;">
                                            <?php
                                            $km = 0;
                                            if ($sanpham->soluong == 0) : ?>
                                                <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 3;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                                                    Hết hàng</div>
                                                <?php else :
                                                $khuyenmai = Khuyenmai::where('NgayBD', '<=', date("Y-m-d"))->where('NgayKT', '>=', date("Y-m-d"))->get();
                                                foreach ($khuyenmai as $khuyenmaiss) :
                                                    if ($khuyenmaiss->id_sanpham == $sanpham->id) :
                                                        $km = 1;
                                                ?>
                                                        <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 3;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                                                            sale <br> <span style="color:red"><?= $khuyenmaiss->phantram ?>%</span></div>
                                            <?php break;
                                                    endif;
                                                endforeach;
                                            endif; ?>

                                            <img class="card-img-top center " style="height:225px ;width:275px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanpham->image ?>" alt="Card image cap">

                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black ;">
                                                    <?= $sanpham->name ?>
                                                </h5>
                                                <?php if ($km == 0) : ?>
                                                    <a class="card-text" style="color:red ;font-size:25px;">đ<?= number_format($sanpham->gia, 0, ",", "."); ?>
                                                    </a>
                                                <?php else : ?>
                                                    <a class="card-text" style="color:red ;font-size:25px;">đ<?= number_format($sanpham->giasaukhuyenmai, 0, ",", "."); ?>
                                                    </a>
                                                    <a class="card-text" style="font-size:20px;color:gray; text-decoration: line-through;">đ<?= number_format($sanpham->gia, 0, ",", "."); ?>
                                                    </a>
                                                <?php endif ?>
                                                <br>
                                                <?php
                                                $counts = 0;
                                                $hoadon = Hoadon::all();
                                                foreach ($hoadon as  $hoadonsa) :

                                                    if ($hoadonsa->id_sanpham == $sanpham->id) :
                                                        $counts += $hoadonsa->soluong;
                                                    endif;
                                                endforeach; ?>

                                                <p> <?php
                                                    if ($sanpham->sosaotb == 0) : $sanpham->sosaotb = 5;
                                                    endif;
                                                    for ($i = 0; $i < ceil($sanpham->sosaotb); $i++) : ?>
                                                        <span class="fa fa-star checked"></span>
                                                    <?php endfor; ?>
                                                    <?php for ($i = 0; $i < ceil(5 - $sanpham->sosaotb); $i++) : ?>
                                                        <span class="fa fa-star "></span>
                                                    <?php endfor; ?> | Đã bán : <?= $counts ?>
                                                </p>


                                                <form action="/home/giohang" method="POST">
                                                    <button <?php if ($sanpham->soluong == 0) : ?> disabled<?php endif; ?> type="submit" class="btn btn-primary" style="width:50% ;margin-left:5%;">
                                                        <i class="lni lni-shopping-basket"></i> Mua
                                                    </button>
                                                    <input <?php if ($sanpham->soluong == 0) : ?> disabled<?php endif; ?> type="number" name="soluong" id="soluong" min="1" max="<?= $sanpham->soluong ?>" value="1" oninput="checkValue(this);" style="width:30% ;text-align:center;margin-left:5%;height:35px!important;">
                                                    <input type="hidden" name="id" value="<?= $sanpham->id ?>">
                                                </form>
                                            </div>
                                        </div>

                                    </a><!-- Button trigger modal -->

                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                </div>
                <?= $this->insert('../Views/home/home-css') ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>