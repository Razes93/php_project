<div class="container-fluid">
    <h1 class="mt-4">Thêm sản phẩm mới</h1>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="" enctype="multipart/form-data">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>
                                <h4>Tên sản phẩm</h4>
                            </td>
                            <td><input style="width: 40em;" class="form-control form-control-user" type="text" id="tensp" name="product_title" placeholder="Nhập tên sản phẩm" required></td>
                        </tr>
                    </table>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>
                                <h4>Giá</h4>
                            </td>
                            <td>
                                <h4>Số lượng</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-control form-control-user" type="text" id="giasp" name="product_price" placeholder="Nhập giá sản phẩm" pattern="^[0-9]*[1-9][0-9]*$" title="Giá sản phẩm phải là số nguyên dương." required></td>
                            <td><input class="form-control form-control-user" type="text" id="soluong" name="product_qty" placeholder="Nhập số lượng sản phẩm" pattern="^[0-9]*[1-9][0-9]*$" title="Số lượng sản phẩm là số lớn hơn 0 ." required></td>
                        </tr>
                    </table>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>
                                <h5>Mô tả sản phẩm</h5>
                            </td>
                            <td>
                                <!-- <input style="width: 40em;" class="form-control form-control-user" type="text" id="tensp" name="tensp" required> -->
                                <textarea style="width: 40em;" class="form-control form-control-user" placeholder="Nhập mô tả sản phẩm....." type="text" id="tensp" name="product_desc" required rows="4"></textarea>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>
                                <h6>Loại sản phẩm</h6>
                            </td>
                            <td>
                                <select class="form-control form-control-user" name="product_cat" id="loaisp" required>
                                    <?php
                                    $get_cats = "select * from categories";

                                    $run_cats = mysqli_query($con, $get_cats);

                                    while ($row_cats = mysqli_fetch_array($run_cats)) {
                                        $cat_id = $row_cats['cat_id'];

                                        $cat_describe = $row_cats['cat_describe'];

                                        echo "<option value='$cat_id'>$cat_describe</option>";
                                    }
                                    ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Thương hiệu sản phẩm</h6>
                            </td>
                            <td>
                                <select class="form-control form-control-user" name="product_brand" id="thuong_hieu" required>
                                    <?php
                                    $get_brands = "select * from brand";

                                    $run_brands = mysqli_query($con, $get_brands);

                                    while ($row_brands = mysqli_fetch_array($run_brands)) {
                                        $brand_id = $row_brands['brand_id'];

                                        $brand_title = $row_brands['brand_title'];

                                        echo "<option value='$brand_id'>$brand_title</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td colspan="3">
                                <h4>Hình ảnh</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image1">Hình ảnh sản phẩm:</label><br>
                            </td>
                            <td>
                                <input type="file" id="image1" name="product_image" required><br>
                            </td>
                        </tr>
                    </table>
                    <input class="btn btn-primary" type="submit" name="insert" value="Thêm">
                    <a class="btn btn-primary" href="?menu=ql_sanpham">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['insert'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_qty = $_POST['product_qty'];
    $product_price = $_POST['product_price'];
    $product_desc = trim(mysqli_real_escape_string($con, $_POST['product_desc']));
    $product_image  = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    $date = date("Y/m/d");

    //upload image
    move_uploaded_file($product_image_tmp, "product_images/$product_image");
    
    //insert Product
    $insert_product = " insert into product (cat_id,brand_id,product_title,product_desc,product_price,product_qty,product_image,date_created) 
   values ('$product_cat','$product_brand','$product_title','$product_desc','$product_price','$product_qty','$product_image','$date') ";

    $insert_pro = mysqli_query($con, $insert_product);

    if ($insert_pro) {
        echo "<script>alert('Product Has Been inserted successfully!')</script>";

        //echo "<script>window.open('index.php?insert_product','_self')</script>";
    }
}
?>