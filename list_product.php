<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý website</title>
    <link rel="stylesheet" href="list_product.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="section_menu_admin">
        <div class="represent_menu">
            <img class="logo_website" src="./logo.jpg" alt="">
            <h3 class="title_website">Website</h3>
            
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
                <div class="manage_product_detail manage_list_products">
                    <h3><a href="list_product.php">Quản lý danh mục sản phẩm</a></h3>
                </div>
                <div class="manage_product_detail manage_carts">
                    <h3><a href="carts.php">Quản lý giỏ hàng</a></h3>
                </div>
                <div class="manage_product_detail manage_status_driver">
                    <h3><a href="status_driver.php">Quản lý giao hàng</a></h3>
                </div>
            </div>
            <div class="manage_clients">
                <h3 class="title_clients">Khách hàng</h3>
                <hr style="margin: 0 auto; width:60%;" >
                <div class="manage_client-detail manage_list_client">
                    <h3><a href="client.php">Quản lý thông tin khách hàng</a></h3>
                </div>
                <div class="manage_client-detail manage_list_driver">
                    <h3><a href="x.php">Quản lý chưa nghĩ ra</a></h3>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="section_right_manage">
        <div class="section_account_admin">
            <img class="img_account" src="./logo.jpg" alt="">
        </div>
        <div class="section_layout_content">
            <div class="area_section_data">
                <div class="list_info_detail_product">
                    <table class="list_products">
                        <tr>
                            <th>Mã TL</th>
                            <th>Thể loại</th>
                        </tr>
                        <tr>
                            <th>TL01</th>
                            <th>Cây trồng trong nhà</th>
                        </tr> 
                        <tr>
                            <th>TL02</th>
                            <th>Cây cảnh văn phòng</th>
                        </tr> 
                        <tr>
                            <th>TL03</th>
                            <th>Cây tiểu cảnh</th>
                        </tr>                        
                    </table>
                </div>
            </div>
            <div class="area_edit_info_product">
                <div class="edit_list_product">
                    <form class="form_edit" action="">
                        <div class="form-group">
                            <label for="id">Mã thể loại:</label>
                            <input type="text" id="id" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Tên thể loại:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                            <input type="submit" class="btn-insert" value="Thêm">
                            <input type="submit" class="btn-delete" value="Xóa">
                            <input type="submit" class="btn-update" value="Sửa">
                    </form>
                </div>
                
            </div>

        </div>
    </div>
    <script>

        // css đổ dữ liệu vào form
         // Lấy các phần tử trong form
    const formInsert = document.querySelector('.form_insert');
    const idInput = document.getElementById('id');
    const nameInput = document.getElementById('name');

    // Lấy tất cả các hàng trong bảng
    const rows = document.querySelectorAll('.list_products tr');

    // Xử lý sự kiện click trên mỗi hàng
    rows.forEach(row => {
        row.addEventListener('click', () => {
            // Lấy các giá trị từ hàng được nhấp vào
            const id = row.cells[0].textContent;
            const name = row.cells[1].textContent;
            // Đổ dữ liệu vào form
            idInput.value = id;
            nameInput.value = name;
        });
    });
        </script>
</body>
</html>