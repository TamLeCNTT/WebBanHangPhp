<form enctype="multipart/form-data" class="nhaphang" action="/nhaphang/add" method="POST" style="display:none;" id="nhaphang">
    <div class="row">
        <div class="col-5">
            <div class="form-group" style="text-align: center;">
                <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Nhập thêm sản phẩm</h3>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ngày nhập hàng</span>
                </div>
                <input required type="date" value="" id="ngay" class="form-control" placeholder="Nhập số lượng" name="ngay">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên sản phẩm:</span>
                </div>
                <select name="sp" id="sp" style="display: block;">
                    <option value="0" selected>-- Chọn sản phẩm--</option>
                    <?php

                    use App\Models\Nhaphang;
                    use App\Models\NhaSanXuat;
                    use App\Models\SanPham;
                    use App\Models\User;

                    $username = auth()->username;
                    $user = User::where('username', $username)->first();

                    $nsx = SanPham::where('id_cuahang', $user->id_nguoidung)->get();
                    foreach ($nsx as $nsxs) : ?>
                        <option name="id_nsx" value="<?php echo $nsxs->name ?>">
                            <?= $nsxs->id . " - " . $nsxs->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Số lượng sản phẩm</span>
                </div>
                <input type="number" id="sl" class="form-control sl" placeholder="Nhập số lượng" name="sl">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Giá sản phẩm</span>
                </div>
                <input id="dg" type="text" class="form-control dg" placeholder="Nhập số lượng" name="dg">
            </div>

            <div class="form-group" style="text-align: center;">
                <a class="btn btn-primary btn-block them">
                    Thêm
                </a>
                <button class="btn btn-primary btn-block ">
                    Xong
                </button>
            </div>
        </div>
        <div class="col-7">
            <div class="input-group mb-3">
                <h3 class="a-h2 align-items-start" style="margin-top:20px ;">Danh sách nhập hàng</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Đơn giá</th>


                        </tr>
                    </thead>
                    <tbody id="tbody">


                    </tbody>
                </table>
            </div>
            <input required id="slhang" type="text" name="slhang" hidden>


        </div>
    </div>


</form>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    .errors {
        outline: 1px solid red;
    }
</style>
<script>
    $(document).ready(function() {
        var stt = 0;

        $(".them").click(function() {




            var ngay = $("#ngay").val();

            if (ngay != "") {

                $("#ngay").attr('readonly', 'readonly');
                $("#ngay").attr("value", ngay);
            }

            var sp = $("#sp").val();
            var sl = $("#sl").val();
            var dg = $("#dg").val();
            // <?php $nhaphang = new Nhaphang();
                //         $nhaphang->ngaynhap=$DOMDocument.;
                //         $nhaphang->soluong=`${sl}`;
                //         $nhaphang->id_sanpham=134;
                //         $nhaphang->gia=`${dg}`;
                //         $nhaphang->save();
                //  
                ?>
            // if (!ngay){
            //     $("#ngay").addClass("errors");
            // }   
            // else    {
            //     $("#ngay").removeClass("errors");
            // alert(ngay);
            if (ngay == "") {
                $("#ngay").addClass("errors");
            } else {
                $("#ngay").removeClass("errors");
                if (sp == 0) {

                    $("#sp").addClass("errors");

                } else {
                    $("#sp").removeClass("errors");
                    if (!sl) {
                        $("#sl").addClass("errors");

                    } else {
                        $("#sl").removeClass("errors");
                        if (!dg) {
                            $("#dg").addClass("errors");

                        } else {
                            stt++;
                            kt = 0;
                            $("#dg").removeClass("errors");
                            for (i = 1; i < stt; i++) {

                                spham = $("#sp" + i).val();
                                dgia = $("#dg" + i).val();
                                sluong = $("#sl" + i).val();
                                if (sp == spham && dgia == dg) {
                                    kt = 1;

                                    $("#sl" + i).val(Number(sl) + Number(sluong));
                                    $("#sl" + i).attr("value", Number(sl) + Number(sluong));
                                }


                            }
                            if (kt != 1) {
                                $('#tbody').append(`<tr> ><td  ><input readonly id="sp${stt}" name="sp${stt}" value="${sp}" style="border: none" /></td>  <td  ><input name="sl${stt}" id="sl${stt}"  value="${sl}" style="border: none" /></td> <td  ><input name="dg${stt}"  id="dg${stt}"   value="${dg}" style="border: none" /></td></tr>`);
                            }


                            var slhang = $("#slhang").val();
                            slhang = Number(slhang) + 1;
                            $("#slhang").val(slhang);

                            $("#sp").val(0);
                            $("#sl").val(null);
                            $("#dg").val(null);

                        }

                    }
                }
            }





        });
        $('.nhaphang').on('hidden.bs.modal', function() {
            // do something…
            alert("fff");
        })
    });
</script>