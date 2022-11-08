<?php
include("includes/header.php")
?>
<!-- order history start -->
<section class="order-histry-area section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="order-history">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date purchased</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>78A643CD409</td>
                                <td>April 08, 2021</td>
                                <td class="canceled">Canceled</td>
                                <td>$760.50</td>
                                <td><input class="btn btn-style3" type="submit" name="submit" value="Nhận hàng"></td>
                                <td><input class="btn btn-style3" type="submit" name="cancel" value="Hủy"></td>
                            </tr>
                            <tr>
                                <td>34VB5540K83</td>
                                <td>April 11, 2021</td>
                                <td class="process">In progress</td>
                                <td>$760.50</td>
                                <td><input class="btn btn-style3" type="submit" name="submit" value="Nhận hàng"></td>
                                <td><input class="btn btn-style3" type="submit" name="cancel" value="Hủy"></td>
                            </tr>
                            <tr>
                                <td>78A643CD409</td>
                                <td>April 15, 2021</td>
                                <td class="delayed">Delayed</td>
                                <td>$760.50</td>
                                <td><input class="btn btn-style3" type="submit" name="submit" value="Nhận hàng"></td>
                                <td><input class="btn btn-style3" type="submit" name="cancel" value="Hủy"></td>
                            </tr>
                            <tr>
                                <td>78A643CD409</td>
                                <td>April 18, 2021</td>
                                <td class="delivered">Delivered</td>
                                <td>$760.50</td>
                                <td><input class="btn btn-style3" type="submit" name="submit" value="Nhận hàng"></td>
                                <td><input class="btn btn-style3" type="submit" name="cancel" value="Hủy"></td>
                            </tr>
                            <tr>
                                <td>78A643CD409</td>
                                <td>April 21, 2021</td>
                                <td class="delivered">Delivered</td>
                                <td>$760.50</td>
                                <td><input class="btn btn-style3" type="submit" name="submit" value="Nhận hàng"></td>
                                <td><input class="btn btn-style3" type="submit" name="cancel" value="Hủy"></td>
                            </tr>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order history end -->
<!-- footer start -->
<?php
include("includes/footer.php");
?>