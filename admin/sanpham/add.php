<main class="app-content">
  <class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="">
            <div class="row2 font_title">
              <h1>THÊM MỚI SẢN PHẨM</h1>
            </div>
            <br>
            <form class="addPro row g-3 needs-validation" action="index.php?act=addsp" method="POST"
              enctype="multipart/form-data" novalidate>
              <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="tensp" placeholder="Nhập tên sản phẩm" required>
                <div class="invalid-feedback">
                  Vui lòng nhập tên sản phẩm!
                </div>
              </div>
              <div class="form-group">
                <label for="categories">Danh mục:</label>
                <select class="form-select" name="iddm">
                  <option selected disabled>---Vui Lòng Chọn---</option>
                  <?php
                  foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo ' <option value="' . $id . '">' . $name . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Ảnh sản phẩm:</label>
                <div class="custom-file">
                  <input type="file" name="hinh">
                </div>
              </div>
              <div class="form-group">
                <label for="validationCustomUsername" class="form-label">Giá:</label>
                <div class="input-group has-validation mb-3">
                  <span class="input-group-text" id="inputGroupPrepend">$</span>
                  <input type="text" class="form-control" name="giasp" placeholder="Nhập giá sản phẩm" required>
                  <div class="invalid-feedback">
                    Vui lòng nhập giá sản phẩm!
                  </div>
                </div>
                <div class="form-group">
                  <label>Mô tả:</label>
                  <textarea class="form-control" name="mota" rows="3" placeholder="Nhập mô tả về sản phẩm"
                    style="height: 78px;"></textarea>
                </div>
                <div class="form-group form_content">
                  <input class="a" style="background-color: rgb(0,0,255)" name="themmoi" type="submit"
                    value="Thêm Sản Phẩm">
                  <a href="index.php?act=listsp"><input type="button" value="Danh Sách Sản Phẩm"></a>
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


      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()
      </script>