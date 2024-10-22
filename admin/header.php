<!DOCTYPE html>
<html lang="en">

<head>
  <title>Trang quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
  .a:hover{
    color: yellow;
  }
  .b  :hover{
    color: white;
  }
</style>


 
<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <!-- User Menu-->
      <li><a class="app-nav__item" href="../index.php?act=Thoat"><i class='bx bx-log-out bx-rotate-180'></i> TRỞ VỀ
          TRANG WEB</a>
      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="img/1819.png" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name" style="color: white;"><b>Admin</b></p>
        <p class="app-sidebar__user-designation" style="color: white;">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
    <li><a class="app-menu__item" href="index.php?act=thongke"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Trang chủ </span></a>
      </li>

      <li><a class="app-menu__item  " href="index.php?act=dskh"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý Tài Khoản</span></a></li>
      <li><a class="app-menu__item" href="index.php?act=listsp"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="index.php?act=listdm"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý danh mục</span></a></li>
      <li><a class="app-menu__item" href="index.php?act=listdh"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý Đơn Đặt Hàng</span></a></li>   
      <li><a class="app-menu__item" href="index.php?act=listctdh"><i class='app-menu__icon bx bx-task'></i><span
             class="app-menu__label">Quản lý Chi Tiết Đơn Hàng</span></a></li>

      <li><a class="app-menu__item" href="index.php?act=dsbl"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Bình luận
          </span></a></li>
   

    </ul>
  </aside>