<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>
  <form action="index.php?act=listsp" method="POST">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=addsp" title="Thêm"><i class="fas fa-plus"></i>
                  Tạo mới sản phẩm</a>
              </div>
            </div>
            <table class="table table-hover " style="width: 100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th width="150">TÊN SẢN PHẨM</th>
                  <th scope="col">HÌNH ẢNH</th>
                  <th scope="col">GIÁ</th>
                  <th scope="col">MÔ TẢ</th>
                  <th scope="col">LƯỢT XEM</th>
                  <th scope="col">CHỨC NĂNG</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($listsanpham as $sanpham) {
                  extract($sanpham);
                  $suasp = "index.php?act=suasp&id=" . $id;
                  $xoasp = "index.php?act=xoasp&id=" . $id;
                  $hinhpath = "../upload/" . $img;
                  if (is_file($hinhpath)) {
                    $hinh = "<img src ='" . $hinhpath . "' alt='" . $name . "' width='80'>";
                  } else {
                    $hinh = 'no photo';
                  }
                  echo '
              <tr>
                <td>' . $id . '</td>
                <td><strong>' . $name . '</strong></td>
                <td>' . $hinh . '</td>
                <td>' . number_format($price) . '</td>
                <td ><p rows="3" >' . $mota . '</p></td>
                <td><center>' . $luotxem . '</center></td>
                <td>
                  <a href="' . $suasp . '" class="btn btn-warning">
                    <i class="far fa-edit" type="button" onclick="myFunction(this)"></i> Sửa
                  </a>
                  <a href="#" class="btn btn-danger" onclick="confirmDelete(\'' . $xoasp . '\')">
                    <i class="far fa-trash-alt"></i> Xóa
                  </a>
                </td>
              </tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>

<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable();
  
  // Thời Gian
  function time() {
    var today = new Date();
    var weekday = new Array(7);
    weekday[0] = "Chủ Nhật";
    weekday[1] = "Thứ Hai";
    weekday[2] = "Thứ Ba";
    weekday[3] = "Thứ Tư";
    weekday[4] = "Thứ Năm";
    weekday[5] = "Thứ Sáu";
    weekday[6] = "Thứ Bảy";
    var day = weekday[today.getDay()];
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    nowTime = h + " giờ " + m + " phút " + s + " giây";
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    today = day + ', ' + dd + '/' + mm + '/' + yyyy;
    tmp = '<span class="date"> ' + today + ' - ' + nowTime +
      '</span>';
    document.getElementById("clock").innerHTML = tmp;
    clocktime = setTimeout("time()", "1000", "Javascript");

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  }
  
  // Confirmation dialog for delete
  function confirmDelete(url) {
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
      window.location.href = url; 
    }
  }
</script>

</body>

</html>