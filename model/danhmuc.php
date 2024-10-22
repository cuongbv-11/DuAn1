<?php
require_once 'pdo.php'; 

function insert_danhmuc($tenloai) {
    $sql = "INSERT INTO `danhmuc`(`name`) VALUES ('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id) {
    $sql = "DELETE FROM `danhmuc` WHERE id=" . $id;
    pdo_execute($sql);
}

function loadone_danhmuc($id) {
    $sql = "SELECT * FROM `danhmuc` WHERE id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function loadall_danhmuc() {
    $sql = "SELECT * FROM `danhmuc` ORDER BY name";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function update_danhmuc($id, $tenloai) {
    $sql = "UPDATE `danhmuc` SET `name`='" . $tenloai . "' WHERE id=" . $id;
    pdo_execute($sql);
}

function load_ten_dm($iddm) {
    if ($iddm > 0) {
        $sql = "SELECT * FROM sanpham WHERE id=" . $iddm;
        $dm = pdo_query_one($sql);
        
        // Kiểm tra xem $dm có phải là một mảng không
        if ($dm) {
            extract($dm);
            return $name; // Trả về tên danh mục
        } else {
            return ""; // Hoặc bạn có thể trả về một thông báo lỗi
        }
    } else {
        return ""; // Nếu ID không hợp lệ
    }
}