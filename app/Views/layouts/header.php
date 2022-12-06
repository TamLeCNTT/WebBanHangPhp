<header class="p-3  text-light" style="background-color:#ee4d2d ;color:white;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <div class="col-lg-1">
        <a href="/home" class="nav-link px-2 text-light">
          <img style="align-items:center; height:auto;" src="<?= request()->baseUrl(); ?>/assets/images/logo/logo.png" class="img-fluid">
        </a>
      </div>
      <div class="col-lg-7 ">
        <ul class="nav col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <img id="logo">
          <li style="padding: 0px; margin-right: 15px;"><a href="/home" class="nav-link px-2 text-light"> Home</a></li>
          <li style="padding: 0px; margin-right: 15px;"><a href="/sanphamshow" class="nav-link px-2 text-light">Sản phẩm</a></li>
          <li style="padding: 0px; margin-right: 15px;"><a href="/home/sanphamdaxem" class="nav-link px-2 text-light">Sản phẩm đã xem</a></li>
          <form class="d-flex" action="/sanpham/search" method="POST">
            <input style="width:289px;" class="form-control me-2" type="search" required id="searchKeyWord" name="searchKeyWord" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success btn btn-warning text-light;" type="submit">Search</button>
          </form>
        </ul>
      </div>
      <div class="col-lg-2 ">
        <nav id="navbar" class="navbar" style="background-color: #ee4d2d ;;">
          <ul style=" text-decoration: none;">
            <li style="padding: 0px; margin-right: 15px;">
              <a href="/sanpham/giohang" class="nav-link px-2 text-light" style="height:30px ;">

                <div class="cart"><i class="fa fa-shopping-cart" style="color:white"></i>
                  <?php if (auth() != null) :
                  ?>
                    <sup style="font-size:15px ;color:white;"><?= $_SESSION[auth()->username]["sodon"] ?? null ?>
                    </sup>
                  <?php endif; ?>
                </div>
              </a>
              <?php

              use App\Models\User;

              if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Partner') :
                $username = auth()->username;
                $user = User::where('username', $username)->first();  ?>
            <li class="" style="padding: 0px; margin-right: 15px;">
              <a href="<?= '/cuahang/sanphamcuahang/' . $user->id_nguoidung ?>" class="nav-link px-2 text-light" style="height:30px ;">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" style="color:white ;" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                  <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                </svg> </a>
            </li>
          <?php elseif (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Admin') : ?>
            <li class="" style="padding: 0px; margin-right: 15px;">
              <a href="/loaisanpham" class="nav-link px-2 text-light">Quản lí</a>
            </li>
          <?php endif ?>
          <!-- <li><a href="contact.html">Contact Us</a></li> -->

          </li>
          <li class="" style="padding: 0px; margin-right: 15px;background-color:#ee4d2d ;">
            <a href="/tintuc" class="nav-link px-2 text-light">Tin tức</a>
          </li>
          <!-- --------------------------------------------------------------------- -->
          <?php if (auth() == null) : ?>
            <li style="padding: 0px; margin-right: 15px;" class="dropdown">
              <a href="#" class="nav-link px-2 text-light">
                <div class="user">
                  <i class="lni lni-user"></i>
                  Hello Guest
                </div>
              </a>
              <ul>
                <li style="padding: 0px; margin-right: 15px;" id="nav-tem"> <a href="/login" class="nav-link px-2 text-dark">Đăng nhập</a></li>
                <li style="padding: 0px; margin-right: 15px;" id="nav-tem"><a href="/register" class="nav-link px-2 text-dark">Đăng ký</a></li>
              </ul>
            </li>
          <?php else : ?>
            <li class="user" style="padding: 0px;color:white;">

              <a style="color:white;text-decoration:none;">
                Hello <?php if (isset($_SESSION['quyen']) && $_SESSION["username"] != null) : ?>
                  <?= $_SESSION["username"] ?? null; ?>
                <?php else : ?>
                  <?= auth()->username ?>
                <?php endif; ?>
              </a>
              </a>
            </li>
            <li class="nav-tem">
              <div class="dropdown">

                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                  <img style="width:40px;height: 40px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $_SESSION["anh"] ?? 'avatar.png' ?>" class="rounded-circle" height="25" alt="" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                  <li>
                    <a class="dropdown-item" href="/profile">Thông tin cá nhân</a>
                  </li>
                  <li>
                    <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] != 'Customer') :  ?>
                      <a class="dropdown-item" href="/cuahang/chat/0">Chat</a>
                    <?php else : ?>
                      <a class="dropdown-item" href="/chat/0">Chat</a>
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php $id_trangthai = 1; ?>
                    <a class="dropdown-item" href="<?= '/sanpham/sanphamdamua/' . $id_trangthai ?>">Lịch sử mua hàng</a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="/change-password">Đổi mật khẩu</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/logout">Đăng xuất</a>
                  </li>
                  <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] != 'Partner') :  ?>
                    <li>
                      <a class="dropdown-item" href="/DKbanhang">Đăng kí đối tác</a>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          </ul>
        </nav><!-- .navbar -->
      </div>
    </div>
  </div>

</header>