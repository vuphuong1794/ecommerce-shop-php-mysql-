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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>
        Thông tin sản phẩm
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

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
  $id_show_sp = $_GET['masp'];
   // Kiểm tra xem người dùng đã đăng nhập chưa
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
                        <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg"
                            border="0">
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item">
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
                                <i class="fa fa-shopping-bag"></i>
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
                                                        <span
                                                            class="header__cart-item-price"><?php echo$row['tongtien']?></span>
                                                        <span class="header__cart-item-multiply">x</span>
                                                        <span
                                                            class="header__cart-item-qnt"><?php echo$row['SoLuong']?></span>
                                                    </div>
                                                </div>
                                                <div class="header__cart-item-body">
                                                    <span class="header__cart-item-description">
                                                        Phân loại: <?php echo$row['loai']?>
                                                    </span>
                                                    <form action="thongtinsanpham.php?masp=<?php echo$id_show_sp ?>"
                                                        method='post' enctype='multipart/form-data'>
                                                        <span class="header__cart-item-remove">
                                                            <input type='hidden' id='xoa_SP' name='id_xoa_sp'
                                                                value="<?php echo$id_xoa_sp ?>">
                                                            <button class="btn nav_delete-btn" name='xoa_sp'
                                                                type="submit">
                                                                Xóa
                                                            </button>
                                                        </span>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>

                                        <?php    } ?>
                                    </ul>
                                    <a href="gio-hang.php" class="header__cart-view-cart btn btn--primary">Xem giỏ
                                        hàng</a>
                                </div>
                            </div>


                        </div>
                        <form action="search.php" method="get" class="form-inline">
                            <input type="text" value="" placeholder="Nội dung tìm kiếm" name="noidungtimkiem"
                                id="Timkiem" style="font-size: 12px; border: none; padding: 6px; margin-right: 12px;">
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
  $masp = $_GET['masp'];
  include "connect.php";
  $sql1 = "SELECT *,giaca*(1-giamgia) as tongtien FROM  sanpham
  WHERE sanpham.masp = '$masp'";
  $sl=0;
  $mausac='';
  $size='';
  $result1 = mysqLi_query($conn, $sql1);
  while($row = mysqLi_fetch_array($result1)){
    // $id = $row['id'];
    $masp = $row['masp'];
    $magh = $let_Account;
    $hinhanh1 = $row['hinhanh1'];
$hinhanh2 = $row['hinhanh2'];
$hinhanh3 = $row['hinhanh3'];
$tensp = $row['tensp'];
$giaca = $row['giaca'];
$mota=$row['mota'];
$masp=$row['masp'];

    
 
echo "<section class='client_section layout_padding'>";
echo "  <div class='container'>";
echo "    <div class='heading_container heading_center'>";
echo "      <h2>";
echo $row['tensp'];
echo "      </h2>";
echo "    </div>";
echo "  </div>";
echo "  <div class='container px-0'>";
echo "    <div id='customCarousel2' class='carousel  carousel-fade' data-ride='carousel'>";
echo "      <div class='carousel-inner'>";
echo "        <div class='carousel-item active'>";
echo "          <div class='box'>";
echo "            <div class='client_info'>";
echo "              <div class='client_name'>";
echo "                <h5>";
echo "                  ";
echo "                </h5>";
echo "                <h6>";
echo "                  ";
echo "                </h6>";
echo "              </div>";
echo "              <i class='fa fa-quote-left' aria-hidden='true'></i>";
echo "            </div>";
echo "            <img class='coihang' src='$row[hinhanh1]'>";
echo "          </div>";
echo "        </div>";
echo "        <div class='carousel-item'>";
echo "          <div class='box'>";
echo "            <div class='client_info'>";
echo "              <div class='client_name'>";
echo "                <h5>";
echo "                  ";
echo "                </h5>";
echo "                <h6>";
echo "                  ";
echo "                </h6>";
echo "              </div>";
echo "              <i class='fa fa-quote-left' aria-hidden='true'></i>";
echo "            </div>"; 
echo "            <img class='coihang' src='$row[hinhanh2]'>";
echo "          </div>";
echo "        </div>";
echo "        <div class='carousel-item'>";
echo "          <div class='box'>";
echo "            <div class='client_info'>";
echo "              <div class='client_name'>";
echo "                <h5>";
echo "                  ";
echo "                </h5>";
echo "                <h6>";
echo "                  ";
echo "                </h6>";
echo "              </div>";
echo "              <i class='fa fa-quote-left' aria-hidden='true'></i>";
echo "            </div>";
echo "            <img class='coihang' src='$row[hinhanh3]'>";
echo "          </div>";
echo "        </div>";

// Các dòng lệnh tiếp theo tương tự...

echo "      </div>";
echo "      <div class='carousel_btn-box'>";
echo "        <a class='carousel-control-prev' href='#customCarousel2' role='button' data-slide='prev'>";
echo "          <i class='fa fa-angle-left' aria-hidden='true'></i>";
echo "          <span class='sr-only'>Previous</span>";
echo "        </a>";
echo "        <a class='carousel-control-next' href='#customCarousel2' role='button' data-slide='next'>";
echo "          <i class='fa fa-angle-right' aria-hidden='true'></i>";
echo "          <span class='sr-only'>Next</span>";
echo "        </a>";
echo "      </div>";
echo "    </div>";
echo "  </div>";
echo "</section>";

echo "<header id='san_pham'>";
echo "  <div class='mua'>";
echo "    <h3 class='gia'> $row[tongtien] vnđ</h3>";
echo "    <p class='ts'>Màu sắc:</p>";

echo "    <div class='bxcolor'>
            <label>
              <button  onclick={changeMauSac('Trắng')} onclick='toggleSelected(this)' >Trắng </button>
            </label>
          </divS
          <div class='bxcolor'>
            <label> 
              <button  onclick={changeMauSac('Đen')} onclick='toggleSelected(this)'> Đen </button>
            </label>
          </div>";

echo "    <p class='ts'>Size:</p>";
echo "    <div class='bx box3'><input type='button' value='size S' onclick={changeSize('S')}></div>";
echo "    <div class='bx box4'><input type='button' value='size M' onclick={changeSize('M')}></div>";
echo "    <div class='bx box5'><input type='button' value='size L' onclick={changeSize('L')}></div>";
echo "    <div class='bx box6'><input type='button' value='size XL' onclick={changeSize('XL')}></div>";
echo "    <div class='bx box6'><input type='button' value='size XXL' onclick={changeSize('XXL')}></div>";



echo "    <div class='so_luong'>";
echo "        <p class='ts'>Số lượng:</p>";
echo "        <button class='bs' onclick='changeQuantity(-1)'>-</button>";
echo "        <p class='bs1' id='quantity'>$sl</p>";
echo "        <button class='bs' onclick='changeQuantity(1)'>+</button>";
echo "    </div>";
echo "    <div>
            <form action='thongtinsanpham.php?masp=" . $masp . "' method='post' enctype='multipart/form-data'>
            <input type='hidden' id='quantityHidden' name='sl' value=$sl>
            <input type='hidden' id='mausacHidden' name='mau_sac' value='$mausac'>
            <input type='hidden' id='sizeHidden' name='size' value='$size'>
            <button class='them' name='them_sp'>
              Thêm vào giỏ hàng
            </button>
            </form>
          </div>";
echo "  </div>";
echo "  <div class='mo_ta'>";
echo "      <h3>Thông tin</h3>";
echo "      <p></p>";
echo "      <p>Chất liệu: Suit_able ORIGINAL - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát</p>";
echo "      <p>- Suit_able Original không lông được áp dụng cho toàn bộ sản phẩm áo thun màu đen</p>";
echo "      <p>- Suit_able Original 2.0 có lông vẫn được áp dụng cho các áo thun màu khác</p>";
echo "      <p>- Kích cỡ: S/M/L/XL</p>";
echo "      <h3>Bảng size</h3>";
echo "      <p>- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.</p>";
echo "      <p>- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.</p>";
echo "      <p>+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg</p>";
echo "      <p>+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg</p>";
echo "      <p>+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg</p>";
echo "      <p>+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.</p>";
echo "  </div>";
echo "</header>";
  }

