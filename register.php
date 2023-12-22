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
    Trang đăng ký
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/register.css" rel="stylesheet" />
  <!-- responsive style -->
  <!-- <link href="css/responsive.css" rel="stylesheet" /> -->
</head>

<body>
  <div class="quay_ve">
        <a href="index.php"><-- Trang chủ</a>
    </div>
    <div class="login-container">
        <span>
            <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg" border="0">
        </span>
        <h2>Đăng ký</h2>
        <form id="form1" name="form1" method="post" action="register.php" enctype="multipart/form-data">
          <div align="center">
        
            </h1>
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
              <th scope="row"><div align="left">Họ và tên: </div></th>
              <td><input type="text" name="txtFullname" /></td>
            </tr>
            <tr>
              <th scope="row"><div align="left">Đia chỉ: </div></th>
              <td><input type="text" name="txtAddress" /></td>
            </tr>
            <tr>
              <th scope="row"><div align="left">Số điện thoại </div></th>
              <td><input type="text" name="txtPhone" /></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="login" value="Đăng ký" /></th>
            </tr>
          </table>
          <p align="center">&nbsp;</p>
        </form>
      </div>
      <?php
        if (isset($_POST['login'])) {
            
            $account_user = $_POST['txtUser'];
            $password_user = $_POST['txtPass'];
            $account_Per = 2;
            $account_FullName = $_POST['txtFullname'];
            $account_Address = $_POST['txtAddress'];
            $account_Phone = $_POST['txtPhone'];
            include "connect.php";
            $sql = "INSERT INTO taikhoan (tendangnhap, matkhau, quyenhan, ten, diachi, sdt)
            VALUES ( '$account_user', '$password_user', '$account_Per', '$account_FullName', '$account_Address', '$account_Phone')";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "Lỗi truy vấn: " . mysqli_error($conn);
            } else {
                // The INSERT query is successful, redirect to login page
                header('Location: login.php');
                exit(); // It's a good practice to add an exit() after header() to terminate the script execution
            }
        }
    
    ?>
</body>

</html>