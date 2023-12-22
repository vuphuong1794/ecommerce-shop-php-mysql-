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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <title>
    Trang chủ - SuitAble
  </title>
  <style>
  /* Ẩn viền của video */
  video {
    outline: none;
  }
</style>

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
  <!--
      <div id="preloader">
    <img id="status" src="images/intro.gif" alt="">
  </div>
-->
<div id="preloader">
<video id="status" autoplay muted>
  <source src="images/intro.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
</div>

 <?php 
    
    session_start();
    if (isset($_SESSION['account'])) {
      $let_Account = $_SESSION['account'];
    } else {
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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
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
                                      <form action="index.php" method='post' enctype='multipart/form-data'>
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
    <!-- slider section -->

    <section class="slider_section animate__animated animate__fadeIn">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        Welcome To Our <br>
                        SuitAble Shop
                      </h1>
                      <p>
                        SuitAble là một thương hiệu thời trang trẻ được thành lập vào tháng 7 năm 2023.
                      </p>
                      <a href="lienhe.php">
                        Liên hệ với chúng tôi
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img src="images/anhbia1.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        Welcome To Our <br>
                        SuitAble Shop
                      </h1>
                      <p>
                       Với quan điểm bảo vệ môi trường SuitAble luôn sử dụng những chất liệu thân thiện với môi trường(sợi Cotton).
                      </p>
                      <a href="lienhe.php">
                        Liên hệ với chúng tôi
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img src="images/anhbia2.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        Welcome To Our <br>
                        SuitAble Shop
                      </h1>
                      <p>
                        Đến với SuitAble, chúng tôi sẽ giúp bạn trở nên trẻ trung, phong cách thông qua thời trang.
                      </p>
                      <a href="lienhe.php">
                        Liên hệ với chúng tôi
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img src="images/anhbia3.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <img src="images/line.png" alt="" />
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container1 heading_center">
      <div class="hieu_ung animate__animated animate__tada">
      <img src="images/bestsale.png" alt="" style="width:250px" >
       <h2> 
          Bán chạy
        <h2>
      </div>
      </div>

<?php
  //Ket noi
  $servername = "localhost"; // Địa chỉ máy chủ MySQL
  $username = "root"; // Tên người dùng MySQL
  $password = ""; // Mật khẩu MySQL
  $dbname = "quanlybanhang"; // Tên cơ sở dữ liệu

  // Kết nối tới MySQL
  $conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

  $sqlrow= "select * from sanpham where luotmua>=13 group by tensp";
  $queryrow = mysqli_query($conn, $sqlrow);	
  if (mysqli_num_rows($queryrow) == 0) {
    echo "Chưa có dữ liệu";
  }
  else{
        echo "    <div class='row'>";
      $sqlrow1= "select *, giaca*(1-giamgia) as tongtien from sanpham where luotmua>=13 group by tensp";
      $queryrow1 = mysqli_query($conn, $sqlrow1);	
      while($row = mysqli_fetch_array($queryrow1)){
        echo "      <div class='col-sm-6 col-md-4 col-lg-3'>";
        echo "        <div class='box'>";
    
        echo "          <a class='nav-link' href='thongtinsanpham.php?masp=" . $row['masp'] . "'>";
        echo "            <div class='img-box'>";
    
        echo "              <img src='$row[hinhanh1]' alt=''>";
    
        echo "            </div>";
        echo "            <h6>";
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
    }
  mysqli_close($conn);
?>
    </section>

  <!-- end shop section -->

  <!-- saving section -->

  <section class="saving_section ">
    <div class="box">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="img-box">
              <img src="images/saving-img.png" alt="">
            </div>
          </div>
            <div class="col-lg-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Ưu đãi <br>
                  sản phẩm mới
                </h2>
              </div>
              <p>
                Mua ngay những sản phẩm mới nhất của chúng tôi với giá cực kỳ ưu đãi
              </p>
              <div class="btn-box">
                <a href="ao.php" class="btn1 animate__animated animate__heartBeat">
                  Mua ngay
                </a>
               
              </div>
            </div>
          </div>
          
        
        </div>
      </div>
    </div>
  </section>

  <!-- end saving section -->
  <!-- gift section -->

  <section class="gift_section layout_padding-bottom">
    <div class="box ">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-7">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Quà tặng <br>
                  người thương
                </h2>
              </div>
              <p>
                Hãy gửi đến người bạn thương một chiếc áo thật đẹp, thật phong cách nhưng lại không kém phần thời trang.
              </p>
              <div class="btn-box">
                <a href="quan.php" class="btn1 animate__animated animate__heartBeat">
                  Mua ngay
                </a>
                
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="img_container">
              <div class="img-box">
                <img src="images/gifts.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end gift section -->

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Tiện ích khi mua hàng
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                  <g>
                    <path d="M476.158,231.363l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392
                 V110.63c0-9.136-7.432-16.568-16.568-16.568H50.772c-9.136,0-16.568,7.432-16.568,16.568V256c0,4.427,3.589,8.017,8.017,8.017
                 c4.427,0,8.017-3.589,8.017-8.017V110.63c0-0.295,0.239-0.534,0.534-0.534h307.841c0.295,0,0.534,0.239,0.534,0.534v145.372
                 c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.569c0.008,0,0.014,0.002,0.021,0.002
                 c0.008,0,0.015-0.001,0.022-0.001c11.637,0.008,21.518,7.646,24.912,18.171h-24.928c-4.427,0-8.017,3.589-8.017,8.017v17.102
                 c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962c-6.886-19.883-25.787-34.205-47.982-34.205
                 s-41.097,14.322-47.982,34.205h-3.86v-60.393c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v60.391H192.817
                 c-6.886-19.883-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205H50.772c-0.295,0-0.534-0.239-0.534-0.534v-17.637
                 h34.739c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017H8.017c-4.427,0-8.017,3.589-8.017,8.017
                 s3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304c-0.002,0.178-0.014,0.355-0.014,0.534
                 c0,27.996,22.777,50.772,50.772,50.772s50.772-22.776,50.772-50.772c0-0.18-0.012-0.356-0.014-0.534h180.67
                 c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.996,22.777,50.772,50.772,50.772c27.995,0,50.772-22.776,50.772-50.772
                 c0-0.18-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.511C512,251.989,496.423,234.448,476.158,231.363z
                  M375.182,144.301h60.392c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029V144.301z M375.182,230.881v-52.376h71.235
                 l13.094,52.376H375.182z M144.835,401.904c-19.155,0-34.739-15.583-34.739-34.739s15.584-34.739,34.739-34.739
                 c19.155,0,34.739,15.583,34.739,34.739S163.99,401.904,144.835,401.904z M427.023,401.904c-19.155,0-34.739-15.583-34.739-34.739
                 s15.584-34.739,34.739-34.739c19.155,0,34.739,15.583,34.739,34.739S446.178,401.904,427.023,401.904z M495.967,299.29h-9.086
                 c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171V299.29z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M144.835,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                 c9.136,0,16.568-7.432,16.568-16.568C161.403,358.029,153.971,350.597,144.835,350.597z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M427.023,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                 c9.136,0,16.568-7.432,16.568-16.568C443.591,358.029,436.159,350.597,427.023,350.597z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M332.96,316.393H213.244c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017H332.96
                 c4.427,0,8.017-3.589,8.017-8.017S337.388,316.393,332.96,316.393z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M127.733,282.188H25.119c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h102.614
                 c4.427,0,8.017-3.589,8.017-8.017S132.16,282.188,127.733,282.188z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M278.771,173.37c-3.13-3.13-8.207-3.13-11.337,0.001l-71.292,71.291l-37.087-37.087c-3.131-3.131-8.207-3.131-11.337,0
                 c-3.131,3.131-3.131,8.206,0,11.337l42.756,42.756c1.565,1.566,3.617,2.348,5.668,2.348s4.104-0.782,5.668-2.348l76.96-76.96
                 C281.901,181.576,281.901,176.501,278.771,173.37z" />
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
              </svg>
            </div>
            <div class="detail-box">
              <h5>
                Giao hàng nhanh
              </h5>
              <p>
                với đối tác là Giao hàng nhanh chúng tôi sẽ giao hàng đến tay bạn một cách nhanh nhất
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 490.667 490.667;" xml:space="preserve">
                <g>
                  <g>
                    <path d="M138.667,192H96c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667
                 v-74.667h32c5.888,0,10.667-4.779,10.667-10.667S144.555,192,138.667,192z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M117.333,234.667H96c-5.888,0-10.667,4.779-10.667,10.667S90.112,256,96,256h21.333c5.888,0,10.667-4.779,10.667-10.667
                 S123.221,234.667,117.333,234.667z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M245.333,0C110.059,0,0,110.059,0,245.333s110.059,245.333,245.333,245.333s245.333-110.059,245.333-245.333
                 S380.608,0,245.333,0z M245.333,469.333c-123.52,0-224-100.48-224-224s100.48-224,224-224s224,100.48,224,224
                 S368.853,469.333,245.333,469.333z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M386.752,131.989C352.085,88.789,300.544,64,245.333,64s-106.752,24.789-141.419,67.989
                 c-3.691,4.587-2.965,11.307,1.643,14.997c4.587,3.691,11.307,2.965,14.976-1.643c30.613-38.144,76.096-60.011,124.8-60.011
                 s94.187,21.867,124.779,60.011c2.112,2.624,5.205,3.989,8.32,3.989c2.368,0,4.715-0.768,6.677-2.347
                 C389.717,143.296,390.443,136.576,386.752,131.989z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M376.405,354.923c-4.224-4.032-11.008-3.861-15.061,0.405c-30.613,32.235-71.808,50.005-116.011,50.005
                 s-85.397-17.771-115.989-50.005c-4.032-4.309-10.816-4.437-15.061-0.405c-4.309,4.053-4.459,10.816-0.405,15.083
                 c34.667,36.544,81.344,56.661,131.456,56.661s96.789-20.117,131.477-56.661C380.864,365.739,380.693,358.976,376.405,354.923z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M206.805,255.723c15.701-2.027,27.861-15.488,27.861-31.723c0-17.643-14.357-32-32-32h-21.333
                 c-5.888,0-10.667,4.779-10.667,10.667v42.581c0,0.043,0,0.107,0,0.149V288c0,5.888,4.779,10.667,10.667,10.667
                 S192,293.888,192,288v-16.917l24.448,24.469c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.136
                 c4.16-4.16,4.16-10.923,0-15.083L206.805,255.723z M192,234.667v-21.333h10.667c5.867,0,10.667,4.779,10.667,10.667
                 s-4.8,10.667-10.667,10.667H192z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M309.333,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S315.221,192,309.333,192h-42.667
                 c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                 S315.221,277.333,309.333,277.333z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M288,234.667h-21.333c-5.888,0-10.667,4.779-10.667,10.667S260.779,256,266.667,256H288
                 c5.888,0,10.667-4.779,10.667-10.667S293.888,234.667,288,234.667z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M394.667,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S400.555,192,394.667,192H352
                 c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                 S400.555,277.333,394.667,277.333z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M373.333,234.667H352c-5.888,0-10.667,4.779-10.667,10.667S346.112,256,352,256h21.333
                 c5.888,0,10.667-4.779,10.667-10.667S379.221,234.667,373.333,234.667z" />
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
              </svg>
            </div>
            <div class="detail-box">
              <h5>
                Miễn phí giao hàng
              </h5>
              <p>
                Miễn phí giao hàng đối với các khu vực nội thành Thành phố Hồ Chí Minh
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <svg id="_30_Premium" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg" data-name="30_Premium">
                <g id="filled">
                  <path d="m252.92 300h3.08a124.245 124.245 0 1 0 -4.49-.09c.075.009.15.023.226.03.394.039.789.06 1.184.06zm-96.92-124a100 100 0 1 1 100 100 100.113 100.113 0 0 1 -100-100z" />
                  <path d="m447.445 387.635-80.4-80.4a171.682 171.682 0 0 0 60.955-131.235c0-94.841-77.159-172-172-172s-172 77.159-172 172c0 73.747 46.657 136.794 112 161.2v158.8c-.3 9.289 11.094 15.384 18.656 9.984l41.344-27.562 41.344 27.562c7.574 5.4 18.949-.7 18.656-9.984v-70.109l46.6 46.594c6.395 6.789 18.712 3.025 20.253-6.132l9.74-48.724 48.725-9.742c9.163-1.531 12.904-13.893 6.127-20.252zm-339.445-211.635c0-81.607 66.393-148 148-148s148 66.393 148 148-66.393 148-148 148-148-66.393-148-148zm154.656 278.016a12 12 0 0 0 -13.312 0l-29.344 19.562v-129.378a172.338 172.338 0 0 0 72 0v129.38zm117.381-58.353a12 12 0 0 0 -9.415 9.415l-6.913 34.58-47.709-47.709v-54.749a171.469 171.469 0 0 0 31.467-15.6l67.151 67.152z" />
                  <path d="m287.62 236.985c8.349 4.694 19.251-3.212 17.367-12.618l-5.841-35.145 25.384-25c7.049-6.5 2.89-19.3-6.634-20.415l-35.23-5.306-15.933-31.867c-4.009-8.713-17.457-8.711-21.466 0l-15.933 31.866-35.23 5.306c-9.526 1.119-13.681 13.911-6.634 20.415l25.384 25-5.841 35.145c-1.879 9.406 9 17.31 17.367 12.618l31.62-16.414zm-53-32.359 2.928-17.615a12 12 0 0 0 -3.417-10.516l-12.721-12.531 17.658-2.66a12 12 0 0 0 8.947-6.5l7.985-15.971 7.985 15.972a12 12 0 0 0 8.947 6.5l17.658 2.66-12.723 12.535a12 12 0 0 0 -3.417 10.516l2.928 17.615-15.849-8.231a12 12 0 0 0 -11.058 0z" />
                </g>
              </svg>
            </div>
            <div class="detail-box">
              <h5>
                Chất lượng tốt
              </h5>
              <p>
                Chúng tôi đảm bảo sẽ mang đến cho quý khách hàng những sản phẩm có chất lượng tốt nhất
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why section -->


  


  <!-- contact section -->

  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Liên hệ với chúng tôi
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267015.646895824!2d107.2055546458202!3d11.152413542576744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b2a11844fb9%3A0xbed3d5f0a6d6e0fe!2zVFLGr-G7nE5HIMSQ4bqgSSBI4buMQyBHSUFPIFRIw5RORyBW4bqsTiBU4bqiSSBUUC5IQ00gW0PGoCBT4bueIDNd!5e0!3m2!1svi!2s!4v1690616755207!5m2!1svi!2s" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form id="formlienhe" name="formlienhe" method="post">
            <div>
              <input type="text" placeholder="Name" name="tenph" required />
            </div>
            <div>
              <input type="email" placeholder="Email"name="emailph" required />
            </div>
            <div>
              <input type="text" placeholder="Phone" name="sdtph"required />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" name="noidungph" required  />
            </div>
            <div class="d-flex ">
              <input class ="detail-box" type="submit" name="ph" value="Gửi phản hồi" style="background-color: #FF0000; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px;" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php
  if (isset($_POST["ph"])) {
   $tenph = $_POST["tenph"];
   $emailph = $_POST["emailph"];
   $sdtph = $_POST["sdtph"];
   $noidungph = $_POST["noidungph"];
   
   include "connect.php";
   $sql = "INSERT INTO phanhoi values('$tenph','$emailph','$sdtph','$noidungph')";
   $result = mysqli_query($conn, $sql);
   echo "<script>alert('Đã gửi phản hồi của bạn, cảm ơn bạn đã dành thời gian');</script>";
  }
  ?>
  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Thông tin 
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    SuitAble
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Với mong muốn vươn lên đứng đầu chúng tôi luôn đảm bảo những sản phẩm được gửi đến tay khách hàng là hoàn hảo nhất.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Thân thiện với thiên nhiên
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Bằng các sử dụng 100% sợi cotton thiên nhiên, chúng tôi hướng đến một môi trường xanh, sạch, đẹp nhưng lại vô cùng mềm mại dễ chịu khi sử dụng.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Đổi mới
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Không chỉ là một hãng thời trang, chúng tôi còn là một phòng thí nghiệm - nơi nghiên cứu ra nguồn năng lượng bất tận mang tên "Sáng tạo" và "Đổi mới".
              </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

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


  </section>
  <?php
    include "connect.php";
    if(isset($_POST['xoa_sp'])){
      $id_sp = $_POST['id_xoa_sp'];
      $account = $_SESSION['account'];
      $xoa_sp = "DELETE FROM tb_giohang WHERE id = '$id_sp'";
      $check_result = mysqli_query($conn, $xoa_sp);
      }
           
    ?>
  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <script>
        $(window).on('load',function(){
          $('#status').delay(4000).fadeOut('fast');
          $('#preloader').delay(3000).fadeOut('fast');
          $('body').delay(4000).css({'overflow':'visible'});
        })
      </script>

</body>

</html>