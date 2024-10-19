<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ PHP</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 20px 0;
        }

        .row2 {
            margin: 0 auto;
            padding: 20px;
            max-width: 1200px;
        }

        .font_title {
            text-align: center;
            margin-bottom: 20px;
        }

        .form_content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        canvas {
            display: block;
            margin: 0 auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .tile {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .element-button {
            margin-bottom: 20px;
        }

        .element-button a input {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .element-button a input:hover {
            background-color: #0056b3;
        }

        tfoot td {
            font-weight: bold;
            background-color: #f8f8f8;
        }

        #clock {
            font-size: 18px;
            color: #333;
            margin-top: 10px;
            text-align: right;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            position: relative;
            min-height: 100vh;
        }

        .row2 {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 300px; /* Adjust width as needed */
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .font_title {
            text-align: center;
            margin-bottom: 10px;
        }

        canvas {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
        <div class="form_content">
            <div class="mb10 formds_loai">
                <canvas id="myChart" width="350px" height="200px"></canvas>
                <script>
                    var labels = [];
                    var dataValues = [];
                    <?php foreach ($listthongke as $thongke) : ?>
                        labels.push("<?php echo $thongke['tendm']; ?>");
                        dataValues.push(<?php echo $thongke['countsp']; ?>);
                    <?php endforeach; ?>
                    var data = {
                        labels: labels,
                        datasets: [{
                            label: "Số lượng sản phẩm",
                            backgroundColor: ["red", "green", "blue", "orange", "brown"],
                            data: dataValues
                        }]
                    };
                    // Lấy thẻ canvas và vẽ biểu đồ
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: data,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</body>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Thống kê</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
              
                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
                        <thead>
                            <tr>
                                <th>TÊN DANH MỤC</th>
                                <th>SỐ LƯỢNG SẢN PHẨM</th>
                                <th>GIÁ THẤP NHẤT</th>
                                <th>GIÁ CAO NHẤT</th>
                                <th>GIÁ TRUNG BÌNH</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listthongke as $tke) {
                                extract($tke);
                                echo '<tr>
                 <td>' . $tendm . '</td>
                 <td>' . $countsp . '</td>
                 <td>' . number_format($minprice) . '₫</td>
                 <td>' . number_format($maxprice) . '₫</td>
                 <td>' .  number_format($avgprice) . '₫</td>
             </tr>';
                            }
                            ?>
                </div>
                </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <h2>Tổng Đơn Hàng</h2>
                <div class="tile-body">
                    <div class="row element-button">
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Khách Hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalAmount = 0; // Initialize the total variable
                            foreach ($listdh as $dh) {
                                extract($dh);
                                $shippingFee = 15000;
                                $tong = $thanhtien + $shippingFee;
                                $totalAmount += $tong;
                                echo '<tr>
                  <td>DA-' . $id . '</td>
                  <td>' . $hoten . '</td>
                  <td>' . $pro_name . '</td>
                  <td>' . number_format($giamua, 0, ",", ".") . ' ₫</td>
                  <td>' . $soluong . '</td>
                  <td>' . number_format($tong, 0, ",", ".") . ' ₫</td>
                  
              </tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" align="right"><strong>Tổng cộng:</strong></td>
                                <td><?php echo number_format($totalAmount, 0, ",", ".") . ' ₫'; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>
<script>
    function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("myTable").deleteRow(i);
    }
    jQuery(function() {
        jQuery(".trash").click(function() {
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
    $('#all').click(function(e) {
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
    var myApp = new function() {
        this.printTable = function() {
            var tab = document.getElementById('sampleTable');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
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
    $("#show-emp").on("click", function() {
        $("#ModalUP").modal({
            backdrop: false,
            keyboard: false
        })
    });
</script>
</body>

</html>