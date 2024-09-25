<?php
include "header.php";
include "./model/pdo.php";
include "./model/danhmuc.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = $_POST['tenloai'];
                $result = insert_danhmuc($tenloai);
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
        
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
    }
include "home.php";
}
include "footer.php";
