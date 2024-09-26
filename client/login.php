<!-- LOGIN SECTION START -->
<div id="page-content" class="page-wrapper section">
    <div class="container">
        <div class="row">
            <?php
            if ((isset($_SESSION['user']))) {
                extract($_SESSION['user']);
                echo '<div class="col-lg-8 offset-lg-2">
                <div class="my-account-content" id="accordion">
                    <!-- My Personal Information -->
                    <div class="card mb-15">
                        <div class="card-header" id="headingOne">
                            <h4 class="card-title">
                                <a data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Tài Khoản Của Tôi</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                            <div class="card-body">
                                    <div class="new-customers">
                                        <div class="p-30">
                                            <input type="text" placeholder="Email address here..."  name="user"  value="' . $email . '">
                                            <input type="text" placeholder="ten dang nhap" name="user" value="' . $user . '" >
                                            <input type="password" placeholder="Password" name="pass" value="' . $pass . '"">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Dia Chi"  name="address" value="' . $address . '">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Phone here..." name="tel" value="' . $tel . '">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

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
                                            <button class="submit-btn-1 btn-hover-1" value="Đăng nhập" name="dangnhap">Đăng Nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="widget-title border-left mb-50">
                        <?php
                        if ((isset($thongbao)) && ($thongbao != "")) {
                            echo $thongbao;
                        }
                        ?>
                    </h6>
                </div>
            <?php } ?>
        </div>