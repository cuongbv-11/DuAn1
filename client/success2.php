<?php
if (isset($_SESSION['buy']) && is_array($_SESSION['buy'])) {
    $buyNowItems = $_SESSION['buy'];
} 
?>
<div class="tab-pane" id="order-complete">
    <div class="order-complete-content box-shadow">
        <div class="thank-you p-30 text-center">
            <h6 class="text-black-5 mb-0">Cảm ơn. Đơn đặt hàng của bạn đã được nhận; Đã nhận được đơn đặt hàng của bạn.</h6>
        </div>
        <div class="row">
            <!-- our order -->
            <div class="col-md-6">
                <div class="payment-details p-30">
                    <h6 class="widget-title border-left mb-20">Đơn hàng của bạn</h6>
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        foreach ( $buyNowItems as $item) {
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
                            <td><b><?php echo number_format($_SESSION['resultTotal'] + $shippingFee, 0, ",", "."); ?> ₫</b></td>
                        </tr>
                    </table>
                </div>

            </div>
           
        </div>
    </div>
</div>
<!-- order-complete end -->
</div>