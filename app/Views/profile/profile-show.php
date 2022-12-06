<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Hình ảnh đại diện</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" style="width:300px;height: 300px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $profile->avatar ?? 'avatar.png' ?>">
                        <div class="input-group">
                            <span class="input-group" style="color: #fff;">Hình ảnh sản phẩm</span>
                        </div>
                        <input type="file" placeholder="Hình ảnh sản phẩm" name="image">

                        <button class="btn btn-primary" style="MARGIN: 10px;" type="submit">Cập nhật ảnh đại diện</button>
                    </div>
                </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Chi tiết tài khoản</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="small mb-1" for="inputprofilename">
                            Tên hồ sơ (cách tên của bạn sẽ hiển thị với các hồ sơ khác trên trang web)</label>
                        <input class="form-control" id="inputprofilename" required name="username" type="text" placeholder="Enter your profilename" value="<?= $profile->username ?? null ?>">
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Tên</label>
                            <input class="form-control" id="inputFirstName" name="firstname" type="text" placeholder="Enter your first name" value="<?= $profile->firstname ?? null ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Họ</label>
                            <input class="form-control" id="inputLastName" type="text" name="lastname" placeholder="Enter your last name" value="<?= $profile->lastname ?? null ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                        <input class="form-control" id="inputPhone" required type="tel" name="phone" placeholder="Enter your phone number" value="<?= $profile->phone ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Địa chỉ email</label>
                        <input class="form-control" id="inputEmailAddress" required name="email" type="email" placeholder="Enter your email address" value="<?= $profile->email ?? null ?>">
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLocation">Địa chỉ giao hàng</label>
                            <input class="form-control" id="inputLocation" required name="location" type="text" placeholder="Enter your location" value="<?= $profile->location ?? null ?>">

                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Ngày cập nhật gần nhất</label>
                            <input class="form-control" id="inputLastName" type="text" name="lastname" placeholder="Chưa cập nhật" disabled value="<?= $profile->updated_at ?? null ?>">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>