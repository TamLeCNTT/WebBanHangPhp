<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="min-height:10vh!important;" id="accordionSidebar">


    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hello<sup>2</sup></div>
    </a>
    <hr class="sidebar-divider my-0">
    <?php $username = auth()->username;

    use App\Models\User;

    $user = User::where('username', $username)->first();  ?>

    <li class="nav-item ">
        <a class="nav-link" href="<?= '/cuahang/sanphamcuahang/' . $user->id_nguoidung ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sản phẩm</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Sự kiện
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="/cuahang/donhang/1" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Đơn hàng</span>
        </a>

    </li>
    <li class="nav-item ">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities" href="<?= '/khuyenmai' ?>">
            <i class="fas fa-cart-arrow-down"></i>
            <span>Khuyến mãi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/cuahang/chat/0" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Chat</span>
        </a>

    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Doanh thu
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/cuahang/chart/<?= $user->id_nguoidung ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Thống kê</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>