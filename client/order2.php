<style>
    h2 {
        margin-bottom: 20px;
        font-size: 24px;
        text-align: center;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"] {
        padding: 8px 10px;
        width: 300px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        margin-top: 15px;
    }

    .page-order {
        display: flex;
    }

    .form-order {
        width: 70%;
    }

    .sub-order {
        width: 30%;
    }

    .sub-order td,
    .sub-order th {
        padding: 5px;
    }

    .sub-order td:first-child,
    .sub-order th:first-child {
        width: 70%;
    }

    .sub-order td:last-child,
    .sub-order th:last-child {
        text-align: right;
    }
</style>
<?php

// Initialize or retrieve the shopping cart
if (!isset($_SESSION['buy'])) {
    $buyNowItems = $_SESSION['buy'];
    unset($_SESSION['buy']);
}


// Initialize or retrieve the "Buy Now" items

?>
<div class="tab-pane" id="checkout">
    <div class="checkout-content box-shadow p-30">
        <form action="" class="needs-validation" method="post" novalidate>
            <div class="row">
                <!-- billing details -->
                <div class="col-md-6">
                    <div class="billing-details pr-10">

                        <?php
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['user'];
                            $address = $_SESSION['user']['address'];
                            $email = $_SESSION['user']['email'];
                            $tel = $_SESSION['user']['tel'];
                        } else {
                            $name = "";
                            $address = "";
                            $email = "";
                            $tel = "";
                        }
                        ?>
                        <h6 class="widget-title border-left mb-20">Thông Tin Nhận Hàng</h6>
                        <div><input type="text" name="txthoten" placeholder="Họ và tên" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập họ và tên!
                            </div>
                        </div>
                        <div><input type="text" name="txttel" placeholder="Số điện thoại" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập số điện thoại!
                            </div>
                        </div>
                        <div><input type="text" name="txtemail" placeholder="Email" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập email!
                            </div>
                        </div>
                        <div><input type="text" name="txtaddress" placeholder="Địa chỉ" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập địa chỉ!
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <!-- our order -->
                    <div class="payment-details pl-10 mb-50">
                        <h6 class="widget-title border-left mb-20">Chi Tiết Thanh Toán</h6>
                        <table>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Thành tiền</th>
                            </tr>
                            <?php
                            foreach ($buyNowItems as $item) {

                                ?>
                                <tr>
                                    <td>
                                        <?php echo $item['name']; ?><br>
                                        <small>SL: <?php echo $item['quantity']; ?></small>
                                    </td>
                                    <td><?php echo number_format($item['quantity'] * $item['price'], 0, ",", "."); ?> ₫</td>
                                </tr>
                                <?php
                            }
                            $shippingFee = 15000;
                            ?>
                            <tr>
                                <td><b>Phí vận chuyển</b></td>
                                <td><b><?php echo number_format($shippingFee, 0, ",", "."); ?> ₫</b></td>
                            </tr>
                            <tr>
                                <td><b>Tổng tiền</b></td>
                                <td><b><?php echo number_format($_SESSION['resultTotal'] + $shippingFee, 0, ",", "."); ?>
                                        ₫</b></td>
                            </tr>
                        </table>
                    </div>
                    <!-- payment-method -->
                    <div class="payment-method">
                        <h6 class="widget-title border-left mb-20">Phương Thức Thanh Toán</h6>
                        <div id="accordion">
                            <div class="panel">
                                <h4 class="payment-title box-shadow">
                                    <input type="radio" name="pttt" id="" value="1" required> Thanh toán khi giao hàng
                                </h4>
                            </div>
                            <div class="panel">
                                <h4 class="payment-title box-shadow">
                                    <input type="radio" name="pttt" id="" value="2" required> Chuyển khoản ngân hàng
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- payment-method end -->
                    <input type="submit" value="Xác nhận đặt hàng" name="order_confirm2">
        </form>
    </div>
</div>
</form>
</div>
</div>



<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>