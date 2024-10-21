
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách tài khoản</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover " style="width: 100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">TÊN ĐĂNG NHẬP</th>
                  <th scope="col">MẬT KHẨU</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">ĐỊA CHỈ</th>
                  <th scope="col">ĐIỆN THOẠI</th>
                  <th scope="col">Chức vụ</th>
                  <th scope="col">Chức năng</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    $xoatk = "index.php?act=xoatk&id=" . $id;
                    $chucVuInWords = convertChucVu($role);
                    echo '<td>' . $id . '</td>
                 <td>' . $user . '</td>
                 <td style="visibility: hidden">' . $pass . '</td>
                 <td>' . $email . '</td>
                 <td>' . $address. '</td>
                 <td>' . $tel . '</td>
                 <td>' . $chucVuInWords . '</td>
                 <td class="table-td-center">
                    <a href="' . $xoatk . '" class="btn btn-danger"
                    ><i class="far fa-trash-alt" onclick="myFunction(this)"  type="button" id="show-emp" data-toggle="modal"
                    data-target="#ModalUP"></i> Xóa</a
                  >
                    </td>
                  </td>
             </tr>';
                }
                ?>
                <!-- <tr>
                  <td width="10"><input type="checkbox" name="check1" value="1"></td>
                  <td>#CD12837</td>
                  <td>Hồ Thị Thanh Ngân</td>
                  <td><img class="img-card-person" src="/img-anhthe/1.jpg" alt=""></td>
                  <td>155-157 Trần Quốc Thảo, Quận 3, Hồ Chí Minh </td>
                  <td>12/02/1999</td>
                  <td>Nữ</td>
                  <td>0926737168</td>
                  <td>Bán hàng</td>
                  <td class="table-td-center"><a href ="' . $xoasp . '"><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                      onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                    </button>
                    <a href ="' . $suasp . '"><button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td width="10"><input type="checkbox" name="check2" value="2"></td>
                  <td>#SX22837</td>
                  <td>Trần Khả Ái</td>
                  <td><img class="img-card-person" src="/img-anhthe/2.jpg" alt=""></td>
                  <td>6 Nguyễn Lương Bằng, Tân Phú, Quận 7, Hồ Chí Minh</td>
                  <td>22/12/1999</td>
                  <td>Nữ</td>
                  <td>0931342432</td>
                  <td>Bán hàng</td>
                  <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                      onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td width="10"><input type="checkbox" name="check3" value="3"></td>
                  <td>#LO2871</td>
                  <td>Phạm Thu Cúc</td>
                  <td><img class="img-card-person" src="/img-anhthe/3.jpg" alt=""></td>
                  <td>Số 3 Hòa Bình, Phường 3, Quận 11, Hồ Chí Minh </td>
                  <td>02/06/1998</td>
                  <td>Nữ</td>
                  <td>0931491997</td>
                  <td>Thu ngân</td>
                  <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                        class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td width="10"><input type="checkbox"></td>
                  <td>#SR28746</td>
                  <td>Trần Anh Khoa</td>
                  <td><img class="img-card-person" src="/img-anhthe/4.jpg" alt=""></td>
                  <td>19 Đường Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh </td>
                  <td>18/02/1995</td>
                  <td>Nam</td>
                  <td>0916706633</td>
                  <td>Tư vấn</td>
                  <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                        class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td width="10"><input type="checkbox"></td>
                  <td>#KJS276</td>
                  <td>Nguyễn Thành Nhân</td>
                  <td><img class="img-card-person" src="/img-anhthe/5.jpg" alt=""></td>
                  <td>Số 13, Tân Thuận Đông, Quận 7, Hồ Chí Minh </td>
                  <td>10/03/1996</td>
                  <td>Nam</td>
                  <td>0971038066</td>
                  <td>Bảo trì</td>
                  <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                        class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td width="10"><input type="checkbox"></td>
                  <td>#BS76228</td>
                  <td>Nguyễn Đặng Trọng Nhân</td>
                  <td><img class="img-card-person" src="/img-anhthe/6.jpg" alt=""></td>
                  <td>59C Nguyễn Đình Chiểu, Quận 3, Hồ Chí Minh </td>
                  <td>23/07/1996</td>
                  <td>Nam</td>
                  <td>0846881155</td>
                  <td>Dịch vụ</td>
                  <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                        class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td width="10"><input type="checkbox"></td>
                  <td>#YUI21376</td>
                  <td>Nguyễn Thị Mai</td>
                  <td><img class="img-card-person" src="/img-anhthe/4.jpg" alt=""></td>
                  <td>Đường Số 3, Tân Tạo A, Bình Tân, Hồ Chí Minh</td>
                  <td>09/12/2000</td>
                  <td>Nữ </td>
                  <td>0836333037</td>
                  <td>Tư vấn</td>
                  <td><button class="btn btn-primary btn-sm trash" title="Xóa" onclick="myFunction()"><i
                        class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i>
                    </button>
                  </td>
                </tr> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--
  MODAL
-->
  
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
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
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
      $("#ModalUP").modal({ backdrop: false, keyboard: false })
    });
  </script>
</body>

</html>