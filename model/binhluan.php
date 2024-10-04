<?php
function loadall_binhluan($idpro)
{
    $sql = " SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
    LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
    LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
    WHERE sanpham.id = '" . $idpro . "'";
    $result =  pdo_query($sql);
    return $result;
}
function insert_binhluan($idpro, $noidung){
    $date = date('Y-m-d');
    $iduser = $_SESSION['user']['id'];
    $sql = "
        INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
        VALUES ('$noidung','$iduser','$idpro','$date');
    ";
    //echo $sql;
    //die;
    pdo_execute($sql);
}