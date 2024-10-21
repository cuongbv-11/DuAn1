<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Đơn Hàng</title>
    <style>
    /* Đặt kiểu cho toàn bộ form */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Kiểu cho tiêu đề */
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Kiểu cho nhãn và thông tin */
.form_content_container {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
}

.form_content_container label {
    display: block;
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
}

.form_content_container span {
    display: block;
    font-weight: normal;
    color: #666;
    margin-bottom: 10px;
}

/* Kiểu cho các trường input và select */
input[type="text"], input[type="email"], select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Kiểu cho nút submit */
input[type="submit"] {
    width: 100%;
    background-color: #004080;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #003366;
}

/* Kiểu cho thông tin đơn hàng */
.row2 {
    margin-bottom: 20px;
}
    </style>
</head>
<body>
    <?php
    if (isset($bill)) {
        extract($bill);
        $currentStatus = $trangthai; 
    }
    ?>

<div class="row2">
    <div class="row2 font_title">
        <h1>CHI TIẾT ĐƠN HÀNG</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=updatebill" method="post">
            <div class="row2 mb10 form_content_container">
                <label>ID Đơn Hàng:</label>
                <span><?php echo $id; ?></span>
                
                <label>Họ Tên:</label>
                <span><?php echo $hoten; ?></span>
                
                <label>Số Điện Thoại:</label>
                <span><?php echo $sdt; ?></span>
                
                <label>Email:</label>
                <span><?php echo $email; ?></span>
                
                <label>Địa Chỉ:</label>
                <span><?php echo $diachi; ?></span>
                
                
                <label>Tổng Tiền:</label>
                <span><?php echo number_format($tongtien, 0, ",", ".") . ' ₫'; ?></span>
                
                <label>Phương Thức Thanh Toán:</label>
                <span><?php echo convertthanhtoan($pttt); ?></span>
                
                <label>Trạng Thái</label>
<select name="trangthai">
    <?php if ($currentStatus <= 0): ?>
        <option value="0" <?php echo ($currentStatus == 0) ? 'selected' : ''; ?>>Chờ Duyệt Đơn</option>
    <?php endif; ?>
    
    <?php if ($currentStatus <= 1): ?>
        <option value="1" <?php echo ($currentStatus == 1) ? 'selected' : ''; ?>>Người Gửi Đang Chuẩn Bị Hàng</option>
    <?php endif; ?>
    
    <?php if ($currentStatus <= 2): ?>
        <option value="2" <?php echo ($currentStatus == 2) ? 'selected' : ''; ?>>Đang giao hàng</option>
    <?php endif; ?>
    
    <?php if ($currentStatus <= 3): ?>
        <option value="3" <?php echo ($currentStatus == 3) ? 'selected' : ''; ?>>Đã giao hàng</option>
    <?php endif; ?>
</select>
            </div>
            <div class="row mb10">
                <input type="hidden" value="<?php echo $id ?>" name="id">
                <input class="mr20" name="capnhatbill" type="submit" value="Cập nhật" style="background-color: rgb(0, 28, 64);">
            </div>
        </form>
    </div>
</div>