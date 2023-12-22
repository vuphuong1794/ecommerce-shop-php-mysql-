<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
    Trang đăng nhập
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/login.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="quay_ve">
        <a href="index.php"><-- Trang chủ</a>
    </div>
    <div class="login-container">
        <span>
            <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg" border="0">
        </span>
        <h2>Đăng nhập</h2>
        <form id="form1" name="form1" method="post">
          <div align="center">
            <h2><strong></strong>
            </h2>
          </div>
          <table width="100%" border="0" align="center">
            <tr>
              <th scope="row"><div align="left">Tên tài khoản: </div></th>
              <td><input type="text" name="txtUser" /></td>
            </tr>
            <tr>
              <th scope="row"><div align="left">Mật khẩu: </div></th>
              <td><input type="password" name="txtPass" /></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="login" value="Đăng nhập" /></th>
            </tr>
          </table>
          <p align="center">&nbsp;</p>
        </form>
      </div>
      <?php
        if (isset($_POST['login'])) {
            $account_user = $_POST['txtUser'];
            $password_user = $_POST['txtPass'];
            
            echo "<script>alert($account_user);</script>";
            include "connect.php";
            $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '$account_user'";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "Lỗi truy vấn: " . mysqli_error($conn);
            } else if (mysqli_num_rows($result) == 0) {
                echo "Không tìm thấy tài khoản";
            } else {
                $row = mysqli_fetch_assoc($result);
            if ($password_user == $row['matkhau']) {
                // Mật khẩu đúng, đăng nhập thành công
                session_start();
                $_SESSION['taikhoan'] = $row['tendangnhap'];
                $_SESSION['tendangnhap'] = $row['tendangnhap'];
                $_SESSION['name'] = $row['ten'];
                $_SESSION['account'] = $row['ID_Account'];
                $_SESSION['diachi'] = $row['diachi'];
                $_SESSION['sdt'] = $row['sdt'];
                $quyenhan=$row['quyenhan'];
                

                if ($quyenhan==1){
                $_SESSION["loged"] = true;
                echo"<script>alert('Chạy vào admin');</script>";
                header('Location: admin.php'); // Chuyển hướng đến ADMIN
                }
                else{
                echo"<script>alert('Chạy vào index');</script>";
                $_SESSION["loged"] = true;
                header('Location: index.php'); // Chuyển hướng đến index
                }  
              } 
            else {
                // Mật khẩu không đúng
                echo "Sai mật khẩu";
            }
        }
      }
    ?>
</body>
</html>