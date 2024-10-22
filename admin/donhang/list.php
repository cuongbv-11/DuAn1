<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh Sách Đơn Hàng</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>
  <form action="index.php?act=listdh" method="POST">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
            </div>
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="all"></th>
                  <th>ID</th>
                  <th>ID user</th>
                  <th>Họ tên</th>
                  <th>Sdt </th>
                  <th>Email</th>
                  <th>Địa Chỉ</th>
                  <th>Tổng tiền</th>
                  <th>Phương thức thanh toán</th>
                  <th>Trạng Thái</th>
                  <th>Chức Năng</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($listdonhang as $dh) {
                  extract($dh);
                  $xoadh = "index.php?act=xoadh&id=" . $id;
                  $suadh = "index.php?act=updatebill&iddh=" . $id;
                  $deleteLink = "index.php?act=xoadh&id=" . $id; 
                  $trangthai = $dh['trangthai'];
                  $ttdh = get_ttdh($trangthai);
                  $phuongthucthanhtoan = convertthanhtoan($pttt);

                  echo '<tr>
                  <td><input type="checkbox" name="" id=""></td>
                  <td>' . $id . '</td>
                  <td>' . $id_user . '</td>
                  <td>' . $hoten . '</td>
                  <td>' . $sdt . '</td>
                  <td>' . $email . '</td>
                  <td>' . $diachi . '</td>
                  <td>' . number_format($tongtien , 0, ",", ".") . ' ₫</td>
                  <td>' .  $phuongthucthanhtoan . '</td>
                  <td>' . $ttdh . '</td>
                  <td>
                      <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-status="' . $trangthai . '" data-url="' . $suadh . '"><i class="fas fa-edit"></i></button>';
                  
         
                  if ($trangthai == '0') {
                      echo '<a href="' . $deleteLink . '" class="btn btn-danger btn-sm" title="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa đơn hàng này không?\')"><i class="fas fa-trash-alt"></i></a>';
                  }

                  echo '</td>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const status = parseInt(this.getAttribute('data-status'));
            const url = this.getAttribute('data-url');

            if (status >= 3) { 
                alert('Đơn hàng đã hoàn tất và không thể chỉnh sửa.');
            } else {
                window.location.href = url; // Redirect to the edit page
            }
        });
    });
});
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
</script>

</body>

</html>