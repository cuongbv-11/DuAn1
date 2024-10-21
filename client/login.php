<br>
<!-- LOGIN SECTION START -->
<div id="page-content" class="page-wrapper section">
    <div class="container">
        <div class="row">
            <?php
            if ((isset($_SESSION['user']))) {
                extract($_SESSION['user']);
                echo '<div class="login-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="new-customers">
            <form action="index.php?act=dangky" method="post">
                        <h6 class="widget-title border-left mb-50">Thông Tin Tài Khoản</h6>
                        <div class="login-account p-30 box-shadow">
                            <div >
                                            <input type="text" placeholder="Email address here..."  name="user"  value="' . $email . '" disabled>
                                            <input type="text" placeholder="ten dang nhap" name="user" value="' . $user . '" disabled>
                                            <input type="password" placeholder="Password" name="pass" value="' . $pass . '"" disabled>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Dia Chi"  name="address" value="' . $address . '" disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Phone here..." name="tel" value="' . $tel . '" disabled>
                                                </div>
                                            </div>
                                            <li class="form_li">
                                                <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                                            </li>
                                            <li class="form_li">
                                                <a href="index.php?act=Thoat">Đăng xuất </a>
                                            </li>
                                        </div>
                        </div>
                    </form>
                    </div>
                    </div>
                    <div class="col-lg-8 offset-lg-2">
                <div class="my-account-content" id="accordion">
                    <!-- My Personal Information -->
                    
                        </div>
                    </div>
                </div>
            </div>
            ';

                ?>
            <?php } else { ?>
                <div class="login-section mb-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="registered-customers">
                                    <h6 class="widget-title border-left mb-50">Đăng nhập tài khoản</h6>
                                    <form action="index.php?act=dangnhap" method="post">
                                        <div class="login-account p-30 box-shadow">
                                            <p>Nếu bạn có tài khoản với chúng tôi, vui lòng đăng nhập.</p>
                                            <input type="text" name="user" placeholder="Tên Đăng Nhập">
                                            <input type="password" name="pass" placeholder="Mật Khẩu">
                                            <p><small><a href="index.php?act=quenmk">Bạn không nhớ mật khẩu?</a></small></p>
                                            <p><small><a href="index.php?act=dangky">Đăng ký tài khoản</a></small></p>
                                            <button class="submit-btn-1 btn-hover-1" value="Đăng nhập" name="dangnhap">Đăng
                                                Nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="widget-title  mb-50">
                        <?php
                        if ((isset($thongbao)) && ($thongbao != "")) {
                            echo $thongbao;
                        }
                        ?>
                    </h6>
                </div>
            <?php } ?>
        </div>