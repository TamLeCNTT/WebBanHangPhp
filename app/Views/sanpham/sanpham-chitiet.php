<?php

use App\Models\Hoadon;
use App\Models\Profile;
use App\Models\SanPham;
use App\Models\DanhGia;

$this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container" style="margin-top: 10px;">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
      <img style="width: 304px;height:300px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanpham->image ?>" class="img-fluid" />
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12 new-item">
      <div class="mainContent">
        <div class="container mt-3" style="margin:0px 0px 0px 0px !important;width:500px !important;">
          <h2 style="color: black;"><?= $sanpham->name ?></h2>
          <br>
          <!-- Nav pills -->
          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="pill" href="#home">Mô tả</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="pill" href="#menu1">Thông tin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="pill" href="#menu2">Đánh giá</a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
              <p><?= $sanpham->mota ?></p>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
              <table data-toggle="table" data-mobile-responsive="true" data-check-on-init="true" class="table table-striped table-light table-hover">
                <thead>
                  <tr>
                    <td>Xuất Xứ</td>
                    <td><?= $sanpham->noisanxuat->name ?></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bảo quản</td>
                    <td>
                      <?= $sanpham->baoquan ?></td>
                  </tr>
                  <tr>
                    <td>Số Lượng trong kho</td>
                    <td><?= $sanpham->soluong ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="menu2" class="container tab-pane fade  scrollbar ">

              <div class="mt-5" id="review_content" style="overflow-x:auto;height:300px;">
                <?php
                $danhgia = DanhGia::where('id_sanpham', $sanpham->id)->get();
                foreach ($danhgia as $danhgia) :
                  $profile = Profile::where('user_id', $danhgia->id_nguoidung)->first();
                ?>

                  <div class="row mb-4">

                    <div class="col-sm-2">
                      <img style="height:40px;width:40px" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $profile->avatar ?? 'avatar.png' ?>" class="rounded-circle" alt="" loading="lazy" />




                    </div>

                    <div class="col-sm-10">

                      <div class="card">

                        <div class="card-header" style="margin-left:1px ;"><b><?= $profile->username ?></b></div>

                        <div class="card-body">


                          <?php


                          for ($i = 0; $i < ceil($danhgia->sosao); $i++) : ?>
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
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 new-item" style="margin-bottom:15px;padding-left:250px;">
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

      </a>
    </div>
    <div class="row">

      <hr>
      <div class="col-lg-1 col-md-6 col-sm-12 new-item" style="width:100px ;">

        <?php
        $profile = Profile::where('user_id', $sanpham->user->id_nguoidung)->first();

        ?>
        <a href="/cuahang/sanphamcuahang/<?= $sanpham->id_cuahang ?>">
          <img style="width:80px;height: 80px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $profile->avatar ?>" class="rounded-circle" height="25" alt="" loading="lazy" />

        </a>
        <br>



      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 new-item">
        <a href="/cuahang/sanphamcuahang/<?= $sanpham->id_cuahang ?>" style="font-size: 18px;">
          <?= $profile->username ?? $sanpham->user->username ?>
        </a>
        <br>

        <form action="/chat/<?= $sanpham->id_cuahang ?>" method="GET" style="float:left;">
          <button class="btn btn-outline-secondary"><i class='far fa-comments'></i> Chat ngay</button>
        </form>
        <form action="/cuahang/sanphamcuahang/<?= $sanpham->id_cuahang ?>" style="margin-left:150px ;" method="GET">
          <button class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
              <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
            </svg> Xem shop</button>
        </form>
      </div>
    </div>
    <div class="row" style="float:none ;">
      <br>
      <hr>

      <h3>Sản phẩm liên quan</h3>
      <?php
      $sanpham = SanPham::where('id_loai', $sanpham->id_loai)->where('id', '!=', $sanpham->id)->where('soluong', '>', 0)->get();
      foreach ($sanpham as $sanpham) :
      ?>
        <div class="col-lg-3">
          <a href="<?= "/sanpham/chitietsanpham/" . $sanpham->id ?>">
            <div class="card card-1" style="width: 18rem;margin-bottom:10px;">
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
                  <?php endfor; ?></span> | Đã bán : <?= $counts ?>
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
  </div>
</div>

<?php $this->stop(); ?>