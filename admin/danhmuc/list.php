<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh sách danh mục</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" href="index.php?act=adddm" title="Thêm"><i class="fas fa-plus"></i>
                Tạo mới danh mục</a>
            </div>
          </div>

          <!-- Hiển thị thông báo nếu có -->
          <?php if (isset($thongbao) && !empty($thongbao)): ?>
            <div class="alert alert-warning" role="alert">
              <?php echo $thongbao; ?>
            </div>
          <?php endif; ?>

          <table class="table table-hover" style="width: 100%">
            <thead>
              <tr>
                <th width="100">#</th>
                <th>TÊN DANH MỤC</th>
                <th width="150">CHỨC NĂNG</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoadm&id=" . $id;

                echo '<tr>
                 <td>' . $id . '</td>
                 <td>' . $name . '</td>
                 <td class="table-td-center">
                     <a href="' . $suadm . '" class="btn btn-warning">
                        <i class="far fa-edit" type="button"></i> Sửa
                     </a>
                     <a href="' . $xoadm . '" class="btn btn-danger" onclick="return confirmDelete();">
                        <i class="far fa-trash-alt" type="button"></i> Xóa
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
</main>

<script>
function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa danh mục này?");
}
</script>




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


  //Thời Gian
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
  
  //Modal
  $("#show-emp").on("click", function () {
    $("#ModalUP").modal({
      backdrop: false,
      keyboard: false
    })
  });
</script>
</body>

</html>