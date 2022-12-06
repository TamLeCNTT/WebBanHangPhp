<style>
    tr,
    td {
        margin-left: 20px;
        border: 1px solid gray;

    }

    td {
        text-align: center;
    }

    .loai:hover {
        font-size: 150%;
    }
</style>
<section class="banner section">




    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 w-100" style="margin: 10px auto 15px auto;">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/20/e9/72/380495352120fc800a23bae256c66484.png" class="d-block w-100" alt="#">
                            </div>
                            <div class="carousel-item  ">
                                <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/0d/a9/b3/f5489b780634dbd94934d2967e808ddb.png" class="d-block w-100" alt="#">
                            </div>
                            <div class="carousel-item ">
                                <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/4e/ec/28/39d2696c57a572d0d908c2a2aaf619d1.png" class="d-block w-100" alt="#">
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="trending-product section">
    <div class="container">
        <div style="overflow-x:auto;">
            <table style="text-align:center;">
                <tr style="border: none;">
                    <td colspan="<?= $loaisanpham->count() / 2 ?>" style="text-align:left ;border: none;">
                        <h5 style="font-size: 1.8rem;margin-bottom:20px;" class="a-h2">
                            <span class="a-danhmuc">Danh mục</span>
                        </h5>
                    </td>
                </tr>

                <tr>
                    <?php $i = 0;
                    foreach ($loaisanpham as  $loaisanphams) :
                        if ($i < $loaisanpham->count() / 2) : $i++;
                    ?>
                            <td>
                                <div class="card" style="width: auto;">
                                    <span> <a href="<?= "/loaisanpham/loaisanphamlist/" . $loaisanphams->id ?>"> <img style="width:200px;height:105px ;" src="<?= request()->baseUrl(); ?>/assets/images/loaisanpham/<?= $loaisanphams->image ?>"></a></span>
                                    <br>
                                    <p> <?= $loaisanphams->name ?></p>
                                </div>
                            </td>
                    <?php endif;
                    endforeach; ?>

                </tr>

                <tr>
                    <?php $i = 0;
                    foreach ($loaisanpham as  $loaisanphams) :
                        $i++;
                        if ($i > $loaisanpham->count() / 2) :
                    ?>
                            <td>

                                <div class="card" style="width: auto;">
                                    <span> <a href="<?= "/loaisanpham/loaisanphamlist/" . $loaisanphams->id ?>"> <img style="width:200px;height:105px ;" src="<?= request()->baseUrl(); ?>/assets/images/loaisanpham/<?= $loaisanphams->image ?>"></a></span>
                                    <br><br>
                                    <p> <?= $loaisanphams->name ?></p>
                                </div>


                            </td>
                    <?php endif;
                    endforeach; ?>

                </tr>

            </table>
        </div>
        <h5 style="font-size: 1.8rem;margin-bottom:20px;" class="a-h2">
            <span class="a-danhmuc">Gợi ý hôm nay</span>
        </h5>
        <?= $this->insert('../Views/card-layout/card-goiy') ?>
    </div>
</section>
<section class="home-product-list section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <?php if ($khuyenmai->count() > 0) : ?>
                        <h2 class="a-h2 a-h3 "> <span class="a-strong">Sản phẩm khuyến mãi với giá ưu đãi</span></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <?= $this->insert('../Views/card-layout/card-khuyenmai') ?>

        </div>


    </div>
</section>

<section class="blog-section section">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2 class="a-h2 a-h3 "> <span class="a-strong">Sản phẩm được mua nhiều nhất</span></h2>

            </div>
        </div>
        <div class="row">
            <?= $this->insert('../Views/card-layout/card-muanhieu') ?>
        </div>

    </div>
    <div>
        <a href="#logo" style="position: fixed;color: #ed4190;right: 10px;bottom: 5px"><img src="<?= request()->baseUrl(); ?>/assets/images/logofooter" class="top" width="60px" height="60px"></a>
    </div>
</section>

<section class="shipping-info">
    <div class="container">
        <div class="footer-sologan bg-white" style=" padding-top:30px ; padding-bottom:30px ; border-top: 5px solid #008A55">
            <div class="container" style="padding-left: 105px;">
                <div class="row row2">
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem;height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Sản phẩm an toàn</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem;height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot1.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Chất lượng cam kết</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem;height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot2.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Dịch vụ vượt trội</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
                        <div class="card over" style="width: 11rem; height: 11rem;">
                            <img src="<?= request()->baseUrl(); ?>/assets/images/footer/bot3.png" class="img-fluid img-fluid2">
                            <h5 style="font-size: 18px; text-align: center;">Giao hàng nhanh</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>