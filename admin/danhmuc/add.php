
<main class="app-content">
  <class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="">
            <div class="row2 font_title">
              <h1>TẠO MỚI DANH MỤC</h1>
            </div>
            <br>
              <form action="index.php?act=adddm" method="POST" class="row g-3 needs-validation" novalidate>
                <div>
                  <label class="form-label">Tên Danh Mục:</label>
                  <input type="text" class="form-control" name="tenloai" placeholder="Nhập Tên Danh Mục" required>
                  <div class="invalid-feedback">
                    Vui lòng nhập tên danh mục!
                  </div>
                </div>
                <!-- <div class="mb-4">
                <label class="form-label">Trạng Thái:</label>
                <select class="form-select" name="trangthai" required>
                  <option selected disabled value="">---Vui Lòng Chọn---</option>
                </select>
                <div class="invalid-feedback">
                      Vui lòng chọn danh mục!
                </div>
              </div>
            </div> -->
            <div class="form_content">
              <input class="a" style="background-color: rgb(0,0,255)" name="themmoi" type="submit"
                value="Thêm Danh Mục">
              <a href="index.php?act=listdm"><input type="button" value="Danh Sách Danh Mục"></a>
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
    </div>
</main>



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