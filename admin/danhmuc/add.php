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
                <div class="col-md-3 mb-3">
                  <label class="form-label">Trạng Thái:</label>
                  <select class="form-select" required>
                    <option selected disabled value="">Chọn...</option>
                    <option value="0"' . ($trangthai == 0 ? ' selected' : '' ) . '>Hoạt Động</option>
                    <option value="1"' . ($trangthai==1 ? ' selected' : '' ) . '>Không Hoạt Động</option>
                    </select>' <div class="invalid-feedback">
                      Vui lòng chọn!
                </div>
            </div>
            <div class="col-12 form_content">
              <input class="a" style="background-color: rgb(0,0,255)" name="themmoi" type="submit"
                value="Thêm Danh Mục">
              <a href="index.php?act=listdm"><input type="button" value="Danh Sách Danh Mục"></a>
            </div>
            </form>
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