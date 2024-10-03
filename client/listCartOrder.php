<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
            color: #555;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    
        button:hover {
            background-color: #e53935;
        }
    </style>

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
                            <div class="tab-content">
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                        <div class="table-content table-responsive mb-50">
                                            <table class="text-center">
                                                <thead>
                                                    <tr align="center">
                                                        <td>STT</td>
                                                        <td>ẢNH SẢN PHẨM</td>
                                                        <td>TÊN SẢN PHẨM </td>
                                                        <td>GIÁ </td>
                                                        <td>SỐ LƯỢNG </td>
                                                        <td>TỔNG TIỀN </td>
                                                    </tr>
                                                </thead>
                                                <tbody id="order">
                                                    <?php
                                                    $sum_total = 0;
                                                    foreach ($dataDb as $key => $product) :
                                                        $quantityInCart = 0;
                                                        foreach ($_SESSION['cart'] as $item) {
                                                            if ($item['id'] == $product['id']) {
                                                                $quantityInCart = $item['quantity'];
                                                                break;
                                                            }
                                                        }
                                                    ?>
                                                        <tr align="center">
                                                            <td><?= $key + 1 ?></td>
                                                            <td>
                                                                <img src="<?= $img_path . $product['img'] ?>" alt="<?= $product['name'] ?>" style="width: 100px; height: auto">
                                                            </td>
                                                            <td><?= $product['name'] ?></td>
                                                            <td><?= number_format((int)$product['price'], 0, ",", ".") ?> <u>đ</u></td>
                                                            <td>
                                                            <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id'] ?>" oninput="updateQuantity(<?= $product['id'] ?>, <?= $key ?>)" max="100">
                                                            </td>
                                                            <td>
                                                                <?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u>
                                                            </td>
                                                            <td>
                                                                <button onclick="removeFormCart(<?= $product['id'] ?>)">Xóa</button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $sum_total += ((int)$product['price'] * (int)$quantityInCart);
                                                        $_SESSION['resultTotal'] = $sum_total;
                                                    endforeach;
                                                    ?>
                                                    <tr>
                                                        <td colspan ="5" align="center">
                                                            <h2>Tổng tiền hàng:</h2>
                                                        </td>
                                                        <td colspan="2" align="center">
                                                            <h2>
                                                                <span id="total-price">
                                                                    <?= number_format((int)$sum_total, 0, ",", ".") ?> <u>đ</u>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
   function updateQuantity(id, index) {
    let newQuantity = $('#quantity_' + id).val();
    if (newQuantity === '') {
        newQuantity = 1;
    } else if (newQuantity <= 0) {
        newQuantity = 1;
    }

    $.ajax({
        type: 'POST',
        url: './view/updateQuantity.php',
        data: {
            id: id,
            quantity: newQuantity
        },
        success: function(response) {
            $.post('view/tableCartOrder.php', function(data) {
                $('#order').html(data);
            });
            $('#total-price').text(response + ' đ');
        },
        error: function(error) {
            console.log(error);
        },
    });
}

    function removeFormCart(id) {
        if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
            $.ajax({
                type: 'POST',
                url: './view/removeFormCart.php',
                data: {
                    id: id
                },
                success: function(response) {
                    $.post('view/tableCartOrder.php', function(data) {
                        $('#order').html(data);
                    });
                },
                error: function(error) {
                    console.log(error);
                },
            });
        }
    }

    function processSelected() {
        const selectedProducts = $('input[name="selectedProducts[]"]:checked').map(function() {
            return this.value;
        }).get();

        if (selectedProducts.length === 0) {
            alert("Vui lòng chọn ít nhất một sản phẩm để mua.");
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'store_selected_products.php',
            data: {
                selectedProducts: selectedProducts
            },
            success: function(response) {
                window.location.href = 'index.php?act=order';
            },
            error: function(error) {
                console.log(error);
            },
        });
    }
</script>