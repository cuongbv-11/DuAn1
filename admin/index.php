<?php
session_start();
include "header.php";
include "./model/pdo.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/taikhoan.php";
include "./model/donhang.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$userRole = $_SESSION['user']['role'];

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            // Only allow admins to add categories
            if ($userRole == 1) {
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = 'THÊM THÀNH CÔNG';
                }
                include "danhmuc/add.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if ($userRole == 1) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $list_fk = fk_danhmuc($_GET['id']);
                    if (empty($list_fk)) {
                        delete_danhmuc($_GET['id']);
                    } else {
                        $thongbao = 'Danh mục còn sản phẩm, vui lòng xóa sản phẩm trước khi xóa danh mục';
                    }
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'suadm':
            if ($userRole == 1) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/update.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'updatedm':
            if ($userRole == 1) {
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao = 'SỬA THÀNH CÔNG';
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php');
                } else {
                    header('Location: login.php');
                }
            }
            break;
        case 'dangxuat':
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit();
            break;
        case 'addsp':
            if ($userRole == 1) {
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // File uploaded successfully
                    } else {
                        // Error uploading file
                    }
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                    $thongbao = 'THÊM THÀNH CÔNG';
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if ($userRole == 1) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    fk_sanpham($_GET['id']);
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'suasp':
            if ($userRole == 1) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'updatesp':
            if ($userRole == 1) {
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // File uploaded successfully
                    } else {
                        // Error uploading file
                    }
                    update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                    $thongbao = 'CẬP NHẬT THÀNH CÔNG';
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'dskh':
            if ($userRole == 1) {
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'dsbl':
            if ($userRole == 1) {
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'xoabl':
            if ($userRole == 1) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'xoatk':
            if ($userRole == 1) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
            } else {
                echo "Access denied!";
            }
            break;
        case 'thongke':
            if ($userRole == 1) {
                $listthongke = loadall_thongke();
                $listdh = loadall_chitietdonhang();
                include "thongke/list.php";
            } else {
                echo "Access denied!";
            }
            break;
            case 'bieudo':
                if ($userRole == 1) {
                    $listthongke = loadall_thongke();
                    include "thongke/bieudo.php";
                } else {
                    echo "Access denied!";
                }
                break;
            case 'listdh':
                if ($userRole == 1) {
                    $listdonhang = loadall_donhang();
                    include "donhang/list.php";
                } else {
                    echo "Access denied!";
                }
                break;
            case 'listctdh':
                if ($userRole == 1) {
                    $listctdonhang = loadall_chitietdonhang();
                    include "chitiet/chitietdonhang.php";
                } else {
                    echo "Access denied!";
                }
                break;
            case 'xoadh':
                if ($userRole == 1) {
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        delete_donhang($_GET['id']);
                    }
                    $listdonhang = loadall_donhang();
                    include "donhang/list.php";
                } else {
                    echo "Access denied!";
                }
                break;
            case 'updatebill':
                if ($userRole == 1) {
                    if (isset($_GET['iddh']) && $_GET['iddh'] > 0) {
                        $bill = loadone_bill($_GET['iddh']);
                    }
                    if (isset($_POST['capnhatbill'])) {
                        $trangthai = $_POST['trangthai'];
                        $id = $_POST['id'];
                        update_bill($id, $trangthai);
                        // Redirect to the list of orders after updating
                        header("location:index.php?act=listdh");
                        exit(); // Make sure to exit after header redirection
                    }
                    include "donhang/update.php";
                } else {
                    echo "Access denied!";
                }
                break;
            default:
                include "home.php";
                break;
        }
    } else {
        include "home.php";
    }
    include "footer.php";