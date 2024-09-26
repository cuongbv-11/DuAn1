<?php
if (is_array($sanpham)) {
  extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
  $hinh = "<img src ='" . $hinhpath . "' height='80'>";
} else {
  $hinh = 'no photo';
}
?>
<div class="row2">
  <div class="row2 font_title">
    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
  </div>
  <div class="row2 form_content ">

    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
      <select class="row2 mb10 form_content_container" name="iddm" id="">
        <?php
        foreach ($listdanhmuc  as $danhmuc) {
          // extract($danhmuc);
          if ($iddm == $danhmuc['id']) {
            $s = "selected";
          } else {
            $s = "";
          }
          echo '<option value="' . $danhmuc['id'] . '" ' . $s . '>' . $danhmuc['name'] . '</option>';
        }
        ?>
      </select>

      <div class="row2 mb10">
        <label>Tên sản phẩm </label> <br>
        <input type="text" name="tensp" value="<?= $name ?>" placeholder="nhập vào tên">
      </div>
      <div class="row2 mb10">
        <label>Giá </label> <br>
        <input type="text" name="giasp" value="<?= $price ?>" placeholder="nhập vào giá">
      </div>
      <div class="row2 mb10">
        <label>Hình </label> <br>
        <input type="file" name="hinh" id="">
        <?= $hinh ?>
      </div>
      <div class="row2 mb10">
        <label>Mô tả </label> <br>
        <textarea name="mota" id="" cols="30" rows="10"><?= $mota ?></textarea>
      </div>

      <div class="row mb10 ">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input class="mr20" type="submit" name="capnhat" value=" CẬP NHẬT" style="background-color: rgb(0, 28, 64);">
        <input class="mr20" type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
      <?php
      if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
      }
      ?>
    </form>
  </div>
</div>
</div>