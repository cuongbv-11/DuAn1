<div class="login-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="new-customers">
                    <form action="index.php?act=dangky" method="post">
                        <h6 class="widget-title border-left mb-50">Đăng ký tài khoản mới</h6>
                        <p><small><a href="index.php?act=dangnhap">Trở về trang đăng nhập</a></small></p>
                        <div class="login-account p-30 box-shadow">
                            <input type="text" placeholder="Email" name="email">
                            <input type="text" placeholder="Tên Đăng Nhập" name="user">
                            <input type="password" placeholder="Mật Khẩu" name="pass">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Địa Chỉ" name="address">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="SĐT" name="tel">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register" name="dangky">Đăng ký</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Nhập lại</button>
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