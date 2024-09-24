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

          <div class="row element-button">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" href="index.php?act=adddm" title="Thêm"><i class="fas fa-plus"></i>
                Tạo mới danh mục</a>
            </div>
          </div>
          <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
            <thead>
              <tr>
                <th width="10"><input type="checkbox" id="all"></th>
                <th>MÃ LOẠI</th>
                <th width="150">TÊN DANH MỤC</th>
                <th width="100">Trạng thái</th> <!-- Thêm tiêu đề cho cột trạng thái -->
                <th width="100">Tính năng</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoadm&id=" . $id;

                // Hiển thị trạng thái danh mục dưới dạng dropdown
                $trangthai_options = '
                  <select class="form-control" onchange="updateTrangThai(' . $id . ', this.value)">
                    <option value="0"' . ($trangthai == 0 ? ' selected' : '') . '>HĐ</option>
                    <option value="1"' . ($trangthai == 1 ? ' selected' : '') . '>Không hoạt động</option>
                  </select>';

                echo '<tr>
                 <td><input type="checkbox" name="" id=""></td>
                 <td>' . $id . '</td>
                 <td>' . $name . '</td>
                 <td>' . $trangthai_options . '</td> <!-- Hiển thị trạng thái danh mục -->
                 <td class="table-td-center">
                    <a href ="' . $xoadm . '"><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                      onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></button></a>
                    <a href ="' . $suadm . '"><button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button></a>
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
function updateTrangThai(id, trangthai) {
  // Gửi yêu cầu AJAX để cập nhật trạng thái danh mục
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'index.php?act=updatetrangthai');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log('Cập nhật trạng thái thành công');
    } else {
      console.log('Cập nhật trạng thái thất bại');
    }
  };
  xhr.send('id=' + id + '&trangthai=' + trangthai);
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
  $('#sampleTable').DataTable();
</script>
<script>

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
  $("#show-emp").on("click", function() {
    $("#ModalUP").modal({
      backdrop: false,
      keyboard: false
    })
  });
</script>
</body>

</html>