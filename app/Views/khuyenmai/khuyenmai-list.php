<?php

use App\Models\Hoadon;
use App\Models\User;

$start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>

<?php $username = auth()->username;
$user = User::where('username', $username)->first();
if ($khuyenmai->count() > 0) :
    foreach ($khuyenmai as $khuyenmaiss) :
        $sanphams = $khuyenmaiss->sanpham;
?>

        <div class="col-lg-4 col-md-6 col-sm-12 new-item " style="margin-bottom:30px;">
            <a href="<?= "/sanpham/chitietsanpham/" . $sanphams->id ?>">
                <div class="card card-1" style="width: 18rem;">
                    <div class="badge bg-dark text-white position-absolute" style="top: 0rem; right: 0rem;z-index: 1;font-size:18px;background-color:rgba(255,212,36,.9)!important;">
                        sale <br> <span style="color:red"><?= $khuyenmaiss->phantram ?>%</span>
                    </div>
                    <img class="card-img-top center " style="height:225px ;width:275px;" src="<?= request()->baseUrl(); ?>/assets/images/sanpham/<?= $sanphams->image ?>" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title" style="color:black ;">
                            <?= $sanphams->name ?>
                        </h5>

                        <a class="card-text" style="color:red ;font-size:25px;">đ<?= number_format($sanphams->giasaukhuyenmai, 0, ",", "."); ?>
                        </a>
                        <a class="card-text" style="font-size:20px;color:gray; text-decoration: line-through;">đ<?= number_format($sanphams->gia, 0, ",", "."); ?>
                        </a>

                        <br>
                        <?php
                        $counts = 0;
                        $hoadon = Hoadon::all();
                        foreach ($hoadon as  $hoadonsa) :
                            if ($hoadonsa->id_sanpham == $sanphams->id) :
                                $counts += $hoadonsa->soluong;
                            endif;
                        endforeach; ?>

                        <p>
                            <?php
                            if ($sanphams->sosaotb == 0) : $sanphams->sosaotb = 5;
                            endif;
                            for ($i = 0; $i < ceil($sanphams->sosaotb); $i++) : ?>
                                <span class="fa fa-star checked"></span>
                            <?php endfor; ?>
                            <?php for ($i = 0; $i < ceil(5 - $sanphams->sosaotb); $i++) : ?>
                                <span class="fa fa-star "></span>
                            <?php endfor; ?> | Đã bán : <?= $counts ?>
                        </p>

                        <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Partner') :  ?>

                            <a class="btn btn-primary" style="width:40% ;" href="#edit" rel="modal:open">
                                Sửa
                            </a>
                            <?= $this->insert(
                                '../Views/khuyenmai/khuyenmai-edit',
                                [
                                    'khuyenmai' => $khuyenmaiss
                                ]
                            ) ?>
                            <a class="btn btn-primary delete" style="width:40% ;text-align:center;margin-left:5%;height:35px!important;" href="<?= request()->baseUrl() ?>/khuyenmai/delete" data-id="<?= $khuyenmaiss->id ?>" title="Xóa khuyến mãi <?= $khuyenmaiss->name ?> của <?= $sanphams->name ?>" data-name="<?= $khuyenmaiss->name ?> của <?= $sanphams->name ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                Xóa
                            </a>
                        <?php else : ?>
                            <form action="/home/giohang" method="POST">
                                <button type="submit" class="btn btn-primary" style="width:50% ;margin-left:5%;">
                                    <i class="lni lni-shopping-basket"></i> Mua
                                </button>
                                <input type="number" name="soluong" id="soluong" min="1" max="<?= $sanpham->soluong ?>" value="1" style="width:30% ;text-align:center;margin-left:5%;height:35px!important;">
                                <input type="hidden" name="id" value="<?= $sanpham->id ?>">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

            </a>
        </div>

<?php

    endforeach;
endif;
?>
<?php if ($khuyenmai->count() > 0) : ?>
    <div class="pagination">
        <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
    </div>
<?php endif; ?>