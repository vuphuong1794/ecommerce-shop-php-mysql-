<!DOCTYPE html>
<html>
<?php
  session_start();
  $danhgia = $_POST['danhgia'];
  $tensp=  $_GET['tensp'];
  $giaca=  $_GET['giaca'];
  $mota=  $_GET['mota'];
  $hinhanh1=  $_GET['hinhanh1'];
  $hinhanh2=  $_GET['hinhanh2'];
  $hinhanh3=  $_GET['hinhanh3'];

  echo "$hinhanh1";
  echo "$mota";
  //Ket noi
  $servername = "localhost"; // Địa chỉ máy chủ MySQL
  $username = "root"; // Tên người dùng MySQL
  $password = ""; // Mật khẩu MySQL
  $dbname = "quanlybanhang"; // Tên cơ sở dữ liệu

  // Kết nối tới MySQL
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  echo '<script>alert("Chạy được nè");</script>';
  $name = $_SESSION['name'];
  $sql = "insert into danhgia (tensp,comment,ten) values ('$tensp','$danhgia','$name')";
  $query = mysqli_query($conn, $sql);	
  mysqli_close($conn);
  header("Location: thongtinsanpham.php?&hinhanh1={$hinhanh1} &hinhanh2={$hinhanh2} &hinhanh3={$hinhanh3} &tensp={$tensp} &giaca={$giaca} &mota={$mota}");
  exit;
?>
</html>