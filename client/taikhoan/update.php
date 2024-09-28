<?php
    $listtaikhoan = $listtaikhoan;
    if (is_array($listtaikhoan)) {
        extract($listtaikhoan);
    }
?>
<div class="row">
    <div class="row header">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formdslh">
        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
              id="sampleTable">
            <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="all"></th>
                  <th>MÃ TÀI KHOẢN</th>
                  <th width="150">TÊN ĐĂNG NHẬP</th>
                  <th width="20">MẬT KHẨU</th>
                  <th width="300">EMAIL</th>
                  <th>ĐỊA CHỈ</th>
                  <th>ĐIỆN THOẠI</th>
                  <th>Chức vụ</th>
                  <th width="100">Tính năng</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    $suatk = "index.php?act=suadm&id=" . $id;
                    $xoatk = "index.php?act=xoadm&id=" . $id;
                    echo '<td><input type="checkbox" name="" id=""></td>
                 <td>' . $id . '</td>
                 <td>' . $user . '</td>
                 <td>' . $pass . '</td>
                 <td>' . $email . '</td>
                 <td>' . $address. '</td>
                 <td>' . $tel . '</td>
                 <td>' . $role . '</td>
                 <td class="table-td-center"><a href ="' . $xoatk . '"><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                      onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                    </button>
                    <a href ="' . $suatk . '"><button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                      data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
                    </button>
                  </td>
                  </td>
             </tr>';
                }
                ?>
                
                </tbody>
            </table>
          </div>
        </div>
        <div class="row mb10">
            <a href="taikhoan/dangky.php"><input type="button" value="NHẬP THÊM"></a>
        </div>
        <?php 
                        if (isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
    </div>
</div>