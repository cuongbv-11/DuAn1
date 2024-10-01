<?php
if (isset($bill)) {
    extract($bill);
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
                    <option value="0" <?php echo ($trangthai == 0) ? 'selected' : ''; ?>>Chờ Duyệt Đơn</option>
                    <option value="1" <?php echo ($trangthai == 1) ? 'selected' : ''; ?>>Người Gửi Đang Chuẩn Bị Hàng</option>
                    <option value="2" <?php echo ($trangthai == 2) ? 'selected' : ''; ?>>Đang giao hàng</option>
                    <option value="3" <?php echo ($trangthai == 3) ? 'selected' : ''; ?>>Đã giao hàng</option>
                    <option value="4" <?php echo ($trangthai == 4) ? 'selected' : ''; ?>>Đã Hủy</option>
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