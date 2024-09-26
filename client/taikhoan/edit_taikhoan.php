<div class="login-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="new-customers">
                    <form action="index.php?act=edit_taikhoan" method="post">
                        <h6 class="widget-title border-left mb-50">Cập nhật tài khoản</h6>
                        <p><small><a href="index.php?act=dangnhap">Trở về trang đăng nhập</a></small></p>
                        <?php
                        if ((isset($_SESSION['user'])) && (is_array($_SESSION['user']))) {
                            extract($_SESSION['user']);
                        }
                        ?>
                        <div class="login-account p-30 box-shadow">
                            <input type="text" placeholder="Email" name="email" value="<?= $email ?>">
                            <input type="text" placeholder="Tên Đăng Nhập" name="user" value="<?= $user ?>">
                            <input type="password" placeholder="Mật Khẩu" name="pass" value="<?= $pass ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Địa chỉ" name="address" value="<?= $address ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Sđt" name="tel" value="<?= $tel ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register" name="capnhat">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h6 class="widget-title border-left mb-50">
                        <?php
                        if ((isset($thongbao)) && ($thongbao != "")) {
                            echo $thongbao;
                        }
                        ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>









</div>