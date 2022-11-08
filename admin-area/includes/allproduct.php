<div class="container-fluid">
    <h1 class="mt-4">Danh sách sản phẩm</h1>
    <div class="card mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Hình ảnh</th>
                            <th>Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $all_products = mysqli_query($con,"select * from product order by product_id DESC ");
                         while($row=mysqli_fetch_array($all_products)){
                        ?>
                        <tr>
                            <td><?php echo $row['product_title']; ?></td>
                            <td><?php echo number_format($row['product_price'],0,",",".")." VND" ; ?></td>
                            <td><?php echo $row['product_qty']; ?></td>
                            <td><img src="product_images/<?php echo $row['product_image']; ?>" width="70" height="50" /></td>
                            <td>
                                <a class="btn btn-primary" style="text-decoration: none; padding: 5px 15px; background-color: #1D388F; color: #fffafa;" href="?menu=chi_tiet&masp=<?php echo $row['masp']; ?>">Chi tiết</a>
                            </td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>