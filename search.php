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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>
    Áo - SuitAble
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <?php 
  
    session_start();
    if (isset($_SESSION['account'])) {
      $let_Account = $_SESSION['account'];
      $tenTK = $_SESSION['tendangnhap'];
    } else {
      $tenTK = null;
      $let_Account = null; // Hoặc giá trị mặc định nếu không đăng nhập
    }
  ?>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg" border="0">
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
              <a class="nav-link" href="ao.php">
                áo
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="quan.php">
                quần
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bosuutap.php">
                bộ sưu tập
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lienhe.php">liên hệ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">chăm sóc khách hàng</a>
              <ul class="sub-menu1">
                <li><a class="nav-link" href="doitra.php">Chính sách đổi trả</a></li>
                <li><a class="nav-link" href="baohanh.php">Chính sách bảo hành</a></li>
                <li><a class="nav-link" href="thanhvien.php">Chính sách thành viên</a></li>
                <li><a class="nav-link" href="vanchuyen.php">Chính sách vận chuyển</a></li>
                <li><a class="nav-link" href="muahang.php">Hướng dẫn mua hàng</a></li>
                <li><a class="nav-link" href="baoquan.php">Hướng dẫn bảo quản</a></li>
            </ul>
            </li>
          </ul>
          <div class="user_option">
          <?php
                          
                           // Kiểm tra xem người dùng đã đăng nhập hay chưa
                           if (isset($_SESSION['loged'])) {
                             echo '<span class="welcome-msg"> Xin chào ' . $_SESSION['name'] . ' <button><a href="logout.php">Đăng xuất</a></button> </span>';
                           }
                           else {
                               // Nếu chưa đăng nhập, hiển thị nội dung đăng nhập và đăng ký
                               echo '
                                   <a href="login.php">
                                       <i class="fa fa-user" aria-hidden="true"></i>
                                       <span>
                                           Đăng nhập
                                       </span>
                                   </a>
                                   <a href="register.php">
                                       <i class="fa fa-user2" aria-hidden="true"></i>
                                       <span>
                                           Đăng kí
                                       </span>
                                   </a>';
                           }
                          ?>
            <!-- Giỏ hàng -->
            <div class="header__cart">
              <div class="header__cart-wrap">
                  <i class="fa fa-shopping-bag" ></i>
                  <span class="header__cart-notice">
                  <?php
                    include "connect.php";
                      $sql = "SELECT  Count(id) AS soLuong FROM tb_giohang";
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                        echo$row1['soLuong'];
                      ?>
                  </span>
                  <!-- No cart: header__cart-list--no-cart -->
                  <div class="header__cart-list">
                      <img src="./no-cart.png" alt="" class="header__cart-no-cart-img">
                      <span class="header__cart-list-no-cart-msg">
                          Chưa có sản phẩm
                      </span>

                      <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                      <ul class="header__cart-list-item">
                          <!-- cart item -->
                          <?php
                             include "connect.php";
                             $id_xoa_sp =0;
                             $sql = "SELECT *,giaca*(1-giamgia) as tongtien FROM  tb_giohang gh
                             INNER JOIN sanpham sp ON sp.masp = gh.masp WHERE gh.taikhoanID = '$let_Account'";
                             $result = mysqLi_query($conn, $sql);
                             while($row = mysqLi_fetch_array($result)){ 
                              $id_xoa_sp = $row['id'] ?>
                              
                          <li class="header__cart-item">
                              <img src=<?php echo$row['hinhanh1']?> alt="" class="header__cart-img">
                              <div class="header__cart-item-info">
                                  <div class="header__cart-item-head">
                                      <h5 class="header__cart-item-name"><?php echo$row['tensp']?></h5>
                                      <div class="header__cart-item-price-wrap">
                                          <span class="header__cart-item-price"><?php echo$row['tongtien']?></span>
                                          <span class="header__cart-item-multiply">x</span>
                                          <span class="header__cart-item-qnt"><?php echo$row['SoLuong']?></span>
                                      </div>
                                  </div>
                                  <div class="header__cart-item-body">
                                      <span class="header__cart-item-description">
                                          Phân loại: <?php echo$row['loai']?>
                                      </span>
                                      <form action="search.php" method='post' enctype='multipart/form-data'>
                                        <span class="header__cart-item-remove">
                                        <input type='hidden' id='xoa_SP' name='id_xoa_sp' value="<?php echo$id_xoa_sp ?>">
                                        <button class="btn nav_delete-btn" name='xoa_sp' type="submit">
                                            Xóa
                                        </button>
                                        </span>
                                      </form>
                                  </div>
                              </div>
                          </li>

                          <?php    } ?>
                      </ul>
                      <a href="gio-hang.php" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a >
                  </div>
              </div>
          
              
            </div>
            <form action="search.php" method="get" class="form-inline">        
                <input type="text" value="" placeholder="Nội dung tìm kiếm" name="noidungtimkiem" id="Timkiem" style="font-size: 12px; border: none; padding: 6px; margin-right: 12px;">                   
                <button class="btn nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <!-- shop section -->

