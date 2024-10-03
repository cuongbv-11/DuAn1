<!-- START SLIDER AREA -->
<div class="slider-area youtube-bg bg-opacity-black-60 ptb-160 mb-20 section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-desc-3 slider-desc-4  text-center">
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="slider2-title-2">CHÀO MỪNG ĐÃ ĐẾN TRANG WEB </h1>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <h2 class="slider2-title-3"></h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SLIDER AREA -->
<!-- START PAGE CONTENT -->
<section id="page-content" class="page-wrapper section">
    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section section-bg-tb pt-80 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-start mb-20">
                        <h2 class="uppercase">Danh sách top sản phẩm</h2>
                    </div>
                    <div class="featured-product">
                        <div class="active-featured-product slick-arrow-2">
                            <?php
                            $i = 0;
                            foreach ($dstop10 as $sp) {
                                extract($sp);
                                $hinh = $img_path . $img;
                                if (($i == 2) || ($i == 5) || ($i == 8)) {
                                    $mr = "";
                                } else {
                                    $mr = "mr";
                                }
                                $linksp = "index.php?act=sanphamct&idsp=" . $id;

                                echo '<div class="product-item product-item-2 ' . $mr . '">
                             <div class="product-img">
                                 <a href="' . $linksp . '">
                                     <img src="' . $hinh . '" alt="" />
                                 </a>
                             </div>
                             <div class="product-info">
                                 <h6 class="product-title">
                                     <a href="' . $linksp . '">' . $name . '</a>
                                 </h6>
                                 <h3 class="pro-price"> ' . number_format($price) . 'đ</h3>
                                </div>
                                                    <div>
                            <ul class="action-button" style="background-color: darkred;">
                                <button style="color: #fff;" data-id="' . $id . '" class="btnCart"
                                    onclick="addToCart(' . $id . ', ' . $name . ', ' . $price . ')">Thêm vào giỏ
                                    hàng</button>
                            </ul>
                        </div>
                            
                         </div>';
                                $i += 1;

                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED PRODUCT SECTION END -->

    <!-- UP COMMING PRODUCT SECTION START -->
    <div class="up-comming-product-section ptb-60">
        <div class="container">
            <div class="row">
                <!-- up-comming-pro -->
                <div class="col-lg-8">
                    <div class="up-comming-pro gray-bg up-comming-pro-2 clearfix">
                        <div class="up-comming-pro-img f-left">
                            <a href="#">
                                <img src="upload/anh7.jpg" alt="" height="350px" width="200px">
                            </a>
                        </div>
                        <div class="up-comming-pro-info f-left">
                            <h3><a href="index.php?act=sanpham&iddm=3">XEM NGAY</a></h3>
                            <p>
                                Các điện thoại iPhone là dòng sản phẩm điện thoại thông minh do Apple Inc. phát triển và
                                sản xuất. Dòng điện thoại iPhone đã trở thành một trong những biểu tượng của thế giới
                                công nghệ, với sự kết hợp giữa thiết kế đẹp mắt, hiệu suất mạnh mẽ và hệ điều hành iOS
                                được tối ưu hóa. </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-block d-md-none d-lg-block">
                    <div class="banner-item banner-1">
                        <div class="ribbon-price">
                            <span>GIẢM GIÁ</span>
                        </div>
                        <div class="banner-img">
                            <a href="index.php?act=sanphamct&idsp=19"><img src="upload/Samsung Galaxy S23 Ultra.jpg"
                                    alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- UP COMMING PRODUCT SECTION END -->

    <!-- PRODUCT TAB SECTION START -->
    <div class="product-tab-section section-bg-tb pt-80 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title text-start mb-40">
                        <h2 class="uppercase">Sản Phẩm Mới</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- popular-product start -->
                        <div id="popular-product" class="tab-pane active show">
                            <div class="row">
                                <?php
                                $i = 0;
                                foreach ($spnew as $sp):
                                    extract($sp);
                                    $hinh = $img_path . $img;
                                    if (($i == 2) || ($i == 5) || ($i == 8)) {
                                        $mr = "";
                                    } else {
                                        $mr = "mr";
                                    }
                                    $linksp = "index.php?act=sanphamct&idsp=" . $id;

                                    ?>
                                    <div class="col-lg-3 col-md-4 <?php echo $mr ?>">
                                        <div class="product-item product-item-2 ">
                                            <div class="product-img">
                                                <a href="<?php echo $linksp ?>">
                                                    <img src="<?php echo $hinh ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="<?php echo $linksp ?>"><?php echo $name ?></a>
                                                </h6>
                                                <h3 class="pro-price"> <?php echo number_format($price) ?> ₫ </h3>
                                            </div>
                                            <div>
                                                <ul class="action-button" style="background-color: darkred;">
                                                    <button style="color: #fff;" data-id="<?= $id ?>" class="btnCart"
                                                        onclick="addToCart(<?= $id ?>, '<?= $name ?>', <?= $price ?>)">Thêm
                                                        vào giỏ hàng</button>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i += 1;
                                endforeach;
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PRODUCT TAB SECTION END -->

        <!-- BLOG SECTION START -->

        <!-- BLOG SECTION END -->

        <!-- NEWSLETTER SECTION START -->

        <!-- NEWSLETTER SECTION END -->
    </div>
</section>
<!-- END PAGE CONTENT -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
$isLoggedIn = isset($_SESSION['user']);
?>
<script>
    let totalProduct = document.getElementById('totalProduct');
    let isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

    function addToCart(productId, productName, productPrice) {
        // Kiểm tra nếu người dùng đã đăng nhập

        // Sử dụng jQuery
        if (isLoggedIn) {
            $.ajax({
                type: 'POST',
                // Đường dẫn tới tệp PHP xử lý dữ liệu
                url: './client/addToCart.php',
                data: {
                    id: productId,
                    name: productName,
                    price: productPrice
                },
                success: function (response) {
                    totalProduct.innerText = response;
                    alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!')
                },
                error: function (error) {
                    console.log(error);
                }
            });
        } else {
            alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
            window.location.href = 'index.php?act=dangnhap';
        }
    }
</script>