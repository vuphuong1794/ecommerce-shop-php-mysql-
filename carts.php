<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý website</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/carts_css.css">
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
            <h3>Trang quản lý giỏ hàng</h3>
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
                            <th>Mã đơn hàng</th>
                            <th>tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Size</th>
                            <th>Ngày lập</th>
                            <th>Tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                        <?php
                            include "connect.php";
                            $sql_select_list_don_hang = "SELECT * FROM tb_donhang";
                            $result_select_list_don_hang = mysqLi_query($conn, $sql_select_list_don_hang);
                            while($row_select_list_don_hang = mysqLi_fetch_array($result_select_list_don_hang)){  
                        ?>
                        <tr>
                            <td><?php echo$row_select_list_don_hang['ID_DonHang'] ?></td>
                            <td><?php echo$row_select_list_don_hang['tenKhachHang'] ?></td>
                            <td><?php echo$row_select_list_don_hang['diaChi'] ?></td>
                            <td><?php echo$row_select_list_don_hang['SDT'] ?></td>
                            <td><?php echo$row_select_list_don_hang['sanPham'] ?></td>
                            <td><?php echo$row_select_list_don_hang['soLuong'] ?></td>
                            <td><?php echo$row_select_list_don_hang['size'] ?></td>
                            <td><?php echo$row_select_list_don_hang['ngaylap'] ?></td>
                            <td><?php echo$row_select_list_don_hang['tien'] ?></td>
                            <td><?php echo$row_select_list_don_hang['trangthai'] ?></td>
                        </tr> 
                        <?php    } ?>                  
                    </table>
                </div>
            </div>
            <div class="area_edit_info_product">
                <div class="edit_carts">
                    <form class="form_edit_cart" method="post" action="carts.php">
                        <div class="form-group">
                            <label for="id_dh">Mã đơn hàng:</label>
                            <input type="text" id="id_dh" name="id_dh">
                        </div>
                        <div class="form-group">
                            <label for="name">Tên khách hàng:</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="SDT">Số điện thoại:</label>
                            <input type="text" id="SDT" name="SDT">
                        </div>
                        <div class="form-group">
                            <label for="sanpham">Sản phẩm:</label>
                            <input type="text" id="sanpham" name="sanpham">
                        </div>
                        <div class="form-group">
                            <label for="soluong">Số lượng:</label>
                            <input type="text" id="soluong" name="soluong">
                        </div>
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input type="text" id="size" name="size">
                        </div>
                        <div class="form-group">
                            <label for="date_dh">Ngày lập:</label>
                            <input type="text" id="date_dh" name="date_dh">
                        </div>
                        <div class="form-group">
                            <label for="tien">Tiền:</label>
                            <input type="text" id="tien" name="tien">
                        </div>
                        <div class="form-group">
                            <label for="trangthai">Trạng thái:</label>
                            <input type="text" id="trangthai" name="trangthai">
                        </div>
                       
                        <button type="submit" class="btn-delete" name="delete_donhang">xóa</button>
                        <button type="submit" class="btn-update" name="update_donhang">Sửa</button>
                        <button type="submit" class="btn-reload" name="reload_donhang">Cập nhật lại trang</button>
                    </form>
                </div>
                
            </div>

        </div>
    </div>

    <?php
        include "connect.php";
        if(isset($_POST['delete_donhang'])) {
            $id_dh = $_POST['id_dh'];
            $name_user = $_POST['name'];
            $address = $_POST['address'];
            $sdt = $_POST['SDT'];
            $sanpham_dh = $_POST['sanpham'];
            $soluong_dh = $_POST['soluong'];
            $size_dh = $_POST['size'];
            $ngaylap_dh = $_POST['date_dh'];
            $tien_dh = $_POST['tien'];
            $trangthai_dh = $_POST['trangthai'];

            $sql_delete_dh = "DELETE FROM tb_donhang WHERE ID_DonHang LIKE '$id_dh'";
            $result_delete_dh = mysqli_query($conn, $sql_delete_dh);
        }
        if(isset($_POST['update_donhang'])) {
            $id_dh = $_POST['id_dh'];
            $id_dh_old = $_POST['id_dh'];
            $name_user = $_POST['name'];
            $address = $_POST['address'];
            $sdt = $_POST['SDT'];
            $sanpham_dh = $_POST['sanpham'];
            $soluong_dh = $_POST['soluong'];
            $size_dh = $_POST['size'];
            $ngaylap_dh = $_POST['date_dh'];
            $tien_dh = $_POST['tien'];
            $trangthai_dh = $_POST['trangthai'];

            $sql_update_dh = "UPDATE tb_donhang SET ID_DonHang = $id_dh, tenKhachHang='$name_user', diaChi='$address',
            SDT='$sdt', sanPham='$sanpham_dh', soLuong=$soluong_dh, size='$size_dh', ngaylap='$ngaylap_dh',
            tien=$tien_dh, trangthai='$trangthai_dh' WHERE ID_DonHang = $id_dh OR tenKhachHang='$name_user';";
            $result_update_dh = mysqli_query($conn, $sql_update_dh);
        }
        if(isset($_POST['reload_donhang'])) {
            $id_dh = '';
            $name_user = '';
            $address = '';
            $sdt = '';
            $sanpham_dh = '';
            $soluong_dh = 0;
            $size_dh = '';
            $ngaylap_dh = '';
            $tien_dh = 0;
            $trangthai_dh = '';    
            
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

    const iddhInput = document.getElementById('id_dh');
    const namedhInput = document.getElementById('name');
    const diachidhInput = document.getElementById('address');  
    const sdtdhInput = document.getElementById('SDT');
    const sanphamdhInput = document.getElementById('sanpham');
    const soluongdhInput = document.getElementById('soluong');
    const sizedhInput = document.getElementById('size');
    const ngaylapdhInput = document.getElementById('date_dh');
    const tiendhInput = document.getElementById('tien');
    const trangthaidhInput = document.getElementById('trangthai');
    // Lấy tất cả các hàng trong bảng
    const rows = document.querySelectorAll('.list_products tr');

    // Xử lý sự kiện click trên mỗi hàng
    rows.forEach(row => {
        row.addEventListener('click', () => {
            // Lấy các giá trị từ hàng được nhấp vào
            const iddh = row.cells[0].textContent;
            const namedh = row.cells[1].textContent;
            const diachidh = row.cells[2].textContent;
            const sdtdh = row.cells[3].textContent;
            const sanphamdh = row.cells[4].textContent;
            const soluongdh = row.cells[5].textContent;
            const sizedh = row.cells[6].textContent;
            const ngaylapdh = row.cells[7].textContent;
            const tiendh = row.cells[8].textContent;
            const trangthaidh = row.cells[9].textContent;
            // Đổ dữ liệu vào form
            iddhInput.value = iddh;
            namedhInput.value = namedh;
           diachidhInput.value = diachidh;
           sdtdhInput.value = sdtdh ;
           sanphamdhInput.value = sanphamdh;
           soluongdhInput.value = soluongdh;
           sizedhInput.value = sizedh;
           ngaylapdhInput.value = ngaylapdh;
           tiendhInput.value = tiendh;
           trangthaidhInput.value = trangthaidh;
        });
    });
        </script>
</body>
</html>