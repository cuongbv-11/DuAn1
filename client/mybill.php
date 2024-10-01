
<section id="page-content" class="page-wrapper section">
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav cart-tab">
                        <li>
                            <a href="index.php?act=mybill">
                                <span>02</span>
                                Đơn mua
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

                                                <th>Tên sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Đơn Giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                                <th>Trạng Thái</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order">
                                            <?php foreach ($lishdh as $bill) {
                                                $hinh = $img_path . $bill['img'];
                                                $trangthai = $bill['trangthai'];
                                                $ttdh = get_ttdh($trangthai);
                                                $shippingFee = 15000;
                                            ?>
                                                <tr align="center">

                                                    <td><?php echo $bill['pro_name'] ?><br></td>
                                                    <td><img src="<?php echo $hinh ?>" alt="" width="200px" ;></td>
                                                    <td><?php echo number_format($bill['giamua']) ?> đ</td>
                                                    <td><?php echo $bill['soluong'] ?></td>
                                                    <td><?php echo number_format($bill['thanhtien'] + $shippingFee, 0, ",", ".");  ?> đ</td>
                                                    <td><?php echo $ttdh ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>