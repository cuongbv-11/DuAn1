<?php
function loadall_donhang()
{
    $sql = "SELECT * FROM `tbl_order` order by id desc";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}
function delete_donhang($id)
{
    $sql = "DELETE FROM `tbl_order` WHERE id =" . $id;
    pdo_execute($sql);
}
function convertthanhtoan($thanhtoanNumber)
{
    switch ($thanhtoanNumber) {
        case 1:
            return 'Thanh toán khi giao hàng';
        case 2:
            return 'Chuyển khoản ngân hàng';
            // Thêm các trường hợp khác nếu cần
        default:
            return 'Chưa xác định';
    }
}
function loadall_chitietdonhang()
{
    $sql = "SELECT
    order_detail.id,
    order_detail.id_order,
    order_detail.id_pro,
    order_detail.giamua,
    order_detail.soluong,
    order_detail.thanhtien,
    sanpham.name as pro_name,
    tbl_order.hoten as hoten
FROM
    order_detail 
JOIN
    sanpham ON order_detail.id_pro = sanpham.id
JOIN
    tbl_order ON order_detail.id_order = tbl_order.id
ORDER BY
    order_detail.id DESC";
    $listctdonhang = pdo_query($sql);
    return $listctdonhang;
}
function addOrder($id_user, $hoten, $sdt, $email, $diachi, $tongtien, $pttt)
{
    $sql = "INSERT INTO tbl_order (id_user, hoten, sdt, email, diachi, tongtien, pttt) VALUES ($id_user, '$hoten', '$sdt', '$email', '$diachi', $tongtien, $pttt);";
    $id = pdo_executeid($sql);
    return $id;
}
function addOrderDetail($id_order, $id_pro, $giamua, $soluong, $thanhtien)
{
    $sql = "INSERT INTO order_detail (id_order, id_pro, giamua, soluong, thanhtien) VALUES ($id_order, $id_pro, $giamua, $soluong, $thanhtien );";
    pdo_execute($sql);
}
function loadallOrderDetail()
{
    $sql = "SELECT
                order_detail.id,
                order_detail.id_order,
                order_detail.id_pro,
                order_detail.giamua,
                order_detail.soluong,
                order_detail.thanhtien,
                sanpham.name as pro_name,
                sanpham.img as img,
                tbl_order.trangthai as trangthai
            FROM
                order_detail 
            JOIN
                sanpham ON order_detail.id_pro = sanpham.id
            JOIN
                tbl_order ON order_detail.id_order = tbl_order.id
            ORDER BY
                order_detail.id DESC";
    $listdh = pdo_query($sql);
    return $listdh;
}
function update_bill($id, $trangthai){
    $sql = "UPDATE tbl_order SET `trangthai` ='$trangthai' WHERE id = $id";
    pdo_execute($sql);
}
function loadone_bill($id){
    $sql="SELECT * FROM tbl_order where id=$id";
    $bill=pdo_query_one($sql);
    return $bill;
    }
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Chờ Duyệt Đơn";
            break;
        case '1':
            $tt = "Người Gửi Đang Chuẩn Bị Hàng";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Hoàn tất";
            break;
        case '4':
            $tt = "Đơn hàng đã hủy";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}