<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<section class="vh-80" style="background-color:rgb(219, 238, 255);">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-5 col-xl-4">
        <img style="align-items:center ;margin-left:23%;"
          src="<?= request()->baseUrl(); ?>/assets/images/logo/logo.png" class="img-fluid" alt="Sample image">
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







        <form class="row g-3 needs-validation" action="/register" method="POST" id="form_register" novalidation>

          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-title " style="text-align: center;">
                  <h2 class="a-h2">Đăng kí tài khoản</h2>
                </div>
              </div>
            </div>


            <table>
              <tr>
                <td>
                  <div class="form-outline mb-3">
                    <label class="form-label" for="username">Tên đăng nhập</label>
                    <input type="username" name="username" value="<?= $params['username'] ?? null ?>"
                      class="form-control " id="username" placeholder="Your username" required>
                  </div>
                </td>
                <td>
                  <div class="form-outline mb-3">
                    <label class="form-label" for="diachi">Địa chỉ </label>
                    <input type="text" name="diachi" value="<?= $params['diachi'] ?? null ?>" class="form-control"
                      id="email" placeholder="Your Addresss" required>
                  </div>

                <td>
              </tr>


              <tr>
                <td>
                  <div class="form-outline mb-3">
                    <label class="form-label" for="email">Địa chỉ Email</label>
                    <input type="email" name="email" value="<?= $params['email'] ?? null ?>" class="form-control"
                      id="email" placeholder="Your email" required>

                  </div>
                </td>
                <td>
                  <div class="form-outline mb-3">
                    <label class="form-label" for="sdt">Số điện thoại</label>
                    <input type="text" name="sdt" value="<?= $params['sdt'] ?? null ?>"
                      class="form-control <?= isset($errors['sdt']) ? 'is-invalid' : '' ?>" id="sdt"
                      placeholder="Your Number Phone" required>
                    <div class="invalid-feedback">
                      <?= $errors['sdt'] ?? null; ?>
                    </div>

                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-outline mb-3">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" value="<?= $params['password'] ?? null ?>"
                      class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password"
                      placeholder="Your password" required>

                    <div class="invalid-feedback">
                      <?= $errors['password'] ?? null; ?>
                    </div>


                  </div>
                </td>
                <td>
                  <div class="form-outline mb-3">
                    <label for="confirm_password">Nhập lại mật khẩu</label>
                    <input type="password" name="confirm_password" value="<?= $params['confirm_password'] ?? null ?>"
                      class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>"
                      id="confirm_password" placeholder="Confirm Password" required>

                    <div class="invalid-feedback">
                      <?= $errors['confirm_password'] ?? null; ?>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="2">

                  <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check mb-0">

                      <input type="checkbox" required class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1"> Tôi đồng ý và tuân thủ các <a
                          style="margin-top:5px;" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                          điều khoản
                        </a> được quy định</label>

                    </div>

                  </div>

                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;width:100%;">Đăng kí</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0 center "></p>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                <div class="form-outline mb-3">
                  Bạn đã có tài khoản ?<a href="/login" style="color:red;"> Đăng nhập</a>
                </div>
                </td>
              </tr>

            </table>
          </div>

        </form>

      </div>
    </div>
  </div>
  </div>
</section>
<?php $this->stop() ?>