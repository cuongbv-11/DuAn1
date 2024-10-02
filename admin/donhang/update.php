<?php
if (isset($bill)) {
    extract($bill);
    $currentStatus = $trangthai; // Lưu trạng thái hiện tại
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT ĐƠN HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatebill" method="post">
            <div class="row2 mb10 form_content_container">
                <label>Trạng Thái</label><br><br>
                <select name="trangthai">
                    <option value="0" <?php echo ($currentStatus == 0) ? 'selected' : 'disabled'; ?>>Chờ Duyệt Đơn</option>
                    <option value="1" <?php echo ($currentStatus <= 1) ? (($currentStatus == 1) ? 'selected' : '') : 'disabled'; ?>>Người Gửi Đang Chuẩn Bị Hàng</option>
                    <option value="2" <?php echo ($currentStatus <= 2) ? (($currentStatus == 2) ? 'selected' : '') : 'disabled'; ?>>Đang giao hàng</option>
                    <option value="3" <?php echo ($currentStatus <= 3) ? (($currentStatus == 3) ? 'selected' : '') : 'disabled'; ?>>Đã giao hàng</option>
                    <option value="4" <?php echo ($currentStatus < 3) ? (($currentStatus == 4) ? 'selected' : '') : 'disabled'; ?>>Đã Hủy</option>
                </select>
            </div><br>
            <div class="row mb10 ">
                <input type="hidden" value="<?php echo $id ?>" name="id">
                <input class="mr20" name="capnhatbill" type="submit" value="Cập nhật" style="background-color: rgb(0, 28, 64);">
            </div>
        </form>
    </div>
</div>
</div>