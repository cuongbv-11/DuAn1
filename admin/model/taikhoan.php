<?php
function insert_taikhoan($user, $pass, $email)
{
    $sql = "INSERT INTO taikhoan(user,pass,email) values ('$user','$pass','$email')";
    pdo_execute($sql);
}
function check_user($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user = :user AND pass = :pass";
    $params = [':user' => $user, ':pass' => $pass];
    $sp = pdo_query_one($sql, $params);
    return $sp;
}   
function  update_taikhoan($id, $user, $pass, $email, $address, $tel)
{
    $sql = "UPDATE taikhoan SET user='" . $user . "' ,pass='" . $pass . "',email='" . $email . "',address='" . $address . "',tel='" . $tel . "' WHERE id=" . $id;
    pdo_execute($sql);
}
function checkemail($email)
{
    $sql = "SELECT *FROM taikhoan WHERE email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function convertChucVu($chucVuNumber)
{
    switch ($chucVuNumber) {
        case 1:
            return 'Admin';
        case 2:
            return 'Khách Hàng';
            // Thêm các trường hợp khác nếu cần
        default:
            return 'Chưa xác định';
    }
}
function delete_taikhoan($id)
{
    $sql = "DELETE from taikhoan where id=" . $id;
    pdo_execute($sql);
}
