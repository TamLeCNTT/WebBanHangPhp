<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
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
                <form method="post" action="/change-password">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title " style="text-align: center;">
                                    <h2 class="a-h2">Đôi mật khẩu</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0"></p>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="old-password">Mật khẩu cũ</label>
                        <input type="password" name="old-password" id="old-password" class="form-control form-control-lg" placeholder="" />
                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="new-password">Mật khẩu mới</label>
                        <input type="password" name="new-password" id="new-password" class="form-control form-control-lg" placeholder="" />
                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="confirm-password">Nhập lại mật khẩu</label>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control form-control-lg" placeholder="" />
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Right -->
    </div>
</section>
<?php $this->stop() ?>