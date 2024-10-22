<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh Sách Đơn Hàng</b></a></li>
    </ul>
  </div>
  <form action="index.php?act=listctdh" method="POST">
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
                  <th>ID Order</th>
                  <th>ID pro</th>
                  <th>Giá mua </th>
                  <th>Số Lượng</th>
                  <th>Thành Tiền</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($listctdonhang as $dh) {
                  extract($dh);
                  echo '<tr>
                  <td><input type="checkbox" name="" id=""></td>
                  <td>' . $id . '</td>
                  <td>' . $id_order . '</td>
                  <td>' . $id_pro . '</td>
                  <td>' . number_format($giamua, 0, ",", ".") . ' ₫</td>
                  <td>' . $soluong . '</td>
                  <td>' . number_format($thanhtien , 0, ",", ".") . ' ₫</td>
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


