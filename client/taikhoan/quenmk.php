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
<div class="login-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="registered-customers">
                </div>
                <div class="new-customers">
                    <div class="login-account p-30 box-shadow">
                        <form action="index.php?act=quenmk" method="post">
                        <p><small><a href="index.php?act=dangnhap">Trở về trang đăng nhập</a></small></p>
                            <div class="login-account p-30 box-shadow">
                                <p>Nhập email lấy lại mật khẩu</p>
                                <input type="email" placeholder="Nhập email của bạn...." name="email">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="Gửi" name="guiemail">
                                </div>
                                <div class="col-md-6">
                                    <input class="submit-btn-1 mt-20 btn-hover-1" type="reset" value="Nhập lại">
                                </div>
                            </div>
                        </form>
                        <br>
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









</div>