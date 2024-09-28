<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = null;
    foreach ($_SESSION['buy'] as $item) {
        if ($item['id'] == $productId) {
            $product = $item;
            break;
        }
    }
    if ($product !== null) {
        // Display details of the purchased product
        echo '<h1>Thông tin sản phẩm</h1>';
        echo '<p>ID: ' . $product['id'] . '</p>';
        echo '<p>Tên sản phẩm: ' . $product['name'] . '</p>';
        echo '<p>Giá: ' . number_format($product['price'], 0, ",", ".") . ' đ</p>';
        echo '<p>Số lượng: ' . $product['quantity'] . '</p>';
        echo '<p>Tổng tiền: ' . number_format($product['price'] * $product['quantity'], 0, ",", ".") . ' đ</p>';
        // You can add more details if needed
    } else {
        echo '<p>Sản phẩm không tồn tại.</p>';
    }
} else {
    // Display the overall order information as before
    if (empty($dataDb)) {
        echo '<h1>Chưa có sản phẩm nào trong giỏ hàng</h1>';
    } else {
        $shippingFee = 100;
?>
        <section id="page-content" class="page-wrapper section">
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <ul class="nav cart-tab">
                                <li>
                                    <a href="index.php?act=listCart">
                                        <span>01</span>
                                        Giỏ Hàng
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- shopping-cart start -->
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                        <div class="table-content table-responsive mb-50">
                                            <table class="text-center">
                                                <thead>
                                                    <tr align="center">
                                                        
                                                        <td>STT</td>
                                                        <td>ẢNH</td>
                                                        <td>TÊN SẢN PHẨM</td>
                                                        <td>GIÁ</td>
                                                        <td>SỐ LƯỢNG</td>
                                                        <td>TỔNG TIỀN</td>
                                                        <td> CHỨC NĂNG</td>

                                                    </tr>
                                                </thead>
                                                <tbody id="order">
                                                    <?php
                                                    $sum_total = 0;
                                                    foreach ($dataDb as $key => $product) :
                                                        // kiểm tra số lượng sản phẩm trong giỏ hàng
                                                        $quantityInCart = 0;
                                                        foreach ($_SESSION['cart'] as $item) {
                                                            if ($item['id'] == $product['id']) {
                                                                $quantityInCart = $item['quantity'];
                                                                break;
                                                            }
                                                        }
                                                    ?>
                                                        <tr align="center">
                                                            <td>
                                                                <input type="checkbox" name="selectedProducts[]" value="<?= $product['id'] ?>">
                                                            </td>
                                                            <td><?= $key + 1 ?></td>
                                                            <td>
                                                                <img src="<?= $img_path, $product['img'] ?>" alt="<?= $product['name']  ?>" style="width: 100px; height: auto">
                                                            </td>
                                                            <td><?= $product['name'] ?></td>
                                                            <td><?= number_format((int)$product['price'], 0, ",", ".")  ?> <u>đ</u></td>
                                                            <td>
                                                                <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id'] ?>" oninput="updateQuantity(<?= $product['id'] ?>, <?= $key ?>)">
                                                            </td>
                                                            <td>
                                                                <?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u>
                                                            </td>
                                                            <td>
                                                                <button onclick="removeFormCart(<?= $product['id'] ?>)">Xóa</button>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                        // Tính tổng giá đơn hàng
                                                        $sum_total += ((int)$product['price'] * (int)$quantityInCart);
                                                        // Lưu tổng giá trị vào sesion
                                                        $_SESSION['resultTotal'] = $sum_total;
                                                    endforeach;
                                                    ?>
                                                    <tr>
                                                        <td colspan="5" align="center">
                                                            <h2>Tổng tiền hàng:</h2>
                                                        </td>
                                                        <td colspan="2" align="center">
                                                            <h2>
                                                                <span>
                                                                    <?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u>
                                                                </span>
                                                            </h2>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <form action="index.php?act=order" method="post">
                                            <div class="row">
                                                <input type="submit" style="padding:10px;" name="order" value="Tiến hành thanh toán">
                                            </div>
                                           
                                        </form>

                                    </div>
                                </div>
                                <!-- shopping-cart end -->
                                <!-- wishlist start -->
                                <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->
        </section>
<?php
    }
}
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // hàm cập nhật số lượng
    function updateQuantity(id, index) {
        // lấy giá trị của ô input
        let newQuantity = $('#quantity_' + id).val();
        if (newQuantity <= 0) {
            newQuantity = 1
        }

        // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
        $.ajax({
            type: 'POST',
<<<<<<< HEAD
            url: './client/updateQuantity.php',
=======
            url: './view/updateQuantity.php',
>>>>>>> 643e51cf0e74a24e7e9e7342dd058d29bfd01753
            data: {
                id: id,
                quantity: newQuantity
            },
            success: function(response) {
                // Sau khi cập nhật thành công
<<<<<<< HEAD
                $.post('client/tableCartOrder.php', function(data) {
=======
                $.post('view/tableCartOrder.php', function(data) {
>>>>>>> 643e51cf0e74a24e7e9e7342dd058d29bfd01753
                    $('#order').html(data);
                })
            },
            error: function(error) {
                console.log(error);
            },
        })
    }

    function removeFormCart(id) {
        if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
            // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
            $.ajax({
                type: 'POST',
<<<<<<< HEAD
                url: './client/removeFormCart.php',
=======
                url: './view/removeFormCart.php',
>>>>>>> 643e51cf0e74a24e7e9e7342dd058d29bfd01753
                data: {
                    id: id
                },
                success: function(response) {
                    // Sau khi cập nhật thành công
<<<<<<< HEAD
                    $.post('client/tableCartOrder.php', function(data) {
=======
                    $.post('view/tableCartOrder.php', function(data) {
>>>>>>> 643e51cf0e74a24e7e9e7342dd058d29bfd01753
                        $('#order').html(data);
                    })
                },
                error: function(error) {
                    console.log(error);
                },
            })
        }
    }

    function processSelected() {
        // Get selected product IDs
        const selectedProducts = $('input[name="selectedProducts[]"]:checked').map(function() {
            return this.value;
        }).get();

        if (selectedProducts.length === 0) {
            alert("Vui lòng chọn ít nhất một sản phẩm để mua.");
            return;
        }

        // Store selected product IDs in a session variable
        $.ajax({
            type: 'POST',
            url: 'store_selected_products.php',
            data: {
                selectedProducts: selectedProducts
            },
            success: function(response) {
                // Redirect to the order processing page
                window.location.href = 'index.php?act=order';
            },
            error: function(error) {
                console.log(error);
            },
        });
    }
</script>