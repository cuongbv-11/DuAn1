<?php
include "header.php";
include "./model/pdo.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/donhang.php";
include "./model/taikhoan.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = $_POST['tenloai'];
                $result = insert_danhmuc($tenloai);
        
                if ($result) {
                    $thongbao = 'THÊM THÀNH CÔNG';
                } else {
                    $thongbao = 'Thêm Sản Phẩm Thành Công';
                }
                
            }
            
            include "danhmuc/add.php";
            break;
        
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
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
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                $dm = loadone_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = 'SỬA THÀNH CÔNG';
            }
            // $sql = "SELECT * FROM danhmuc order by id desc";
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
               // san pham
        case 'addsp':
            // kiem tra xem nguoi dung co click vao nut add khong
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = 'THÊM THÀNH CÔNG';
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw  = $_POST['kyw'];
                $iddm  = $_POST['iddm'];
            } else {
                $kyw  = '';
                $iddm  = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);

            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                fk_sanpham($_GET['id']);
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = 'THÊM THÀNH CÔNG';
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
            case 'listdh':
                $listdonhang = loadall_donhang();
                include "donhang/list.php";
                break;
            case 'listctdh':
                $listctdonhang = loadall_chitietdonhang();
                include "chitiet/chitietdonhang.php";
                break;
            case 'xoadh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_donhang($_GET['id']);
                }
                $listdonhang = loadall_donhang();
                include "donhang/list.php";
                break;
            case 'updatebill':
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
                break;
            case "xoatk":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
                    
    }
include "home.php";
}
include "footer.php";