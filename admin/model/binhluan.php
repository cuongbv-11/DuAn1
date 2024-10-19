<?php
function loadall_binhluan($idsp)
{
    $sql = "select * from binhluan where 1";
    if ($idsp > 0)
        $sql .= " AND idpro ='" . $idsp . "'";
    $sql .= " order by id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function insert_binhluan($idsp, $text)
{
    $iduser = $_SESSION['user']['id'];
    $date = date('Y-m-d');
    $sql = "insert into binhluan (noidung, iduser, idpro, ngaybinhluan) values ('$text','$iduser', '$idsp', '$date')";
    $result = pdo_execute($sql);
    return $result;
}
function delete_binhluan($id)
{
    $sql = "DELETE FROM binhluan WHERE id =" . $id;
    pdo_execute($sql);
}
