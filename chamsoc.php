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
    Chăm sóc khách hang - SuitAble
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
    
    $let_Account = $_SESSION['account'];
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
            <li class="nav-item active">
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
                             $sql = "SELECT * FROM  tb_giohang gh
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
                                          <span class="header__cart-item-price"><?php echo$row['giaca']?></span>
                                          <span class="header__cart-item-multiply">x</span>
                                          <span class="header__cart-item-qnt"><?php echo$row['SoLuong']?></span>
                                      </div>
                                  </div>
                                  <div class="header__cart-item-body">
                                      <span class="header__cart-item-description">
                                          Phân loại: <?php echo$row['loai']?>
                                      </span>
                                      <form action="thongtinsanpham.php?masp=<?php echo$id_show_sp ?>" method='post' enctype='multipart/form-data'>
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

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          chính sách đổi trả
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
                    1.Điều kiện đổi hàng
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>- Đối với sản phẩm áo quần, thời gian đổi hàng trong vòng 7 ngày kể từ ngày khách hàng nhận bưu phẩm.</p>
        <p>- Đối với sản phẩm phụ kiện (cặp sách, dép, mũ,…), thời gian đổi hàng trong vòng 30 ngày kể từ ngày khách hàng nhận bưu phẩm.</p>
        <p>- Áp dụng đổi hàng với tất cả các sản phẩm và sản phẩm được đổi phải còn nguyên nhãn mác, trong tình trạng chưa qua sử dụng.</p>
        <p>- Áp dụng 01 lần đổi/ 01 đơn hàng.</p>
        <p>- Với trường hợp sản phẩm bị cắt nhãn mác, trong vòng 1 ngày kể từ ngày nhận bưu phẩm, bạn hãy gửi phản hồi về tụi mình để được giải quyết. Qua mốc thời gian 1 ngày chúng mình sẽ không giải quyết đơn đổi trả.</p>
        <p>- Sản phẩm đổi phải có giá trị tương đương hoặc cao hơn sản phẩm được đổi. Vui lòng thanh toán chi phí chênh lệch giá trị sản phẩm nếu có.</p>
        <p>- Trường hợp hoàn lại giá trị đơn hàng, tụi mình sẽ hoàn tiền trong vòng 48h làm việc sau khi nhận được yêu cầu từ các bạn.</p>
        <p>- Áp dụng với các đơn hàng trên toàn hệ thống của SuitAble (Website, FB & IG, TMĐT & cửa hàng).</p>
        <p>Lưu ý:</p>
        <p>- Bạn vui lòng gửi cho chúng mình clip đóng gói hàng đổi trả của bạn, nhân viên tư vấn sẽ xác nhận và tiến hành lên đơn đổi trả cho bạn.</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    2.Dịch vụ đổi hàng tận nơi
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>Nhận biết được sự bất tiện khi cần đổi sản phẩm do không vừa là một khó khăn, khi bạn phải mang hàng ra bưu cục và chờ đợi một thời gian để nhận lại món đồ ưng ý của mình.</p>
        <p>Nhằm mang lại cho bạn sự tiện lợi và những trải nghiệm tuyệt vời khi mua hàng, tụi mình đã phát triển dịch vụ đổi hàng tận nơi:</p>
        <p>- Đổi hàng tận nơi, đội ngữ giao-nhận hàng sẽ đến tận nhà để đổi hàng cho bạn.</p>
        <p>- Áp dụng 01 lần đổi/ 01 đơn hàng.</p>
        <p>- Áp dụng đổi hàng với tất cả các sản phẩm, thời gian đổi hàng trong vòng 7 ngày với áo quần, 30 ngày với phụ kiện kể từ ngày bạn nhận bưu phẩm.</p>
        <p>- Chi phí vận chuyển khi đổi hàng được SuitAble hỗ trợ 1 chiều cho bạn (bạn chỉ cần thanh toán phí giao hàng khi nhận sản phẩm đúng) và 2 chiều đối với sản phẩm do lỗi sản xuất.</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    3.Chi phí vận chuyển
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>a. Chi phí vận chuyển khi đổi hàng được SuitAble hỗ trợ</p>
        <p>- Miễn phí khi đổi sang Kích cỡ phù hợp với bạn vì chúng mình mong muốn bạn có trải nghiệm sản phẩm trực tiếp như tại cửa hàng.</p>
        <p>- 1 chiều cho bạn đối với trường hợp bạn muốn đổi sang sản phẩm khác theo mong muốn (lỗi không phải do nhà sản xuất).</p>
        <p>- 2 chiều đối với sản phẩm do lỗi sản xuất, giao nhầm (lỗi do nhà sản xuất).</p>
        <p>b. Chi phí vận chuyển không được SuitAble hỗ trợ:</p>
        <p>- Với sản phẩm trong chương trình khuyến mãi, nếu bạn muốn đổi sang sản phẩm khác phải tự chi trả chi phí vận chuyển.</p>
            </div>
          </div>

          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    4. Quy trình đổi hàng:
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>Không rườm rà, chỉ với 2 bước đơn giản sau:</p>
        <p>+ Bước 1: Nhắn tin cho các kênh Mạng xã hội hoặc Shopee hoặc Đường dây tiếp nhận phản hồi chính thức của SuitAble cung cấp thông tin địa chỉ của bạn: Họ tên, số điện thoại, địa chỉ và video mở gói hàng.</p>
        <p>+ Bước 2: Sau khi xác nhận đổi hàng, tụi mình sẽ gửi đơn hàng mới về địa chỉ của bạn. Bạn chỉ cần gửi hàng cần đổi trả cho nhân viên giao-nhận hàng.</p>
        <p>Tham khảo cách thức quay video mở sản phẩm:</p>
        <p>+ Clip rõ nét, trung thực quay từ cảnh kiểm tra bề mặt của gói hàng, lúc mở đến kiểm tra hàng.</p>
        <p>+ Clip không cắt ghép, không chỉnh sửa.</p>
        <p>+ Clip quay rõ được thông tin trên bưu phẩm: Tên người nhận, mã đơn hàng, địa chỉ, số điện thoại.</p>
        <p>Lưu ý:</p>
        <p>- Chính sách hoàn tiền này áp dụng tùy trường hợp với các đơn hàng từ sàn thương mại điện tử.</p>
        <p>- Đối với sản phẩm nằm trong chương trình giảm giá, bạn muốn đổi sang sản phẩm khác thì mọi khuyến mại, giảm giá sẽ không được giữ, sản phẩm mới sẽ được áp dụng giá tại website chính thức của SuitAble tại thời điểm đổi, nếu có chênh lệch giá bạn vui lòng thanh toán phần chênh lệch đó và phí giao hàng phát sinh.</p>
        <p>- Chỉ hoàn tiền với phương thức trực tuyến thông qua thẻ ATM nội địa, Visa,…</p>
        <p>- SuitAble có quyền quyết định dừng việc hỗ trợ trả lại tiền cho khách hàng nếu phát hiện khách hàng sử dụng chính sách để trục lợi.</p>
        <p>Mọi thắc mắc về Chính sách đổi hàng, khách hàng vui lòng gọi đến Đường dây tiếp nhận phản hồi 0123 456 789 để được bộ phận bán hàng hướng dẫn và giải quyết.</p>
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


  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          chính sách bảo hành
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
                    1. Đối tượng & thời gian áp dụng:
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>- Đối với sản phẩm áo, quần: Trong 14 ngày, từ ngày mua hàng theo thời gian ghi trên hoá đơn với các trường hợp bung chỉ, bung nút, kỹ thuật may, giãn cổ áo, quần,… và các trường hợp khác mà SuitAble có khả năng sửa chữa được. </p>
        <p>- Đối với sản phẩm phụ kiện: Trong 30 ngày, từ ngày mua hàng theo thời gian ghi trên hoá đơn với trường hợp bung đường chỉ, bung quai đeo, hư khoá kéo và tất cả những lỗi kỹ thuật do nhà sản xuất.</p>
        <p>Bạn sẽ được đổi sang sản phẩm mới 100%.</p>
        <p>- Chúng mình không bảo hành hình in cho tất cả sản phẩm, bạn có thể xem Hướng dẫn bảo quản/vệ sinh sản phẩm in ấn tại đây.</p>
        <p>Trong quá trình sử dụng sản phẩm, mọi thắc mắc vui lòng liên hệ Các trang Mạng xã hội của SuitAble (Facebook, Instagram, TikTok) hoặc Đường dây tiếp nhận phản hồi 1900 63 3028 để được tụi mình hỗ trợ nhanh chóng.</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    2. Thời gian bảo hành:
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>Trong 07-20 ngày tuỳ vào tình trạng sản phẩm sau khi nhận được hàng từ bạn.</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    3. Hỗ trợ sau thời gian bảo hành:
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>- SuitAble vẫn tiếp tục hỗ trợ bảo hành những lỗi đơn giản trong vòng 30 ngày kể từ ngày bạn nhận hàng đã bảo hành gửi trả.</p>
        <p>- Nếu sản phẩm của bạn có lỗi quá nặng do quá trình sử dụng lâu, tụi mình sẽ tư vấn hướng sửa chữa kèm với mức phí tốt nhất để bạn có thể dễ dàng quyết định.</p>
            </div>
          </div>

          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    4. Trường hợp không được bảo hành:
                  </h5>
                  <h6>
                    
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>- Lỗi do sử dụng không đúng cách như: sử dụng quá tải so với sức chứa, chịu lực, kích cỡ của sản phẩm, làm cho sản phẩm thay đổi quá nhiều so với hình dạng ban đầu.</p>
        <p>- Lỗi do bảo quản không đúng quy cách như: sử dụng chất tẩy rửa mạnh để giặt và gây lem màu, phơi nắng quá lâu làm hư hại sản phẩm…</p>
        <p>- Sản phẩm hư hỏng do tác động bên ngoài, biến dạng, rách thủng, ẩm mốc, cháy hoặc do người sử dụng làm hỏng.</p>
        <p>- Sản phẩm đã qua sử dụng bị dơ bẩn, đã được sửa chữa bởi người sử dụng.</p>
        <p>- Sản phẩm đã quá hạn bảo hành.</p>
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


  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>