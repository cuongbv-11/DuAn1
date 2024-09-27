<?php
session_start();
include "model/pdo.php";
include "client/header.php";
include "model/taikhoan.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "order":
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                // print_r($cart);
                if (isset($_POST['order_confirm'])) {
                    $txthoten = $_POST['txthoten'];
                    $txttel = $_POST['txttel'];
                    $txtemail = $_POST['txtemail'];
                    $txtaddress = $_POST['txtaddress'];
                    $pttt = $_POST['pttt'];
                    if (isset($_SESSION['user'])) {
                        $id_user = $_SESSION['user']['id'];
                    } else {
                        $id_user = 0;
                    }
                    $idBill = addOrder($id_user, $txthoten, $txttel, $txtemail, $txtaddress, $_SESSION['resultTotal'], $pttt);
                    foreach ($cart as $item) {
                        addOrderDetail($idBill, $item['id'], $item['price'], $item['quantity'], $item['price'] * $item['quantity']);
                    }
                    unset($_SESSION['cart']);
                    $_SESSION['success'] = $idBill;
                    include "client/success.php";
                } else {
                    include "client/order.php";
                }
            } else {
            }
            break;
        case "order2":
            if (isset($_SESSION['buy'])) {
                $buyNowItems = $_SESSION['buy'];

                if (isset($_POST['order_confirm2'])) {

                    $txthoten = $_POST['txthoten'];
                    $txttel = $_POST['txttel'];
                    $txtemail = $_POST['txtemail'];
                    $txtaddress = $_POST['txtaddress'];
                    $pttt = $_POST['pttt'];

                    $id_user = isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0;

                    $idBill = addOrder($id_user, $txthoten, $txttel, $txtemail, $txtaddress, $_SESSION['resultTotal'], $pttt);
                    foreach ($buyNowItems as $item) {
                        addOrderDetail($idBill, $item['id'], $item['price'], $item['quantity'], $item['price'] * $item['quantity']);
                    }
                    unset($_SESSION['buy']);
                    $_SESSION['success2'] = $idBill;
                    include "client/success2.php";
                } else {
                    // Display the "Buy Now" page
                    include "client/order2.php";
                }
            } else {
            }
            break;
        case "success2":
            if (isset($_SESSION['success2'])) {
                include 'client/success2.php';
            } else {
                header("Location: index.php");
            }
            break;
        case "success":
            if (isset($_SESSION['success'])) {
                include 'client/success.php';
            } else {
                header("Location: index.php");
            }
            break;
        case "listCart":
            // Kiểm tra xem giỏ hàng có dữ liệu hay không
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');
                // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
                $idList = implode(',', $productId);
                // Lấy sản phẩm trong bảng sản phẩm theo id
                $dataDb = loadone_sanphamCart($idList);
                // var_dump($dataDb);
            }
            include "client/listCartOrder.php";
            break;
        case "buyNow":
            include "client/buyNow.php";
            break;
        case 'dangky':
            if ((isset($_POST['dangky'])) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                insert_taikhoan($email, $user, $pass, $address, $tel);
                $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập tài khoản";
                echo '
                <script>
                    if (confirm("Bạn đã đăng ký thành công. Bạn có muốn đăng nhập ngay không?")) {
                        window.location.href = "index.php?act=dangnhap";
                    }
                </script>';
                exit();
            }
            include "client/taikhoan/dangky.php";
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
            include "client/login.php";
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
            include "client/taikhoan/quenmk.php";
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
            include "client/taikhoan/edit_taikhoan.php";
            break;
    }
} else {
    include "client/home.php";
}
include "client/footer.php";