<?php
  $search = $_GET["noidungtimkiem"];
  //Ket noi
  $servername = "localhost"; // Địa chỉ máy chủ MySQL
  $username = "root"; // Tên người dùng MySQL
  $password = ""; // Mật khẩu MySQL
  $dbname = "quanlybanhang"; // Tên cơ sở dữ liệu
  // Kết nối tới MySQL
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  $sql = "INSERT INTO lstk VALUES ('$tenTK','$search')";
  $query = mysqli_query($conn, $sql);                           

  $sql = "select tensp, giaca, hinhanh1,hinhanh2,hinhanh3,mota,masp,luotmua,giamgia,giaca*(1-giamgia) as tongtien from sanpham where tensp like'%$search%' group by tensp";
  $query = mysqli_query($conn, $sql);	
  
  if (mysqli_num_rows($query) == 0) {
    echo "Chua co du lieu";
  }
  else{
    echo "<section class='shop_section layout_padding'>";
  
    echo "  <div class='container'>";
    echo "    <div class='heading_container heading_center'>";
    echo "      <h2>";

    echo "        Kết quả tìm kiếm sản phẩm";

    echo "      </h2>";
    echo "    </div>";
    
    echo "    <div class='row'>";
    while($row = mysqli_fetch_array($query)){
      echo "      <div class='col-sm-6 col-md-4 col-lg-3'>";
      echo "        <div class='box'>";
  
      echo "           <a class='nav-link' href='thongtinsanpham.php?masp=" . $row['masp'] . "'>";
      echo "            <div class='img-box'>";
  
      echo "              <img src='$row[hinhanh1]' alt=''>";
  
      echo "            </div>";
      echo "              <h6>";
      echo "                $row[tensp]<br>";
      echo "              </h6>";
        
        //giá cũ
        echo "            <div class='detail-box'>";
        if ($row['giamgia']!=0){
        
        echo "              <h6>";
        echo "                ₫";
        echo "                <span>";
        echo "               <strike>"   ;
        echo "                  $row[giaca]<br>";
        echo "                </strike> ";
        echo "                </span>";                            
        echo "              </h6>";
        }
        
        //giá mới
        echo "              <h6>";
        echo "                ₫";
        echo "                <span>";
        echo "                  $row[tongtien]<br>";
        echo "                </span>";
        echo "              </h6>";
        echo "            </div>";
        echo "            <div class='detail-box'>";
        echo "              <span>";
        echo "                Đã mua: $row[luotmua]<br>";
        echo "              </span>";        
        echo "            </div>";
        echo "          </a>";
        echo "        </div>";
        echo "      </div>";
       }                  
    echo "    </div>";
    echo "  </div>";
  echo "</section>";
} 
  mysqli_close($conn);

?>
 

  <!-- end shop section -->

  <!-- info section -->

   <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="https://www.facebook.com/profile.php?id=100094763028645&mibextid=ZbWKwL">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="https://twitter.com/Shop_Suit_Able">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="https://instagram.com/shopsuit_able?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              SuitAble
            </h6>
            <p>
              Thời trang trẻ trung, năng động, phong cách.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Người dùng mới
              </h5>
              <form action="register.php">
                <input type="email" placeholder="Enter your email">
                <button>
                  Đăng kí ngay
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Hỗ trợ
            </h6>
            <p>
              Đội ngũ của chúng tôi sẽ hỗ trợ tư vấn mọi thắc mắc, khó khăn của bạn trong thời gian sớm nhất có thể
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Liên hệ
            </h6>
            <div class="info_link-box">
              <a>
                <p>  Quận 12, Thành phố Hồ Chí Minh </p>
              </a>
              <a>
                <p>0123 456 789</p>
              </a>
              <a>
                <p> shopsuitable.uth@gmail.com</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    include "connect.php";
    if(isset($_POST['xoa_sp'])){
      $id_sp = $_POST['id_xoa_sp'];
      $account = $_SESSION['account'];
      $xoa_sp = "DELETE FROM tb_giohang WHERE id = '$id_sp'";
      $check_result = mysqli_query($conn, $xoa_sp);
      }
        
    ?>
  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>
