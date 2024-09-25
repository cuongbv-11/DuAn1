<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Tạo Danh Mục Mới</b></a></li>
    </ul>
  </div>
<<<<<<< HEAD
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
=======
  <div class="row2 form_content ">
    <form action="index.php?act=adddm" method="POST">
      <div class="row2 mb10 form_content_container" style="display:none;">
        <label> Mã loại </label> <br>
        <input type="text" name="maloai" placeholder="nhập vào mã loại" >
      </div>
      <div class="row2 mb10">
        <label>Tên loại </label> <br>
        <input type="text" name="tenloai" placeholder="nhập vào tên">
      </div>
      <div class="row mb10 ">
        <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI" style="background-color: rgb(0, 28, 64);">
        <input class="mr20" type="reset" value="NHẬP LẠI">
>>>>>>> 072741af07c05d68d3b1cf406956dfcab646fcc3

        <form action="index.php?act=adddm" method="POST">
          <div class="mb-3 " style="display: none">
            <label> Mã loại </label> <br>
            <input type="text" name="maloai" placeholder="nhập vào mã loại">
          </div>
          <div class="mb-3 ">
            <label class="form-label">Tên Danh Mục</label>
            <input type="text" name="tenloai" class="form-control" placeholder="Nhập Tên Danh Mục" required>
          </div>
          <!-- <div class="mb-3">
            <label class="form-label">Trạng Thái</label>
            <select class="form-control">
              <option value="1">Hoạt Động</option>
              <option value="2">Tạm Ngưng</option>
            </select>
          </div> -->
          <br>
          <div class="mb-3 ">
            <input type="submit" class="" name="themmoi" value="Thêm">
            <a href="index.php?act=listdm"><input class="mr20" type="button" value="Danh Sách"></a>
          </div>
          <?php if (isset($thongbao)): ?>
            <div class="alert alert-success">
              <?php echo $thongbao; ?>

            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>

</main>