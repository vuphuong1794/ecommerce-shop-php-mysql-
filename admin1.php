<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý website</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/admin_css.css">
    
</head>
<style>
        

        .section_account_admin h3 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        .welcome-msg {
            display: block;
            text-align: center;
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .welcome-msg button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .welcome-msg button a {
            color: #fff;
            text-decoration: none;
        }
        </style>
<body>
    <?php
        $tongtien_sum=0;
        $tongtien_quarterly=0;
        $tongtien_month=0;
        $tongtien_day=0;

        $tong_bill=0;
        $bill_wait=0;
        $bill_moving=0;
        $bill_delivered=0;

        $tong_SL_ban=0;
        $ban_chay1=0;
        $ban_chay2=0;
        $ban_chay3=0;
    ?>
    <div class="section_menu_admin">
        <div class="represent_menu">
            <!-- <img class="logo_website" src="./log" alt=""> -->
            <img class="logo_website" src="logosuit.png" alt="">
            
        </div>
        <hr width="100%">
        <div class="options_menu">
            <div class="status_manage">
                <h3 class="infomation_sum"><a href="admin.php">Thông tin trạng thái quản lý</a></h3>
            </div>
            <hr style="margin: 0 auto; width:80%;" >
            <div class="manage_products">
                <h3 class="title_product">Sản phẩm</h3>
                <hr style="margin: 0 auto; width:60%;" >
                <div class="manage_product_detail manage_products">
                    <h3><a href="products.php">Quản lý sản phẩm</a></h3>
                </div>
                <div class="manage_product_detail manage_carts">
                    <h3><a href="carts.php">Quản lý giỏ hàng</a></h3>
                </div>
            </div>
            <div class="manage_clients">
                <h3 class="title_clients">Khách hàng</h3>
                <hr style="margin: 0 auto; width:60%;" >
                <div class="manage_client-detail manage_list_client">
                    <h3><a href="client.php">Quản lý thông tin khách hàng</a></h3>
                </div>                
            </div>
            
        </div>
    </div>
    <div class="section_right_manage">
        <div class="section_account_admin">
            <!-- <img class="img_account" alt="Trang quản lí"> -->
            <h3>Trang quản lí</h3>
            <?php
                session_start();
                if (isset($_SESSION['loged'])) {
                  echo '<span class="welcome-msg"> Xin chào '.$_SESSION['name']. ' <button><a href="logout.php">Đăng xuất</a></button>';
                //   $clean_text = strip_tags($html_dangnhap);
                  $let_Account = $_SESSION['loged'];
                } else {
                    echo '<script type="text/javascript">alert("Bạn chưa đăng nhập! Vui lòng đăng nhập để tiếp tục!"); window.location="login.php";</script>';
                }
                
            ?>
        </div>
        <div class="section_layout_content">
            <div class="top_content">
                <div class="layout_infomation_content">
                    <h4 class="title_infomation">Doanh thu</h4>
                    <hr style=" width:100%;" >
                    <div class="detail_infomation">
                        <div class="left_info">
                            <?php
                                include "connect.php";
                                
                                $sql_select_money_sum = "SELECT SUM(tien) AS tongtien FROM tb_donhang";
                                $result_select_money_sum = mysqLi_query($conn, $sql_select_money_sum);
                                $row_select_money_sum = mysqLi_fetch_array($result_select_money_sum);
                                $tongtien_sum = $row_select_money_sum['tongtien'];

                                $sql_select_money_quarterly ="SELECT COALESCE(SUM(tien), 0) AS tong_tien
                                FROM tb_donhang 
                                WHERE MONTH(ngaylap) >= 1 AND MONTH(ngaylap) <= 7;";
                                $result_select_money_quarterly = mysqLi_query($conn, $sql_select_money_quarterly);
                                $row_select_money_quarterly = mysqLi_fetch_array($result_select_money_quarterly);
                                $tongtien_quarterly = $row_select_money_quarterly['tong_tien'];

                                $sql_select_money_month ="SELECT COALESCE(SUM(tien), 0) AS tong_tien
                                FROM tb_donhang 
                                WHERE MONTH(ngaylap) = 8 ";
                                $result_select_money_month = mysqLi_query($conn, $sql_select_money_month);
                                $row_select_money_month = mysqLi_fetch_array($result_select_money_month);
                                $tongtien_month = $row_select_money_month['tong_tien'];

                                $sql_select_money_day ="SELECT COALESCE(SUM(tien), 0) AS tong_tien
                                FROM tb_donhang
                                WHERE DAY(ngaylap) = 1;";
                                $result_select_money_day = mysqLi_query($conn, $sql_select_money_day);
                                $row_select_money_day = mysqLi_fetch_array($result_select_money_day);
                                $tongtien_day = $row_select_money_day['tong_tien'];
                            ?>
                            <div class="chart_revenue total_revenue" style="position: relative;">
                            
                                <h4>Tổng doanh thu:</h4>
                                <p><?php echo $tongtien_sum?></p>
                                <div class="manage_revenue">100%</div>
                            </div>    
                            <div class="chart_revenue quarterly_revenue">
                                <h4>Doanh thu quý:</h4>
                                <p><?php echo $tongtien_quarterly?></p>
                                <div class="manage_revenue"><?php echo round(($tongtien_quarterly / $tongtien_sum) * 100) . '%'; ?></div>
                            </div>    
                            <div class="chart_revenue quarterly_month">
                                <h4>Doanh thu tháng:</h4>
                                <p><?php echo $tongtien_month?></p>
                                <div class="manage_revenue"><?php echo round(($tongtien_month / $tongtien_sum) * 100) . '%'; ?></div>
                            </div>
                            <div class="chart_revenue quarterly_day">
                                <h4>Doanh thu ngày:</h4>
                                <p><?php echo $tongtien_day?></p>
                                <div class="manage_revenue"><?php echo round(($tongtien_day / $tongtien_sum) * 100) . '%'; ?></div>
                            </div>
                        </div>
                        <div class="right_info">
                            <div class="progress_circle_revenue">
                                <div class="progress_total_revenue">
                                    <span class="percentage">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layout_infomation_content">
                    <h4 class="title_infomation">Vận chuyển đơn hàng</h4>
                    <hr style=" width:100%;" >
                    <div class="detail_infomation">
                        <div class="left_info">
                            <?php
                                include "connect.php";
                                
                                $sql_select_bill_sum = "SELECT Count(ID_DonHang) AS tongbill FROM tb_donhang ;                                ";
                                $result_select_bill_sum = mysqLi_query($conn, $sql_select_bill_sum);
                                $row_select_bill_sum = mysqLi_fetch_array($result_select_bill_sum);
                                $tong_bill = $row_select_bill_sum['tongbill'];

                                $sql_select_bill_wait ="SELECT Count(ID_DonHang) AS waitbill FROM tb_donhang WHERE trangthai LIKE '%Chờ duyệt%'";
                                $result_select_bill_wait = mysqLi_query($conn, $sql_select_bill_wait);
                                $row_select_bill_wait = mysqLi_fetch_array($result_select_bill_wait);
                                $bill_wait = $row_select_bill_wait['waitbill'];

                                $sql_select_bill_moving ="SELECT Count(ID_DonHang) AS movingbill FROM tb_donhang WHERE trangthai LIKE '%Đang chuyển%'";
                                $result_select_bill_moving = mysqLi_query($conn, $sql_select_bill_moving);
                                $row_select_bill_moving = mysqLi_fetch_array($result_select_bill_moving);
                                $bill_moving = $row_select_bill_moving['movingbill'];

                                $sql_select_bill_delivered ="SELECT Count(ID_DonHang) AS deliveredbill FROM tb_donhang WHERE trangthai LIKE '%Đã chuyển%'";
                                $result_select_bill_delivered = mysqLi_query($conn, $sql_select_bill_delivered);
                                $row_select_bill_delivered = mysqLi_fetch_array($result_select_bill_delivered);
                                $bill_delivered = $row_select_bill_delivered['deliveredbill'];
                            ?>
                            <div class="chart_transport total_transport">
                                <h4>Tổng đơn:</h4>
                                <p><?php echo $tong_bill?></p>
                                <div class="manage_transport">100%</div>
                            </div>    
                            <div class="chart_transport total_shipped">
                                <h4>Chờ duyệt:</h4>
                                <p><?php echo  $bill_wait?></p>
                                <div class="manage_transport"><?php echo round(($bill_wait / $tong_bill) * 100) . '%'; ?></div>
                            </div>    
                            <div class="chart_transport total_shipping">
                                <h4>Đang chuyển:</h4>
                                <p><?php echo  $bill_moving?></p>
                                <div class="manage_transport"><?php echo round(($bill_moving / $tong_bill) * 100) . '%'; ?></div>
                            </div>
                            <div class="chart_transport total_not_ship">
                                <h4>Đã chuyển:</h4>
                                <p><?php echo  $bill_delivered?></p>
                                <div class="manage_transport"><?php echo round(($bill_delivered / $tong_bill) * 100) . '%'; ?></div>
                            </div>
                        </div>
                        <div class="right_info">
                            <div class="progress_circle_transport">
                                <div class="progress_total_transport"></div>
                                <span class="percentage_transport">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom_content">
                <div class="layout_infomation_content">
                    <h4 class="title_infomation">Sản phẩm bán chạy</h4>
                    <hr style=" width:100%;" >
                    <div class="detail_infomation">
                        <div class="left_info">
                            <?php
                                include "connect.php";
                                
                                $sql_select_sum_SL_ban = "SELECT SUM(soLuong) AS tongsoluong FROM tb_donhang";
                                $result_select_sum_SL_ban = mysqLi_query($conn, $sql_select_sum_SL_ban);
                                $row_select_sum_SL_ban = mysqLi_fetch_array($result_select_sum_SL_ban);
                                $tong_SL_ban = $row_select_sum_SL_ban['tongsoluong'];

                                $sql_select_ban_chay_1 ="SELECT * FROM tb_donhang ORDER BY soLuong DESC LIMIT 1;";
                                $result_select_ban_chay_1 = mysqLi_query($conn, $sql_select_ban_chay_1);
                                $row_select_ban_chay_1 = mysqLi_fetch_array($result_select_ban_chay_1);
                                $ban_chay1 = $row_select_ban_chay_1['soLuong'];
                                $ten_sp_bc_1 = $row_select_ban_chay_1['sanPham'];

                                $sql_select_ban_chay_2 ="SELECT * FROM tb_donhang ORDER BY soLuong DESC LIMIT 1 OFFSET 1;";
                                $result_select_ban_chay_2 = mysqLi_query($conn, $sql_select_ban_chay_2);
                                $row_select_ban_chay_2 = mysqLi_fetch_array($result_select_ban_chay_2);
                                $ban_chay2 = $row_select_ban_chay_2['soLuong'];
                                $ten_sp_bc_2 = $row_select_ban_chay_2['sanPham'];

                                $sql_select_ban_chay_3 ="SELECT * FROM tb_donhang ORDER BY soLuong DESC LIMIT 1 OFFSET 2;";
                                $result_select_ban_chay_3 = mysqLi_query($conn, $sql_select_ban_chay_3);
                                $row_select_ban_chay_3 = mysqLi_fetch_array($result_select_ban_chay_3);
                                $ban_chay3 = $row_select_ban_chay_3['soLuong'];
                                $ten_sp_bc_3 = $row_select_ban_chay_3['sanPham'];
                            ?>
                            <div class="chart_comment total_comment" style="position: relative;">
                                <h4>Số lượng sản phẩm đã bán:</h4>
                                <p><?php echo$tong_SL_ban ?></p>
                                <div class="manage_comment">100%</div>
                            </div>    
                            <div class="chart_comment comment_5*">
                                <h4>Bán chạy I:</h4>
                                <p><?php echo$ten_sp_bc_1?></p>
                                <div class="manage_comment"><?php echo round(($ban_chay1 / $tong_SL_ban) * 100) . '%'; ?></div>
                            </div>    
                            <div class="chart_comment comment_4*">
                                <h4>Bán chạy II:</h4>
                                <p><?php echo$ten_sp_bc_2?></p>
                                <div class="manage_comment"><?php echo round(($ban_chay2 / $tong_SL_ban) * 100) . '%'; ?></div>
                            </div>
                            <div class="chart_comment comment_3*">
                                <h4>Bán chạy III:</h4>
                                <p><?php echo$ten_sp_bc_3?></p>
                                <div class="manage_comment"><?php echo round(($ban_chay3 / $tong_SL_ban) * 100) . '%'; ?></div>
                            </div>
                        </div>
                        <div class="right_info">
                            <div class="progress_circle_comment">
                                <div class="progress_total_comment">
                                    <span class="percentage_comment">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- <div class="bottom_content"> -->
                    <!-- <div class="layout_infomation_content">
                        <h4 class="title_infomation">Đánh giá sản phẩm</h4>
                        <hr style=" width:100%;" >
                        <div class="detail_infomation">
                            <div class="left_info">
                                <div class="chart_thinking total_thinking" style="position: relative;">
                                    <h4>Tổng lượt đánh giá:</h4>
                                    <p>12000</p>
                                    <div class="manage_thinking">100%</div>
                                </div>    
                                <div class="chart_thinking thinking_5">
                                    <h4>Lượt tốt:</h4>
                                    <p>1200</p>
                                    <div class="manage_thinking">35%</div>
                                </div>    
                                <div class="chart_thinking thinking_4">
                                    <h4>Lượt trung:</h4>
                                    <p>4500</p>
                                    <div class="manage_thinking">24%</div>
                                </div>
                                <div class="chart_thinking thinking_3">
                                    <h4>Lượt xuất:</h4>
                                    <p>2100</p>
                                    <div class="manage_thinking">12%</div>
                                </div>
                            </div>
                            <div class="right_info">
                                <div class="progress_circle_thinking">
                                    <div class="progress_total_thinking">
                                        <span class="percentage_thinking">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- </div> -->
            </div>
        </div>
    </div>
    <script>
        // lấy % biểu đồ doanh thu
        let circularProgress = document.querySelector(".progress_total_revenue"),
        progressValue = document.querySelector(".percentage");

        let progressStartValue = 0,
        speed = 10;
        
        let percentageOptions = document.querySelectorAll(".manage_revenue");
        //  lấy % biểu đồ vận chuyển
        let progressTransport = document.querySelector(".progress_total_transport"),
        progressValueTransport = document.querySelector(".percentage_transport");
        let percentageTransport = document.querySelectorAll(".manage_transport");
        // lấy % biểu đồ comment
        let progressComment = document.querySelector(".progress_total_comment"),
        progressValueComment = document.querySelector(".percentage_comment");
        let percentageComment = document.querySelectorAll(".manage_comment");
        let total_Comment = document.querySelector(".total_comment");
        // lấy % biểu đồ thinking
        let progressThinking = document.querySelector(".progress_total_thinking"),
        progressValueThinking = document.querySelector(".percentage_thinking");
        let percentageThinking = document.querySelectorAll(".manage_thinking");
        let total_Thinking = document.querySelector(".total_thinking");

        percentageOptions.forEach(manage_revenue => {
            manage_revenue.addEventListener("click", function() {
                progressStartValue = 0;
                
                let progressEndValue = parseFloat(this.textContent);
                let progress = setInterval(() => {
                    progressStartValue++;
                    progressValue.textContent=`${progressStartValue}%`
                    circularProgress.style.background = `conic-gradient(#c3f900 ${progressStartValue * 3.6}deg, white 0deg)`

                    if(progressStartValue == progressEndValue){
                        clearInterval(progress);
                    }

                }, speed)
            });
        });
        percentageTransport.forEach(manage_transport => {
            manage_transport.addEventListener("click", function(){
                progressStartValue = 0;
                let progressEndValue = parseFloat(this.textContent);
                let progress = setInterval(() => {
                    progressStartValue++;

                    progressValueTransport.textContent=`${progressStartValue}%`
                    progressTransport.style.background = `conic-gradient(#c3f900 ${progressStartValue * 3.6}deg, white 0deg)`

                    if(progressStartValue == progressEndValue){
                        clearInterval(progress);
                    }
                }, speed)
            });
        });
        percentageComment.forEach(manage_comment => {
            manage_comment.addEventListener("click", function(){
                progressStartValue = 0;
                let progressEndValue = parseFloat(this.textContent);
                let progress = setInterval(() => {
                    progressStartValue++;

                    progressValueComment.textContent=`${progressStartValue}%`
                    progressComment.style.background = `conic-gradient(#c3f900 ${progressStartValue * 3.6}deg, white 0deg)`

                    if(progressStartValue == progressEndValue){
                        clearInterval(progress);
                    }
                }, speed)
            });
        });
        
        percentageThinking.forEach(manage_thinking => {
            manage_thinking.addEventListener("click", function(){
                progressStartValue = 0;
                let progressEndValue = parseFloat(this.textContent);
                let progress = setInterval(() => {
                    progressStartValue++;

                    progressValueThinking.textContent=`${progressStartValue}%`
                    progressThinking.style.background = `conic-gradient(#c3f900 ${progressStartValue * 3.6}deg, white 0deg)`

                    if(progressStartValue == progressEndValue){
                        clearInterval(progress);
                    }
                }, speed)
            });
        });

    </script>
</body>
</html>