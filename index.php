<?php
session_start();
include "model/pdo.php";
include "client/header.php";
include "model/taikhoan.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
      

        case 'dangky':
            if ((isset($_POST['dangky'])) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                insert_taikhoan($email, $user, $pass, $address, $tel);
                $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập tài khoản";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($user, $pass);

                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;

                    // Check if the user is an admin
                    if ($_SESSION['user']['role'] == '1') {
                        echo '<script>window.location.href = "admin/index.php";</script>';
                        exit();
                    } else {
                        echo '<script>window.location.href = "index.php";</script>';
                        exit();
                    }
                } else {
                    $thongbao = "Sai tài khoản! Kiểm tra lại thông tin đăng nhập";
                }
            }
            include "view/login.php";
            break;


        case 'quenmk':
            if ((isset($_POST['guiemail'])) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = check_email($email);
                if ((is_array($checkemail))) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại trên hệ thống!";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'edit_taikhoan':
            if ((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                $thongbao = "Đã cập nhật thành công";
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
