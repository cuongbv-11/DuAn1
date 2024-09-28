<main class="app-content ">
  <br>  
    <center><h1>THÊM MỚI SẢN PHẨM</h1></center>
    <br> 
    <br> 
  <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Tên Sản Phẩm:</label>
      <input type="text" name="tensp" placeholder="Nhập Tên Sản Phẩm" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Giá:</label>
      <input type="number" name="giasp"  placeholder="Nhập Giá Sản Phẩm" class="form-control" required>
    </div>
    <div class="form-floating mb-3  ">
      <select class="form-select" name="iddm" aria-label="Floating label select example">
        <?php
        foreach ($listdanhmuc as $danhmuc) {
          extract($danhmuc);
          echo ' <option value="' . $id . '">' . $name . '</option>';
        }
        ?>
      </select>
      <label for="floatingSelect">Chọn Danh Mục:</label>
    </div>
    <div class="mb-3">
      <label class="form-label">Hình Ảnh: </label>
      <input class="form-control" type="file" name="hinh">
    </div>
    <div class="form-floating mb-3">
      <textarea class="form-control" name="mota" style="height: 100px"></textarea>
      <label for="floatingTextarea2">Mô Tả: </label>
    </div>
    <input id="popUpYes"  type="submit" name="themmoi" value="Thêm">
    <a href="index.php?act=listsp"><input  id="popUpYess" type="button" value="Danh Sách Sản Phẩm"></a>
    <?php
      if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
      }
      ?>
  </form>
  settings_applicationsádsdsa
  ádsds
</main>