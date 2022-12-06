<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>YShop Việt Nam | Mua và bán hàng hóa online </title>
    <meta name="description" content="" />
    <link rel="shortcut icon" type="image/png" href="/assets/images/logo/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/all.min.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/sb-admin-2.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style>
        .checked {
            color: orange;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }
    </style>



    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/btn.css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- insert specific page's css -->
    <?= $this->section('css') ?>
</head>

<body>
    <!-- Header section -->
    <?= $this->insert('layouts/header') ?>
    <!-- Content section -->
    <?= $this->section('page') ?>
    <!-- Footer section -->
    <?= $this->insert('layouts/footer') ?>
    <?= $this->insert('layouts/logout_modal') ?>
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/tiny-slider.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/glightbox.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/sweetalert2.all.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/c" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <script src="<?= request()->baseUrl(); ?>/assets/js/sb-admin-2.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/Chart.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Thêm thông báo Flash messages -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function int(value) {
            return parseInt(value);
        }

        // this checks the value and updates it on the control, if needed
        function checkValue(sender) {
            let min = sender.min;
            let max = sender.max;
            let value = int(sender.value);
            if (value > max) {
                alert("Sản phẩm chỉ còn " + max + " sản phẩm. Khách thông cảm nha!")
                sender.value = max;
            } else if (value < min) {
                sender.value = min;
            }
        }
    </script>
    <?= $this->insert('layouts/notifications'); ?>
    <!-- insert specific page's scripts -->
    <?= $this->section('js') ?>
</body>

</html>