<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2 class="a-h2 a-h3 "> <span class="a-strong">Sản phẩm cửa hàng</span></h2>

            </div>
        </div>
    </div>
    <div class="row">
        <?php

        use App\Models\Hoadon;

        foreach ($sanpham as  $sanpham) : ?>
            <div class="col-lg-3 col-md-6 col-sm-12 new-item" style="margin-bottom:30px;">
                <a href="<?= "/sanpham/chitietsanpham/" . $sanpham->id ?>">
                    <div class="card card-1" style="width: 18rem;">
                        <?php
                        $km = 0;
                        if ($sanpham->soluong == 0) : ?>
                            <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 3;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                                Hết hàng</div>
                            <?php else :
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
    </div>
    <div>
        <a href="#logo" style="position: fixed;color: #ed4190;right: 10px;bottom: 5px"><img src="<?= request()->baseUrl(); ?>/assets/images/logofooter" class="top" width="60px" height="60px"></a>
    </div>
</div>
<?= $this->insert('../Views/home/home-css') ?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination" style="margin-bottom: 50px;">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>