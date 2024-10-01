<?php
if (is_array($listtaikhoan)) {
    // var_dump($listtaikhoan);
    extract($listtaikhoan);
}
?>
<div class="row">
    <div class="row header">
        <h1>CẬP NHẬT TÀI KHOẢN</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                <select name="idtk">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        if ($idtk==$id)  $s="selected"; else $s="";
                        echo '<option value="' . $id . '"'.$s.'>' . $name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                Email<br>
                <input type="text" name="emailtk" value="<?= $email ?>">
            </div>
            <div class="row mb10">
                Tên đăng nhập<br>
                <input type="text" name="usertk" value="<?= $user ?>">
            </div>
            <div class="row mb10">
                Mật khẩu<br>
                <input type="text" name="passtk" value="<?= $pass ?>">
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>
</div>
</div>