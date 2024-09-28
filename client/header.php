<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from htmldemo.net/subas/subas/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:26:30 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Subas || Home-6</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">
    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="lib/css/nivo-slider.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="css/style-customizer.css">
    <link href="#" data-style="styles" rel="stylesheet">
    
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>

    <!-- Other head elements -->
</head>
<style>
    #totalProduct {
        color: #fff;
        background-color: red;
        font-size: 12px;
        padding: 5px;
        border-radius: 50%;
    }
</style>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- START HEADER AREA -->
        <header class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 d-none d-md-block">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    <li>
                                        <a href="index.php?act=dangnhap">
                                            <i class="zmdi zmdi-lock"></i>
                                            Tài Khoản
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-middle-area -->
            <div class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-lg-2 col-md-4">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="img/logo/logo.png" alt="main logo">
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-lg-8 d-none d-lg-block">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="index.php">Trang Chủ</a>
                                        </li>
                                        <li class="mega-parent"><a href="index.php?act=sanpham">Danh Sách Sản Phẩm</a>
                                        </li>
                                
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-lg-2 col-md-8">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                            <button class="search-toggle">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                            <form action="index.php?act=sanpham" method="POST">
                                                <div class="top-search-box">
                                                    <input type="text" id="" placeholder="Tìm Kiếm " name="keyword">
                                                    <button type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <!-- total-cart -->
                                    <div class="total-cart f-left">
                                        <div class="total-cart-in">
                                            <div class="cart-toggler">
                                                <a href="index.php?act=listCart">
                                                    <br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                    <span id="totalProduct"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER AREA -->

        <!-- END MOBILE MENU AREA -->