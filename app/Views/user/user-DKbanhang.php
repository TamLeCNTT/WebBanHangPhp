<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<section class="vh-80" style="background-color:rgb(219, 238, 255);">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-5 col-xl-4">
        <img style="align-items:center ;margin-left:23%;" src="<?= request()->baseUrl(); ?>/assets/images/logo/logo.png" class="img-fluid" alt="Sample image">
        <h3 style="text-align:center ;">Nền tảng bán hàng online <br> được yêu thích nhất tại Việt Nam </h3>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <?php if (isset($errors)) : ?>
          <?php foreach ($errors as $error) : ?>
            <div class="row">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
        <form class="row g-3 needs-validation" action="/DKbanhang" method="POST" id="form_register">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title " style="text-align: center;">
                  <h2 class="a-h2">Đăng kí đối tác</h2>
                </div>
              </div>
            </div>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label" for="username">Tên cửa hàng</label>
            <input type="username" readonly name="username" value="<?= $_SESSION["username"] ?? null ?>" class="form-control " id="username" placeholder="Your username">
          </div>
          <div class="form-outline mb-3">
            <label class="form-label" for="diachi">Địa chỉ cửa hàng</label>
            <input type="text" name="diachi" value="<?= $params['diachi'] ?? null ?>" class="form-control" placeholder="Địa chỉ" required>
          </div>
          <div class="form-outline mb-3">
            <label class="form-label" for="diachi">Số điện thoại cửa hàng</label>
            <input type="text" name="sdt" value="<?= $params['diachi'] ?? null ?>" class="form-control" id="sdt" placeholder="Số điện thoai" required>

          </div>

          <div class="form-outline mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Loại sản phẩm:</span>

              <select required name="id_loai" style="display: block;">
                <option value="" selected>-- Chọn loại sản phẩm--</option>
                <?php foreach ($loai as $loaisanpham) : ?>
                  <option name="id_loai" value="<?php echo $loaisanpham->id ?>">
                    <?= $loaisanpham->id . " - " . $loaisanpham->name ?>
                  </option>
                <?php endforeach; ?>
              </select>

            </div>
          </div>
          <div class="form-outline mb-3">
            <label class="form-label" for="diachi"><a style="color: red;">Lưu ý : </a> Lệ phí shop sẽ là 2% của mỗi đơn hàng</label>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
              <input type="checkbox" required class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1"> Tôi đồng ý và tuân thủ các <a style="margin-top:5px;" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  điều khoản
                </a> được quy định</label>
            </div>
          </div>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Điều khoản bắt buộc
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <ul>
                    <li>
                      <?= $this->insert('../Views/user/dieukhoan') ?>
                    </li>

                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;width:100%;">Đăng kí</button>
            <p class="small fw-bold mt-2 pt-1 mb-0 center "></p>
          </div>

        </form>

      </div>
    </div>
  </div>
  </div>
</section>
<?php $this->stop() ?>