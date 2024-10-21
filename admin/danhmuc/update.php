<?php
if (is_array($dm)) {
  extract($dm);
}
?>
<main class="app-content">
  <class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="">
            <div class="row2 font_title">
              <h1>CẬP NHẬT DANH MỤC</h1>
            </div>
            <br>
              <form action="index.php?act=updatedm" method="POST" class="row g-3 needs-validation" novalidate>
                <div>
                  <label class="form-label">Tên Danh Mục:</label>
                  <input type="text" class="form-control" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name; ?>" placeholder="Nhập Tên Danh Mục" required>
                  <div class="invalid-feedback">
                    Vui lòng nhập tên danh mục!
                  </div>
                </div>
            <div class="form_content">
            <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
              <input class="a" style="background-color: rgb(0,0,255)" name="capnhat" type="submit"
                value="Cập Nhật Danh Mục">
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