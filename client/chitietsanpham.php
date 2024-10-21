<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
$isLoggedIn = isset($_SESSION['user']);
?>
<script>
    let totalProduct = document.getElementById('totalProduct');
    let isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

    function addToCart(productId, productName, productPrice) {
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
                success: function(response) {
                    totalProduct.innerText = response;
                    alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!')
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }

    function buyNow(productId, productName, productPrice) {
        if (isLoggedIn) {
            $.ajax({
                type: 'POST',
                url: './client/buyNow.php',
                data: {
                    buy_now: true,
                    id: productId,
                    name: productName,
                    price: productPrice
                },
                success: function(response) {
                    // Check if the response indicates success or an error
                    if (response === 'success') {
                        // Redirect only if the user is logged in
                        window.location.href = 'index.php?act=order2';
                    } else {
                        // alert(response); // Display the error message
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            alert('Bạn cần đăng nhập để mua sản phẩm.');
        }
        return false; // Prevent form submission
    }
</script>
<!-- Start page content -->


<section id="page-content" class="page-wrapper section">
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <?php extract($sanpham); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- single-product-area start -->
                    <div class="single-product-area mb-80">
                        <br>
                        <div class="row">
                            <!-- imgs-zoom-area start -->
                            <div class="col-lg-5">
                                <div class="imgs-zoom-area">
                                    <?php
                                    $hinh = $img_path . $img;
                                    echo '<img id="zoom_03" src="' . $hinh . '"
                                    data-zoom-image="' . $hinh . '" alt="">';
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                <?php
                                                $hinh = $img_path . $img;
                                                echo ' <div class="p-c">
                                                    <a href="#" data-image="' . $hinh . '" data-zoom-image="' . $hinh . '">
                                                        <img class="zoom_03" src="" alt="">
                                                    </a>
                                                </div>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- imgs-zoom-area end -->
                            <!-- single-product-info start -->
                            <div class="col-lg-7">
                                <div class="single-product-info">
                                    <h2><strong>
                                        <?php echo  $name; ?>
                                        <hr>
                                        </strong>
                                    </h2>
                                    <?php echo  $mota; ?>
                                    <br>
                                    <br>
                                    <h3 class="pro-price"><?php
                                                            echo number_format($price) ?> ₫
                                    </h3>
                                    <br>
                                    <br>
                                    <div>
                                        <?php if ($isLoggedIn) { ?>
                                            <a href="index.php?act=order2" class="button extra-small button-black" tabindex="-1">
                                                <span data-id="<?= $id ?>" class="btnCart" onclick="buyNow(<?= $id ?>, '<?= $name ?>', <?= $price ?>)" name="order2">Mua Ngay</span>
                                            </a>
                                            <a href="" class="button extra-small button-black" tabindex="-1">
                                                <span data-id="<?= $id ?>" class="btnCart" onclick="addToCart(<?= $id ?>, '<?= $name ?>', <?= $price ?>)">Thêm vào giỏ hàng</span>
                                            </a>
                                        <?php } else { ?>
                                            <h2>Bạn cần <a href="index.php?act=dangnhap" style="color: red;">Đăng nhập</a> tài khoản để mua sản phẩm.</h2>
                                            <h4>Bạn chưa có tài khoản? <a href="index.php?act=dangky" style="color: orange;">Đăng ký</a> ngay.</h4>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-info end -->
                        </div>
                        <!-- single-product-tab -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- hr -->
                                <hr>
                                <div class="single-product-tab reviews-tab">
                                    <ul class="nav mb-20">
                                        <li><a class="active" href="#description" data-bs-toggle="tab">Thông tin sản phẩm</a></li>
                                        <li><a href="#reviews" data-bs-toggle="tab">Bình luận về sản phẩm</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active show" id="description">
                                            <p><?php
                                                echo "$mota";
                                                ?></p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="reviews">
                                            <!-- reviews-tab-desc -->
                                            <div class="reviews-tab-desc">
                                                <!-- single comments -->
                                                <?php foreach ($binhluan as $value) :
                                                    $hinh =  $img_path . $img; ?>
                                                    <div class="media mt-30">
                                                        <div class="media-left">
                                                            <!-- <a href="#"><img class="media-object" src="<?php echo ['hinh'] ?>" alt="#" height="70px" width="70px"></a> -->
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="clearfix">
                                                                <div class="name-commenter pull-left">
                                                                    <h6 class="media-heading"><a href="#"><?php echo $value['user'] ?></a>
                                                                    </h6>
                                                                    <p class="mb-10"><?php echo date("d/m/Y", strtotime($value['ngaybinhluan'])) ?></p>
                                                                </div>
                                                                <div class="pull-right">
                                                                </div>
                                                            </div>
                                                            <p class="mb-0"><?php echo $value['noidung'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <!-- single comments -->
                                                <div class="reviews-tab-desc">
                                                    <?php if ($isLoggedIn) { ?>
                                                        <div class="media mt-30">
                                                            <form action="index.php?act=sanphamct&idsp=<?= $id ?>" method="POST">
                                                                <input type="hidden" name="idpro" value="<?= $id ?>">
                                                                <input type="hidden" name="iduser" value="<?= isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '' ?>">
                                                                <label for="comment">Comment:</label>
                                                                <input type="text" name="noidung">
                                                                <input type="submit" name="guibinhluan" value="Gửi bình luận">
                                                            </form>
                                                        </div>
                                                    <?php } else { ?>
                                                        <h3 style="text-align: center;">Bạn cần <a href="index.php?act=dangnhap" style="color: red;">Đăng nhập</a> tài khoản để bình luận.</h3>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <!-- single-product-area end -->
                        <div class="related-product-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title text-start mb-40">
                                        <h2 class="uppercase">Sản Phẩm Cùng Loại</h2>
                                    </div>
                                    <div class="active-related-product">
                                        <?php foreach ($sanphamcl as $value) {
                                            extract($value);
                                            $i = 0;
                                            $hinh =  $img_path . $img;
                                            if (($i == 2) || ($i == 5) || ($i == 8)) {
                                                $mr = "";   
                                            } else {
                                                $mr = "mr";
                                            }
                                            $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                            echo '<div class="col-lg-3 col-md-4 ' . $mr . '">
                                                    <div class="product-item">
                                                        <div class="product-img">
                                                            <a href="' . $linksp . '">
                                                                <img src="' . $hinh . '" alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="product-info">
                                                            <h6 class="product-title">
                                                                <a href="single-product-no-sidebar.html">' . $name . '</a>
                                                            </h6>
                                                           
                                                            <h3 class="pro-price">' . number_format($price) . 'đ</h3>
                                                        
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- SHOP SECTION END -->

</section>

<!-- End page content -->




<!-- END QUICKVIEW PRODUCT -->


<!--style-customizer end -->

<!-- Body main wrapper end -->


<!-- Placed JS at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="js/vendor/jquery-3.6.0.min.js"></script>
<script src="js/vendor/jquery-migrate-3.3.2.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- jquery.nivo.slider js -->
<script src="lib/js/jquery.nivo.slider.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="js/main.js"></script>

</body>


<!-- Mirrored from htmldemo.net/subas/subas/single-product-no-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:26:35 GMT -->

</html>