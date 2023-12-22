<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý website</title>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/client_css.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <h3>Trang quản lí thông tin khách hàng</h3>
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
                            
                            <th>Tên tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Quyền hạn</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                        </tr>
                        <?php
                            include "connect.php";
                            $sql_select_list_tai_khoan = "SELECT * FROM taikhoan";
                            $result_select_list_tai_khoan = mysqLi_query($conn, $sql_select_list_tai_khoan);
                            while($row_select_list_tai_khoan = mysqLi_fetch_array($result_select_list_tai_khoan)){  
                        ?>
                        <tr>
                            
                            <td><?php echo$row_select_list_tai_khoan['tendangnhap'] ?></td>
                            <td><?php echo$row_select_list_tai_khoan['matkhau'] ?></td>
                            <td><?php echo$row_select_list_tai_khoan['quyenhan'] ?></td>
                            <td><?php echo$row_select_list_tai_khoan['ten'] ?></td>
                            <td><?php echo$row_select_list_tai_khoan['diachi'] ?></td>
                            <td><?php echo$row_select_list_tai_khoan['sdt'] ?></td>
                        </tr>
                        <?php    } ?>
                    </table>
                </div>
            </div>
            <div class="area_edit_info_product">
                <div class="edit_product">
                    <form class="form_edit_product" method="post" action="client.php">
                        <div class="form-group">
                          <label for="id_ac">Mã tài khoản:</label>
                          <input type="text" id="id_ac" name="id_ac" >
                        </div>
                        <div class="form-group">
                          <label for="name_user_ac">Tên tài khoản:</label>
                          <input type="text" id="name_user_ac" name="name_user_ac" >
                        </div>
                        <div class="form-group">
                          <label for="pass_ac">Mật khẩu</label>
                          <input type="text" id="pass_ac" name="pass_ac">
                        </div>
                        <div class="form-group">
                          <label for="quyen_ac">Quyền</label>
                          <input type="text" id="quyen_ac" name="quyen_ac">
                        </div>
                        <div class="form-group">
                          <label for="name">Tên</label>
                          <input type="text" id="name" name="name" >
                        </div>
                        <div class="form-group">
                          <label for="address_ac">Đại chỉ</label>
                          <input type="text" id="address_ac" name="address_ac" >
                        </div>
                        <div class="form-group">
                          <label for="phone_ac">SĐT</label>
                          <input type="text" id="phone_ac" name="phone_ac" >
                        </div>
                        
                        
                        <button type="submit" class="btn-delete" name="delete_account">Xóa</button>
                        <button type="submit" class="btn-update" name="update_account">Sửa</button>
                        <button type="submit" class="btn-update" name="reload_account">Cập nhật lại trang</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "connect.php";
        if(isset($_POST['delete_account'])) {
            $id_account = $_POST['id_ac'];
            $name_user = $_POST['name_user_ac'];
            $pass = $_POST['pass_ac'];
            $quyen = $_POST['quyen_ac'];
            $name = $_POST['name'];
            $address = $_POST['address_ac'];
            $sdt = $_POST['phone_ac'];

            $sql_delete_ac = "DELETE FROM taikhoan WHERE ID_Account LIKE '$id_account'";
            $result_delete_ac = mysqli_query($conn, $sql_delete_ac);
        }
        if(isset($_POST['update_account'])) {
            $id_account = $_POST['id_ac'];
            $id_account_old = $_POST['id_ac'];
            $name_user = $_POST['name_user_ac'];
            $pass = $_POST['pass_ac'];
            $quyen = $_POST['quyen_ac'];
            $name = $_POST['name'];
            $address = $_POST['address_ac'];
            $sdt = $_POST['phone_ac'];

            $sql_update_ac = "UPDATE taikhoan SET ID_Account='$id_account', tendangnhap='$name_user', matkhau='$pass', quyenhan=$quyen, ten='$name', diachi='$address', sdt='$sdt'
            WHERE ID_Account='$id_account_old' OR tendangnhap='$name_user'";
            $result_update_ac = mysqli_query($conn, $sql_update_ac);
        }
        if(isset($_POST['reload_account'])) {
            $id_account = '';
            $name_user = '';
            $pass = '';
            $quyen = 0;
            $name = '';
            $address = '';
            $sdt = '';     
            
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
    const formInsert = document.querySelector('.form_insert');
    const idInput = document.getElementById('id_ac');
    const nameInput = document.getElementById('name_user_ac');
    const passInput = document.getElementById('pass_ac');  
    const quyenInput = document.getElementById('quyen_ac');
    const namesInput = document.getElementById('name');
    const addressInput = document.getElementById('address_ac');
    const sdtInput = document.getElementById('phone_ac');
    // Lấy tất cả các hàng trong bảng
    const rows = document.querySelectorAll('.list_products tr');

    // Xử lý sự kiện click trên mỗi hàng
    rows.forEach(row => {
        row.addEventListener('click', () => {
            // Lấy các giá trị từ hàng được nhấp vào
            const id = row.cells[0].textContent;
            const name_user = row.cells[1].textContent;
            const pass = row.cells[2].textContent;
            const quyen = row.cells[3].textContent;
            const name = row.cells[4].textContent;
            const address = row.cells[5].textContent;
            const sdt = row.cells[6].textContent;        

            // Đổ dữ liệu vào form
            idInput.value = id;
            nameInput.value = name;
            passInput.value = pass;
            quyenInput.value = quyen;
            namesInput.value = name;
            addressInput.value = address;
            sdtInput.value = sdt;
        });
    });
        </script>
</body>
</html>