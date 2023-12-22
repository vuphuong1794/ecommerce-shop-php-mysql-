<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý website</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/products_css.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <style>
        *

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
    <div class="section_menu_admin">
        <div class="represent_menu">
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
                <div class="manage_product_detail manage_list_products">
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
            <!-- <img class="img_account" src="./logo.jpg" alt=""> -->
            <h3>Trang quản lí sản phẩm</h3>
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
            <div class="area_section_data">
                <div class="list_info_detail_product">
                    <table class="list_products">
                        
                        <tr>
                            <th>Mã SP</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại</th>
                            <th>Free ship</th>
                            <th>Giá cả</th>
                            <th>Giá ship</th>
                            <th>Phương thức</th>
                            <th>Giảm giá</th>
                            <th>Hình ảnh 1</th>
                            <th>Hình ảnh 2</th>
                            <th>Hình ảnh 3</th>
                        </tr>
                        <?php 
                            include "connect.php";

                            $sql_select_list_san_pham = "SELECT * FROM sanpham";
                            $result_select_list_san_pham = mysqLi_query($conn, $sql_select_list_san_pham);
                            while($row_select_list_san_pham = mysqLi_fetch_array($result_select_list_san_pham)){  
                        ?>
                        
                        <tr>
                            <td><?php echo$row_select_list_san_pham['masp'] ?></td>
                            <td><?php echo$row_select_list_san_pham['tensp'] ?></td>
                            <td><?php echo$row_select_list_san_pham['loai'] ?></td>
                            <td><?php echo$row_select_list_san_pham['freeship'] ?></td>
                            <td><?php echo$row_select_list_san_pham['giaca'] ?></td>
                            <td><?php echo$row_select_list_san_pham['giaship'] ?></td>
                            <td><?php echo$row_select_list_san_pham['pt']?></td>
                            <td><?php echo$row_select_list_san_pham['giamgia'] ?></td>
                            <td><?php echo$row_select_list_san_pham['hinhanh1'] ?></td>
                            <td><?php echo$row_select_list_san_pham['hinhanh2'] ?></td>
                            <td><?php echo$row_select_list_san_pham['hinhanh3'] ?></td>
                        </tr>
                        <?php    } ?>
                        
                    </table>
                </div>
            </div>
            <div class="area_edit_info_product">
                <div class="edit_product">
                    <form class="form_edit_product" method="post" action="products.php">
                        <div class="form-group">
                          <label for="id">Mã sản phẩm:</label>
                          <input type="text" id="id" name="id">
                        </div>
                        <div class="form-group">
                          <label for="name">Tên sản phẩm:</label>
                          <input type="text" id="name" name="name">
                        </div>
                        <div class="form-group">
                          <label for="type">Loại:</label>
                          <input type="text" id="type" name="type">
                        </div>
                        <div class="form-group">
                          <label for="freeship">Free ship:</label>
                          <input type="text" id="freeship" name="freeship">
                        </div>
                        <div class="form-group">
                          <label for="price">Giá cả:</label>
                          <input type="text" id="price" name="price">
                        </div>
                        <div class="form-group">
                          <label for="price_ship">Giá ship:</label>
                          <input type="text" id="price_ship" name="price_ship">
                        </div>
                        <div class="form-group">
                          <label for="method">Phương thức:</label>
                          <input type="text" id="method" name="method">
                        </div>
                        <div class="form-group">
                          <label for="discount">Giảm giá:</label>
                          <input type="text" id="discount" name="discount">
                        </div>
                        <div class="form-group">
                          <label for="pic1">Hình ảnh 1:</label>
                          <input type="text" id="pic1" name="pic1">
                        </div>
                        <div class="form-group">
                          <label for="pic2">Hình ảnh 2:</label>
                          <input type="text" id="pic2" name="pic2">
                        </div>
                        <div class="form-group">
                          <label for="pic3">Hình ảnh 3:</label>
                          <input type="text" id="pic3" name="pic3">
                        </div>
                        <button type="submit" class="btn-insert" name="insert_san_pham">Thêm</button>
                        <button type="submit" class="btn-delete" name="delete_san_pham">Xóa</button>
                        <button type="submit" class="btn-update" name="update_san_pham">Sửa</button>
                        <button type="submit" class="btn-update" name="reload_san_pham">Cập nhật lại trang</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "connect.php";
        if(isset($_POST['insert_san_pham'])) {
            $id_sp = $_POST['id'];
            $name_sp = $_POST['name'];
            $type_sp = $_POST['type'];
            $freeship_sp = $_POST['freeship'];
            $price_sp = $_POST['price'];
            $price_ship_sp = $_POST['price_ship']; 
            $method_sp = $_POST['method'];
            $discount_sp = $_POST['discount'];
            $picture1 = $_POST['pic1'];
            $picture2 = $_POST['pic2'];
            $picture3 = $_POST['pic3'];     
            
            $sql_insert_sp = "INSERT INTO sanpham (masp, tensp, loai, freeship, giaca, giaship, pt, giamgia, hinhanh1, hinhanh2, hinhanh3) VALUES ('$id_sp','$name_sp',' $type_sp', $freeship_sp, $price_sp, $price_ship_sp, '$method_sp', $discount_sp, '$picture1', '$picture2', '$picture3')";
            $result_insert_sp = mysqli_query($conn, $sql_insert_sp);
        }
        if(isset($_POST['delete_san_pham'])) {
            $id_sp = $_POST['id'];
            $name_sp = $_POST['name'];
            $type_sp = $_POST['type'];
            $freeship_sp = $_POST['freeship'];
            $price_sp = $_POST['price'];
            $price_ship_sp = $_POST['price_ship']; 
            $method_sp = $_POST['method'];
            $discount_sp = $_POST['discount'];
            $picture1 = $_POST['pic1'];
            $picture2 = $_POST['pic2'];
            $picture3 = $_POST['pic3'];
            $sql_delete_sp = "DELETE FROM sanpham WHERE masp LIKE '$id_sp'";
            $result_delete_sp = mysqli_query($conn, $sql_delete_sp);
        }
        if(isset($_POST['update_san_pham'])) {
            $id_old = $_POST['id'];
            $id_sp = $_POST['id'];
            $name_sp = $_POST['name'];
            $type_sp = $_POST['type'];
            $freeship_sp = $_POST['freeship'];
            $price_sp = $_POST['price'];
            $price_ship_sp = $_POST['price_ship']; 
            $method_sp = $_POST['method'];
            $discount_sp = $_POST['discount'];
            $picture1 = $_POST['pic1'];
            $picture2 = $_POST['pic2'];
            $picture3 = $_POST['pic3'];
            $sql_update_sp = "UPDATE sanpham SET masp='$id_sp', tensp='$name_sp',loai='$type_sp',freeship=$freeship_sp,giaca=$price_sp,giaship=$price_ship_sp,pt='$method_sp',giamgia=$discount_sp,hinhanh1='$picture1',hinhanh2='$picture2',hinhanh3='$picture3'
            WHERE masp = '$id_old' OR tensp='$name_sp'";
            $result_update_sp = mysqli_query($conn, $sql_update_sp);
        }
        if(isset($_POST['reload_san_pham'])) {
            $id_sp = '';
            $name_sp = '';
            $type_sp = '';
            $freeship_sp = 0;
            $price_sp = 0;
            $price_ship_sp = 0; 
            $method_sp = '';
            $discount_sp = 0;
            $picture1 = '';
            $picture2 = '';
            $picture3 = '';     
            
            // $sql_insert_sp = "SELECT masp FROM sanpham";
            // $result_insert_sp = mysqli_query($conn, $sql_insert_sp);
        }
        // $check_sql_san_pham = "DELETE FROM sanpham
        // WHERE masp IN (
        //     SELECT masp
        //     FROM sanpham
        //     GROUP BY masp
        //     HAVING COUNT(masp) > 1
        // ); ";
        // $check_result_san_pham = mysqli_query($conn, $check_sql_san_pham);
    ?>
    <script>

        // css đổ dữ liệu vào form
         // Lấy các phần tử trong form
    const formInsert = document.querySelector('.form_edit_product');
    const idInput = document.getElementById('id');
    const nameInput = document.getElementById('name');
    const typeInput = document.getElementById('type');
    const freeshipInput = document.getElementById('freeship');  
    const priceInput = document.getElementById('price');
    const price_shipInput = document.getElementById('price_ship');
    const methodInput = document.getElementById('method');
    const discountInput = document.getElementById('discount');
    const pic1Input = document.getElementById('pic1');
    const pic2Input = document.getElementById('pic2');
    const pic3Input = document.getElementById('pic3');
    // Lấy tất cả các hàng trong bảng
    const rows = document.querySelectorAll('.list_products tr');

    // Xử lý sự kiện click trên mỗi hàng
    rows.forEach(row => {
        row.addEventListener('click', () => {
            // Lấy các giá trị từ hàng được nhấp vào
            const id = row.cells[0].textContent;
            const name = row.cells[1].textContent;
            const type = row.cells[2].textContent;
            const freeship = row.cells[3].textContent;
            const price = row.cells[4].textContent;
            const price_ship = row.cells[5].textContent;
            const method = row.cells[6].textContent;
            const discount = row.cells[7].textContent;
            const pic1 = row.cells[8].textContent;
            const pic2 = row.cells[9].textContent; 
            const pic3 = row.cells[10].textContent;             

            // Đổ dữ liệu vào form
            idInput.value = id;
            nameInput.value = name;
            typeInput.value = type;
            freeshipInput.value = freeship;
            priceInput.value = price;
            price_shipInput.value = price_ship;
            methodInput.value = method;
            discountInput.value = discount;
            pic1Input.value = pic1;
            pic2Input.value = pic2;
            pic3Input.value = pic3;
        });
    });
        </script>
</body>
</html>