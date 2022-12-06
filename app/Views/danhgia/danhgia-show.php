<?php

use App\Models\Hoadon;
use App\Models\Profile;

$this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>


<form enctype="multipart/form-data" action="/danhgia/<?= $hoadons->ID ?>" method="POST">
    <div class="container">
        <h1 class="mt-5 mb-5">Đánh giá sản phẩm <?= $sanpham->name ?></h1>
        <table style="border:1px solid black;" class="col-12">
            <tr>
                <td>
                    <div class="card-header">Thống kê</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <h1 class="text-warning mt-4 mb-4">
                                    <b><span id="average_rating"><?= $sanpham->sosaotb ?></span> / 5</b>
                                </h1>
                                <div class="mb-3">

                                    <?php
                                    if ($sanpham->sosaotb == 0) : $sanpham->sosaotb = 5;
                                    endif;
                                    for ($i = 0; $i < ceil($sanpham->sosaotb); $i++) : ?>
                                        <span class="fa fa-star checked"></span>
                                    <?php endfor; ?>
                                    <?php for ($i = 0; $i < ceil(5 - $sanpham->sosaotb); $i++) : ?>
                                        <span class="fa fa-star "></span>
                                    <?php endfor; ?>
                                </div>
                                <h3><span id="total_review"><?= $sldanhgia ?></span> Review</h3>
                            </div>
                            <div class="col-sm-4">
                                <p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_five_star_review"><?= $sl[5] ?></span>)
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" data-sl="<?= $sl[5] ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress">
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_four_star_review"><?= $sl[4] ?></span>)
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning " data-sl="<?= $sl[4] ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress">
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_three_star_review"><?= $sl[3] ?></span>)
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" data-sl="<?= $sl[3] ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress">
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_two_star_review"><?= $sl[2] ?></span>)
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" data-sl="<?= $sl[2] ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress">
                                    </div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_one_star_review"><?= $sl[1] ?></span>)
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" data-sl="<?= $sl[1] ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress">
                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h3 class="mt-4 mb-3">Đánh giá sản phẩm đi nào</h3>

                                <?php
                                if ($hoadons->danhgia == 0) : ?>
                                    <button style="margin-top:5px;width:130px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="reset_backgrounds()">
                                        Đánh giá ngay
                                    </button>
                                <?php else : ?>
                                    <button style="margin-top:5px;width:130px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="reset_backgrounds()">
                                        Đánh giá lại
                                    </button>
                                <?php endif; ?>
                                <!-- Modal -->

                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Đánh
                                                    giá</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="text-center mt-2 mb-4">
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                </h4>

                                                <div class="form-group">
                                                    <textarea name="binhluan" id="user_review" class="form-control" placeholder="Bình luận"></textarea>
                                                </div>
                                                <input type="text" id="sosao" name="sosao" hidden>
                                                <div class="form-group text-center mt-4">
                                                    <button type="submit" class="btn btn-primary" id="save_review" onclick="save()">Xong</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>






                            </div>


                        </div>
                    </div>
                </td>

            </tr>
        </table>
        <div class="mt-5" id="review_content">
            <?php foreach ($danhgia as $danhgia) :
                $profile = Profile::where('user_id', $danhgia->id_nguoidung)->first(); ?>
                <div class="row mb-3">

                    <div class="col-sm-1">

                        <h3 class="text-center"><img style="height:50px;width:80px;margin-right:0px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $profile->avatar ?? 'avatar.png' ?>" class="rounded-circle" alt="" loading="lazy" />
                        </h3>

                    </div>

                    <div class="col-sm-11">

                        <div class="card">

                            <div class="card-header"><b><?= $profile->username ?></b></div>

                            <div class="card-body">


                                <?php for ($i = 0; $i < ceil($danhgia->sosao); $i++) : ?>
                                    <span class="fa fa-star checked"></span>
                                <?php endfor; ?>
                                <?php for ($i = 0; $i < ceil(5 - $danhgia->sosao); $i++) : ?>
                                    <span class="fa fa-star "></span>
                                <?php endfor; ?>

                                <br />
                                <?= $danhgia->binhluan ?>
                            </div>

                            <div class="card-footer text-right">
                                <?= $danhgia->created_at ?>
                            </div>

                        </div>

                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>

</form>
<style>
    .progress-label-left {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }

    .star-light {
        color: #e9ecef;
    }

    .bg-yellow {
        background-color: yellow;
    }


    table>thead {
        vertical-align: top !important;
    }

    .cartDetail-img {
        height: 10rem;
    }

    #total {
        text-align: right;
    }

    .thanhtoan {
        width: 112px;
        height: 38px;
        background-color: gray;
    }

    .cart_soluong {
        width: 50px;
    }
</style>

<?php $this->stop(); ?>
<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>

<script>
    const rats = document.querySelectorAll('.progress-bar');
    var tong = 0,
        sl = 0;
    for (const rat of rats) {
        sl = rat.getAttribute('data-sl');

        tong = tong + Number(sl);

    }
    for (const rat of rats) {
        sl = Number(rat.getAttribute('data-sl'));
        rat.style.width = (sl / tong) * 100 + "%";
    }

    const boxes = document.querySelectorAll('.submit_star');

    for (const box of boxes) {

        box.addEventListener('mouseenter', function handleClick() {
            reset_backgrounds();

            var rating = $(this).data('rating');
            document.getElementById("sosao").value = rating;

            for (var count = 1; count <= rating; count++) {
                var element = document.getElementById(
                    "submit_star_" + count);

                element.classList.add('text-warning');

            }


        });



    }


    function reset_backgrounds() {
        for (var count = 1; count <= 5; count++) {

            var element = document.getElementById("submit_star_" +
                count);

            element.classList.add('star-light');
            element.classList.remove('text-warning');
        }
    }
</script>


<?= $this->insert('sanpham/sanpham-script'); ?>
<?php $this->stop(); ?>