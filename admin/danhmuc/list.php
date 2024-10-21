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
          <table class="table table-hover " style="width: 100%">
            <thead>
              <tr>
                <th width="100">#</th>
                <th>TÊN DANH MỤC</th>
                <!-- <th width="150">Trạng thái</th> Thêm tiêu đề cho cột trạng thái -->
                <th width="150">CHỨC NĂNG</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoadm&id=" . $id;

                // Hiển thị trạng thái danh mục dưới dạng dropdown
                // $trangthai_options = '
                //   <select class="form-control" onchange="updateTrangThai(' . $id . ', this.value)">
                //     <option value="0"' . ($trangthai == 0 ? ' selected' : '') . '>Hoạt Động</option>
                //     <option value="1"' . ($trangthai == 1 ? ' selected' : '') . '>Không Hoạt Động</option>
                //   </select>';

                echo '<tr>
                 <td>' . $id . '</td>
                 <td>' . $name . '</td>
                 <td class="table-td-center">
                     <a href="' . $suadm . '" class="btn btn-warning"
                    ><i class="far fa-edit" type="button"
                    onclick="myFunction(this)"></i> Sửa</a
                  >
                  <a href="' . $xoadm . '" class="btn btn-danger"
                    ><i class="far fa-trash-alt"  type="button" id="show-emp" data-toggle="modal"
                    data-target="#ModalUP"></i> Xóa</a
                  >
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
    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log('Cập nhật trạng thái thành công');
      } else {
        console.log('Cập nhật trạng thái thất bại');
      }
    };
    xhr.send('id=' + id + '&trangthai=' + trangthai);
  }
</script>



<!--
  MODAL
-->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
  data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="row">
          <div class="form-group  col-md-12">
            <span class="thong-tin-thanh-toan">
              <h5>Chỉnh sửa thông tin nhân viên cơ bản</h5>
            </span>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label class="control-label">ID nhân viên</label>
            <input class="form-control" type="text" required value="#CD2187" disabled>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Họ và tên</label>
            <input class="form-control" type="text" required value="Võ Trường">
          </div>
          <div class="form-group  col-md-6">
            <label class="control-label">Số điện thoại</label>
            <input class="form-control" type="number" required value="09267312388">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Địa chỉ email</label>
            <input class="form-control" type="text" required value="truong.vd2000@gmail.com">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Ngày sinh</label>
            <input class="form-control" type="date" value="15/03/2000">
          </div>
          <div class="form-group  col-md-6">
            <label for="exampleSelect1" class="control-label">Chức vụ</label>
            <select class="form-control" id="exampleSelect1">
              <option>Bán hàng</option>
              <option>Tư vấn</option>
              <option>Dịch vụ</option>
              <option>Thu Ngân</option>
              <option>Quản kho</option>
              <option>Bảo trì</option>
              <option>Kiểm hàng</option>
              <option>Bảo vệ</option>
              <option>Tạp vụ</option>
            </select>
          </div>
        </div>
        <BR>
        <a href="#" style="    float: right;
        font-weight: 600;
        color: #ea0000;">Chỉnh sửa nâng cao</a>
        <BR>
        <BR>
        <button class="btn btn-save" type="button">Lưu lại</button>
        <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
        <BR>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--
  MODAL
-->

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
  function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
  }
  jQuery(function () {
    jQuery(".trash").click(function () {
      swal({
        title: "Cảnh báo",

        text: "Bạn có chắc chắn là muốn xóa nhân viên này?",
        buttons: ["Hủy bỏ", "Đồng ý"],
      })
        .then((willDelete) => {
          if (willDelete) {
            swal("Đã xóa thành công.!", {

            });
          }
        });
    });
  });
  oTable = $('#sampleTable').dataTable();
  $('#all').click(function (e) {
    $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
    e.stopImmediatePropagation();
  });

  //EXCEL
  // $(document).ready(function () {
  //   $('#').DataTable({

  //     dom: 'Bfrtip',
  //     "buttons": [
  //       'excel'
  //     ]
  //   });
  // });


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
  //In dữ liệu

  //     //Sao chép dữ liệu
  //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

  // copyTextareaBtn.addEventListener('click', function(event) {
  //   var copyTextarea = document.querySelector('.js-copytextarea');
  //   copyTextarea.focus();
  //   copyTextarea.select();

  //   try {
  //     var successful = document.execCommand('copy');
  //     var msg = successful ? 'successful' : 'unsuccessful';
  //     console.log('Copying text command was ' + msg);
  //   } catch (err) {
  //     console.log('Oops, unable to copy');
  //   }
  // });


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