if(!isset($_SESSION['loged'])){ ; 
echo "        <div class='heading_container heading_center'>";
echo "            <h4>Đăng nhập để đánh giá</h4>";
echo "        </div>";
}
else{
echo "<!-- bình luận đánh giá sản phẩm -->";
echo "<section class='client_section layout_padding'>";
echo "    <div class='container'>";
echo "        <div class='heading_container heading_center'>";
echo "            <h2>Đánh giá từ khách hàng</h2>";
echo "        </div>";
echo "    </div>";
echo "</div>";
echo "<form action='danhgia.php?&hinhanh1={$hinhanh1} &hinhanh2={$hinhanh2} &hinhanh3={$hinhanh3} &tensp={$tensp} &giaca={$giaca} &mota={$mota}'  method='post' class='form-inline'>";
echo "   <input class='input_danh_gia' type='text' value='' placeholder='Nhận xét của bạn' name='danhgia' id='danhgia' style='font-size: 80%; width: 70%; height: 50px'>";
echo "    <button class='btn nav_search-btn' type='submit' ";
echo "        <i class='fa fa-search' aria-hidden='true'></i>";
echo "    </button>";
echo "</form>";
echo "</section>";
}


 //Ket noi
  $servername = "localhost"; // Địa chỉ máy chủ MySQL
  $username = "root"; // Tên người dùng MySQL
  $password = ""; // Mật khẩu MySQL
  $dbname = "quanly"; // Tên cơ sở dữ liệu

  // Kết nối tới MySQL
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  $sqlloai = "select comment, ten from danhgia where tensp='$tensp'";
  $queryloai = mysqli_query($conn, $sqlloai); 

    echo "<div class='input_danh_gia1'>";
  while($row = mysqli_fetch_array($queryloai)) {
    echo "<div class=\"container1 px-0\">";
    echo "  <div id=\"customCarousel3\" class=\"carousel  carousel-fade\" data-ride=\"carousel\">";
    echo "    <div class=\"carousel-inner\">";
        echo "              <h6>";
    echo "               $row[ten]:";
    echo "              </h6>";
    echo "      <div class=\"carousel-item active\">";
    echo "        <div class=\"box\">";
    echo "          <div class=\"client_info\">";
    echo "            <div class=\"client_name\">";

    echo "            </div>";
    echo "          </div>";
    echo "          <p>";
    echo "            $row[comment]";
    echo "          </p>";
    echo "        </div>";
    echo "      </div>";
    echo "    </div>";
    echo "  </div>";
    echo "</div>";
  }  
  echo "</div>";
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
                            Đội ngũ của chúng tôi sẽ hỗ trợ tư vấn mọi thắc mắc, khó khăn của bạn trong thời gian sớm
                            nhất có thể
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            Liên hệ
                        </h6>
                        <div class="info_link-box">
                            <a>
                                <p> Quận 12, Thành phố Hồ Chí Minh </p>
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

    <!-- end info section -->

    <?php
    include "connect.php";
    $sql = "SELECT  MAX(id) AS max_id FROM tb_giohang";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
    $max_id = $row1['max_id'];
    $id = $max_id + 1;
    $flag = 0;
    $sql_sanpham = "SELECT  *, giaca*(1-giamgia) as tongtien FROM sanpham";
    $result_sanpham = mysqli_query($conn, $sql_sanpham);
    $row_sanpham = mysqli_fetch_assoc($result_sanpham);
    $dongia_sanpham = $row_sanpham['giaca'];
    $tongtien_sanpham = $row_sanpham['tongtien'];


    if(!isset($_SESSION['loged'])){
      echo "<script>alert('Vui lòng đăng nhập hoặc đăng kí để mua hàng');</script>";
    }
    else if(isset($_POST['them_sp'])){
      unset($_POST['them_sp']);
      //echo "<script>alert('them');</script>";
      //  $id++;
      $account = $_SESSION['account'];
      // $account1 = $account;
      $size = $_POST['size'];
      $mausac = $_POST['mau_sac'];
      $soluong = $_POST['sl'];
      //echo "<script>alert('flag 3');</script>";
      // Kiểm tra xem dữ liệu đã tồn tại hay chưa
      $check_sql = "SELECT * FROM tb_giohang WHERE MaGioHang = '$magh' AND masp = '$masp' AND dongia = $dongia_sanpham AND taiKhoanID = '$account' AND Size ='$size' AND mausac='$mausac'";
      $check_result = mysqli_query($conn, $check_sql);
      //echo "<script>alert('$magh,$account');</script>";
        if(mysqli_num_rows($check_result) > 0) {
          //echo "<script>alert('mys_num');</script>";
            // Xóa bản ghi trước đó
            $delete_sql = "DELETE FROM tb_giohang WHERE MaGioHang = '$magh' AND masp = '$masp' AND dongia = $dongia_sanpham AND taiKhoanID = '$account' AND Size ='$size' AND mausac='$mausac'";
            $delete_result = mysqli_query($conn, $delete_sql);
            $id = $max_id;
        }
        //echo "<script>alert('-----'+'$soluong'+'++++');</script>";
        if ($soluong >0 && $mausac != '' && $size != ''){
          //echo "<script>alert('so sanh soluong, mau sac,..');</script>";
        $sql2 = "INSERT INTO tb_giohang (id, MaGioHang, masp, SoLuong, dongia, Size, mausac, TaiKhoanID, tongtien) VALUES ($id, '$magh', '$masp', $soluong, $dongia_sanpham,'$size', '$mausac' ,'$account',$soluong*$tongtien_sanpham)";
        $result = mysqli_query($conn, $sql2);
        $soluong=0;
        $flag = 0;
        echo "<script>alert('Đã thêm vào giỏ hàng thành công');</script>";
        }
        else if($soluong <=0) {
          //echo "<script>alert('else');</script>";
          echo "<script>alert('Vui lòng chọn số lượng sản phẩm');</script>";
        }
        else if($mausac =='') {
          //echo "<script>alert('else');</script>";
          echo "<script>alert('Vui lòng chọn màu sắc sản phẩm');</script>";
        }
        else if($size ==''){
          //echo "<script>alert('else');</script>";
          echo "<script>alert('Vui lòng chọn size sản phẩm');</script>";
        }
        echo "<script> window.location.href = 'thongtinsanpham.php&hinhanh1={$hinhanh1} &hinhanh2={$hinhanh2} &hinhanh3={$hinhanh3} &tensp={$tensp} &giaca={$giaca} &mota={$mota}'; </script>";
      }

   
   if(isset($_POST['xoa_sp'])){
    $id_sp = $_POST['id_xoa_sp'];
    $account = $_SESSION['account'];
    //echo "<script>alert('flag=1');</script>";
    $xoa_sp = "DELETE FROM tb_giohang WHERE id = '$id_sp'";
    $check_result = mysqli_query($conn, $xoa_sp);
  }
        
    ?>

    <script>
    let currentQuantity = <?php echo $sl; ?>; // Số lượng hiện tại từ PHP
    let currentMauSac = '<?php echo $mausac; ?>'; // Giả định biến PHP $mausac là một chuỗi
    let currentSize = '<?php echo $size; ?>';

    function changeQuantity(change) {
        // Thay đổi số lượng
        currentQuantity += change;

        // Giới hạn số lượng không dưới 0
        currentQuantity = Math.max(0, currentQuantity);

        // Cập nhật số lượng mới lên giao diện
        const quantityElement = document.getElementById('quantity');
        const quantityHiddenElement = document.getElementById('quantityHidden');
        quantityElement.textContent = currentQuantity;
        quantityHiddenElement.value = currentQuantity;
        $sl = currentQuantity;

    }


    function changeMauSac(changea) {
        currentMauSac = changea;
        const mausacHiddenElement = document.getElementById('mausacHidden');
        mausacHiddenElement.value = currentMauSac;

    }

    function changeSize(changesize) {
        currentSize = changesize;
        const sizeHiddenElement = document.getElementById('sizeHidden');
        sizeHiddenElement.value = currentSize;
    }



    function toggleSelected(button) {
        button.classList.toggle('selected');
    }
    </script>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="js/custom.js"></script>

</body>

</html>