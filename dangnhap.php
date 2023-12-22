<?php
	//Lay du lieu
	$User = $_POST["txtUser"];
	$Pass = $_POST["txtPass"];
	$bien = 0;
	$bien1 = 0;
	//So sanh User va Pass
	if($User == "" && $Pass == ""){
		echo "<script language='javascript'>";
	  	echo "alert('Không được để trống!!! Mời đăng nhập lại')";  //not showing an alert box.
	  	echo "</script>";
		//echo "<p align='center' >Không được để trống!!! Mời đăng nhập lại</p><br>";
		echo "<meta http-equiv='refresh' content ='0;URL=login.html'><br>";
	}
	else{
		//Ket noi
		$servername = "localhost"; // Địa chỉ máy chủ MySQL
        $username = "root"; // Tên người dùng MySQL
        $password = ""; // Mật khẩu MySQL
        $dbname = "quanlybanhang"; // Tên cơ sở dữ liệu

        // Kết nối tới MySQL
        $conn = mysqli_connect($servername, $username, $password, $dbname);

		//mysqli_query("SET character_set_results=utf8", $conn); //SET character_set_results=utf8: Hỗ trợ xuất ra tiếng việt
		//$query = mysqli_query("Select * from taikhoan");

        $sql = "Select * from taikhoan";
        $query = mysqli_query($conn, $sql);

       	//<!-- 'start thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->

		if(isset($_POST["login"])){
			$tk = $_POST["txtUser"];
			$mk = md5($_POST["txtPass"]);
			$truyvan="select * from taikhoan where tendangnhap = '$tk' and matkhau = '$mk'";
			$rows = mysqli_query($conn,$truyvan);
			$count = mysqli_num_rows($rows);
			if($count==1){
				$_SESSION["loged"] = true;
				header("location: index.php");
				setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
				echo"<script>Đăng nhập thành công!</script>";
			}
			else{
				header("location: index.php");
				setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
				echo"<script>Đăng nhập không thành công!</script>";
			}
			 
		}
	//<!-- 'end thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->
		mysqli_close($conn);
	}
?>


