<?php
function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id desc limit 0,8";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by price desc limit 0,8";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "INSERT INTO `sanpham`(`name`, `price`, `img`, `mota`,`iddm`) VALUES ('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "DELETE FROM `sanpham` WHERE id=" . $id;
    pdo_execute($sql);
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM `sanpham` WHERE id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function loadall_sanpham($kyw="", $iddm=0)
{
    $sql = "SELECT * FROM `sanpham` where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm='" . $iddm . "' ";
    }
    $sql .= " ORDER BY id desc  limit 0,12 ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function  update_sanpham($iddm,$id,$tensp, $giasp,$mota,$hinh)
{
    if ($hinh!="") 
        $sql = "UPDATE `sanpham` SET `iddm`='" . $iddm . "', `name`='" . $tensp . "',`price`='" . $giasp . "',`mota`='" . $mota . "',`img`='" . $hinh . "' WHERE id=" . $id;
    else 
        $sql = "UPDATE `sanpham` SET `iddm`='" . $iddm . "', `name`='" . $tensp . "',`price`='" . $giasp . "',`mota`='" . $mota . "' WHERE id=" . $id; 
        pdo_execute($sql);
}
function load_sanpham_cungloai($id, $iddm){
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
function loadone_sanphamCart ($idList) {
    $sql = 'SELECT * FROM sanpham WHERE id IN ('. $idList . ')';
    $sanpham = pdo_query($sql);
    return $sanpham;
}