<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
$isLoggedIn = isset($_SESSION['user']);
?>

<script>
    let totalProduct = document.getElementById('totalProduct');
    let isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

    function addToCart(productId, productName, productPrice) {
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
<div id="page-content" class="page-wrapper section">
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-1 order-1">
                    <div class="shop-content">
                    
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <?php
                                    $i = 0;
                                    foreach ($dssp as $sp) :
                                        extract($sp);
                                        $hinh =  $img_path . $img;
                                        if (($i == 2) || ($i == 5) || ($i == 8)) {
                                            $mr = "";
                                        } else {
                                            $mr = "mr";
                                        }
                                        $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                    ?>
                                        <div class="col-lg-3 col-md-4 ' . $mr . '">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="<?php echo $linksp ?>">
                                                        <img src="<?php echo $hinh ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="<?php echo $linksp ?>"><?php echo $name ?></a>
                                                    </h6>

                                                    <h3 class="pro-price"><?php echo number_format($price) ?> ₫</h3>
                                                    <ul class="action-button" style="background-color: darkred;">
                                                        <button style="color: #fff;" data-id="<?= $id ?>" class="btnCart" onclick="addToCart(<?= $id ?>, '<?= $name ?>', <?= $price ?>)">Thêm vào giỏ hàng</button>
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
                            <!-- list-view -->

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 order-lg-2 order-2">
                    <!-- widget-search -->
                    <aside class="widget-search mb-30">
                        <form action="index.php?act=sanpham" method="POST">
                            <input type="text" id="" placeholder="Tìm kiếm" name="keyword">
                            <button type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </aside>
                    <!-- widget-categories -->
                    <!-- shop-filter -->
                    <!-- widget-color -->
                    <!-- operating-system -->
                    <aside class="widget operating-system box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Hãng điện thoại</h6>
                        <form action="">
                            <?php
                            foreach ($dsdm as $dm) {
                                extract($dm);
                                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                                echo '  <li><a class="active" href="' . $linkdm . '" >' . $name . '</a></li>';
                            }
                            ?>
                        </form>
                    </aside>
                    <!-- widget-product -->
                    <aside class="widget widget-product box-shadow">
                        <h6 class="widget-title border-left mb-20">Top sản phẩm</h6>
                        <!-- product-item start -->
                        <?php
                        $i = 0;
                        foreach ($dstop10 as $sp) {
                            extract($sp);
                            $hinh =  $img_path . $img;
                            if (($i == 2) || ($i == 5) || ($i == 8)) {
                                $mr = "";
                            } else {
                                $mr = "mr";
                            }
                            $linksp = "index.php?act=sanphamct&idsp=" . $id;

                            echo '  <div class="product-item">
                            <div class="product-img">
                                <a href="' . $linksp . '">
                                    <img src="' . $hinh . '" alt="" />
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="' . $linksp . '">' . $name . '</a>
                                </h6>
                                <h3 class="pro-price">' . number_format($price) . 'đ</h3>
                            </div>
                        </div>';
                            $i += 1;
                        }
                        ?>


                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</div>