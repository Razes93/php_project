<?php
include("function/db.php");
?>
<?php

function cart()
{
	global $con;

	if (isset($_GET['add_cart'])) {

		$product_id = $_GET['add_cart'];
		$uri = $_GET['uri'];

		if (!isset($_SESSION['user_id'])) {
			echo "<script>alert('Must login!')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		} else {
			$user_id = $_SESSION['user_id'];
			$run_check_pro = mysqli_query($con, "select * from cart where product_id='$product_id' AND user_id='$user_id'");

			if (mysqli_num_rows($run_check_pro) > 0) {
				echo "<script>alert('Products already in the cart!')</script>";
				echo "<script>window.open('$uri','_self')</script>";
			} else {

				$run_insert_pro = mysqli_query($con, "insert into cart (user_id,product_id,qty) values ('$user_id','$product_id',1) ");
				if ($run_insert_pro) {
					echo "<script>alert('Add to cart successfully!')</script>";
					echo "<script>window.open('$uri','_self')</script>";
				} else {
					echo "<script>alert('Add to cart failed!')</script>";
					echo "<script>window.open('$uri','_self')</script>";
				}
			}
		}
	}
}
function wishlist()
{
	global $con;

	if (isset($_GET['add_wishlist'])) {

		$product_id = $_GET['add_wishlist'];
		$uri = $_GET['uri'];

		if (!isset($_SESSION['user_id'])) {
			echo "<script>alert('Must login!')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		} else {
			$user_id = $_SESSION['user_id'];
			$run_check_pro = mysqli_query($con, "select * from wishlist where product_id='$product_id' AND user_id='$user_id'");

			if (mysqli_num_rows($run_check_pro) > 0) {
				echo "<script>alert('Products already in the wishlist!')</script>";
				echo "<script>window.open('$uri','_self')</script>";
			} else {

				$run_insert_pro = mysqli_query($con, "insert into wishlist (user_id,product_id) values ('$user_id','$product_id') ");
				if ($run_insert_pro) {
					echo "<script>alert('Add to wishlist successfully!')</script>";
					echo "<script>window.open('$uri','_self')</script>";
				} else {
					echo "<script>alert('Add to wishlist failed!')</script>";
					echo "<script>window.open('$uri','_self')</script>";
				}
			}
		}
	}
}
function total_price()
{

	global $con;

	$total = 0;

	$ip = get_ip();

	$run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");

	while ($fetch_cart = mysqli_fetch_array($run_cart)) {

		$product_id = $fetch_cart['product_id'];

		$result_product = mysqli_query($con, "select * from product where product_id = '$product_id'");

		while ($fetch_product = mysqli_fetch_array($result_product)) {

			$product_price = array($fetch_product['product_price']);

			$product_title = $fetch_product['product_title'];

			$product_image = $fetch_product['product_image'];

			$sing_price = $fetch_product['product_price'];

			$values = array_sum($product_price);

			// Getting Quality of the product

			$run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id'");

			$row_qty = mysqli_fetch_array($run_qty);

			$qty = $row_qty['quality'];

			$values_qty = $values * $qty;

			$total += $values_qty;
		}
	}

	echo "$" . $total;
}

function total_items_cart()
{
	global $con;
	$user_id = $_SESSION['user_id'];

	$run_items = mysqli_query($con, "select * from cart where user_id='$user_id' ");

	echo $count_items = mysqli_num_rows($run_items);
}
function total_items_wishlist()
{
	global $con;
	$user_id = $_SESSION['user_id'];

	$run_items = mysqli_query($con, "select * from wishlist where user_id='$user_id' ");

	echo $count_items = mysqli_num_rows($run_items);
}
function get_ip()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		//ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		//ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function getCats()
{

	global $con;

	$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];

		$cat_title = $row_cats['cat_title'];

		$cat_items = mysqli_query($con, "select * from product where cat_id='$cat_id' ");
		$count_items = mysqli_num_rows($cat_items);
		echo "
		<li class='grid-list-option'>
			<a href='grid-list.php?cat=$cat_id'>$cat_title</a><span class='grid-items'>($count_items)</span>
		</li>
		";
	}
}
function getCats_Menu()
{

	global $con;

	$get_cats = "select * from categories LIMIT 4";

	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];

		$cat_title = $row_cats['cat_title'];

		echo "
		<li class='submenu-li'>
			<a href='grid-list.php?cat=$cat_id' class='submenu-link'>$cat_title</a>
		</li>
		";
	}
}
function getBrands()
{

	global $con;

	$get_brands = "select * from brand";

	$run_brands = mysqli_query($con, $get_brands);

	while ($row_brands = mysqli_fetch_array($run_brands)) {
		$brand_id = $row_brands['brand_id'];

		$brand_title = $row_brands['brand_title'];

		$brand_items = mysqli_query($con, "select * from product where brand_id='$brand_id' ");
		$count_items = mysqli_num_rows($brand_items);
		echo "
		<li class='grid-list-option'>
			<a href='grid-list.php?brand=$brand_id'>$brand_title</a><span class='grid-items'>($count_items)</span>
		</li>
		";
	}
}
function getBrands_Menu()
{

	global $con;

	$get_brands = "select * from brand LIMIT 4";

	$run_brands = mysqli_query($con, $get_brands);

	while ($row_brands = mysqli_fetch_array($run_brands)) {
		$brand_id = $row_brands['brand_id'];

		$brand_title = $row_brands['brand_title'];

		echo "
		<li class='submenu-li'>
			<a href='grid-list.php?brand=$brand_id' class='submenu-link'>$brand_title</a>
		</li>
		";
	}
};
function getPro()
{
	if (!isset($_GET['cat'])) {
		if (!isset($_GET['brand'])) {

			global $con;

			$get_pro = " select * from product order by RAND()";

			$run_pro = mysqli_query($con, $get_pro);

			while ($row_cat = mysqli_fetch_array($run_pro)) {
				$pro_id = $row_cat['product_id'];
				$pro_cat = $row_cat['cat_id'];
				$pro_brand = $row_cat['brand_id'];
				$pro_title = $row_cat['product_title'];
				$pro_price = number_format($row_cat['product_price'], 0, ",", ".");
				$pro_image = $row_cat['product_image'];
				$uri = $_SERVER['REQUEST_URI'];

				echo "
			  <li class='grid-items'>
					<div class='tred-pro'>
						<div class='tr-pro-img'>
							<a href='product.php?pro_id=$pro_id'>
								<img width='100%' height='330' src='admin-area/product_images/$pro_image' alt='pro-img1'>
							</a>
						</div>
						<div class='pro-icn'>
							<a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
							<a href='grid-list.php?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
						</div>
					</div>
					<div class='caption'>
						<h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
						<div class='pro-price'>
							<span class='new-price'>$pro_price VND</span>
						</div>
					</div>
				</li>
		  ";
			}
		}
	}
}

function get_pro_search()
{

	global $con;

	if (isset($_GET['search'])) {
		$search_query = $_GET['search'];
		if (empty($search_query)) {
			echo "<script>alert('Please enter the keyword you want to search!')</script>";
			echo "<script>window.location.replace('grid-list.php')</script>";
		}
		$run_query_by_pro = mysqli_query($con, "select * from product where product_title like '%$search_query%' ");
		$count_pro = mysqli_num_rows($run_query_by_pro);

		$run_query_by_cat = mysqli_query($con, "select * from categories where cat_title like '%$search_query%' ");
		$count_cat = mysqli_num_rows($run_query_by_cat);

		if ($count_pro == 0 && $count_cat == 0) {
			echo "<script>alert('No products where found with the keyword $search_query')</script>";
			echo "<script>window.location.replace('grid-list.php')</script>";
		}
		if ($count_pro > 0) {
			while ($row_cat = mysqli_fetch_array($run_query_by_pro)) {

				$pro_id = $row_cat['product_id'];
				$pro_cat = $row_cat['cat_id'];
				$pro_brand = $row_cat['brand_id'];
				$pro_title = $row_cat['product_title'];
				$pro_price = number_format($row_cat['product_price'], 0, ",", ".");
				$pro_image = $row_cat['product_image'];
				$uri = $_SERVER['REQUEST_URI'];
				echo "
				<div class='search-pro-items'>
					<div class='search-img'>
						<a href='product.php?pro_id=$pro_id'>
							<img width='100%' height='330' src='admin-area/product_images/$pro_image' alt='image'>
						</a>
						<div class='pro-icn'>
							<a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
							<a href='search.php?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
						</div>
					</div>
					<div class='search-caption'>
						<h4><a href='product.php?pro_id=$pro_id'>$pro_title</a></h4>
						<span class='all-price'>
							<span class='search-new-price'>$pro_price VND</span>
						</span>
					</div>
				</div>
				";
			}
		}
		if ($count_cat > 0) {
			while ($row_cat = mysqli_fetch_array($run_query_by_cat)) {
				$row_cat_id = $row_cat['cat_id'];
				$get_cat_pro = "select * from product where cat_id='$row_cat_id' ";

				$run_query_by_cat_id = mysqli_query($con, $get_cat_pro);
				
				while ($row_cat = mysqli_fetch_array($run_query_by_cat_id)) {
					$pro_id = $row_cat['product_id'];
					$pro_title = $row_cat['product_title'];
					$pro_price = number_format($row_cat['product_price'], 0, ",", ".");
					$pro_image = $row_cat['product_image'];
					$uri = $_SERVER['REQUEST_URI'];
					echo "
					<div class='search-pro-items'>
						<div class='search-img'>
							<a href='product.php?pro_id=$pro_id'>
								<img width='100%' height='330' src='admin-area/product_images/$pro_image' alt='image'>
							</a>
							<div class='pro-icn'>
								<a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
								<a href='search.php?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
							</div>
						</div>
						<div class='search-caption'>
							<h4><a href='product.php?pro_id=$pro_id'>$pro_title</a></h4>
							<span class='all-price'>
								<span class='search-new-price'>$pro_price VND</span>
							</span>
						</div>
					</div>
					";
				}
				
			}
		}
	}
}

function get_pro_by_cat_id()
{

	global $con;

	if (isset($_GET['cat'])) {
		$cat_id = $_GET['cat'];

		$get_cat_pro = "select * from product where cat_id='$cat_id' LIMIT 1,4 ";

		$run_cat_pro = mysqli_query($con, $get_cat_pro);

		$count_cats = mysqli_num_rows($run_cat_pro);

		if ($count_cats == 0) {
			echo "<script>alert('No products where found in this category!')</script>";
			echo "<script>window.location.replace('grid-list.php')</script>";
		}

		while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
			$pro_id = $row_cat_pro['product_id'];

			$pro_cat = $row_cat_pro['cat_id'];

			$pro_brand = $row_cat_pro['brand_id'];
			$pro_title = $row_cat_pro['product_title'];
			$pro_price = number_format($row_cat_pro['product_price'], 0, ",", ".");
			$pro_image = $row_cat_pro['product_image'];
			$uri = $_SERVER['REQUEST_URI'];

			echo "
			<li class='grid-items'>
			<div class='tred-pro'>
				<div class='tr-pro-img'>
					<a href='product.php?pro_id=$pro_id'>
						<img width='100%' height='330' src='admin-area/product_images/$pro_image' alt='pro-img1'>
					</a>
				</div>
				<div class='pro-icn'>
					<a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
					<a href='grid-list.php?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
				</div>
			</div>
			<div class='caption'>
				<h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
				<div class='pro-price'>
					<span class='new-price'>$pro_price VND</span>
				</div>
			</div>
		</li>
		  ";
		}
	}
}

function get_pro_by_brand_id()
{
	global $con;

	if (isset($_GET['brand'])) {
		$brand_id = $_GET['brand'];

		$get_brand_pro = "select * from product where brand_id='$brand_id' LIMIT 1,4";

		$run_brand_pro = mysqli_query($con, $get_brand_pro);

		$count_brands = mysqli_num_rows($run_brand_pro);

		if ($count_brands == 0) {
			echo "<script>alert('No products where found in this brand!')</script>";
			echo "<script>window.location.replace('grid-list.php')</script>";
		}

		while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {
			$pro_id = $row_brand_pro['product_id'];

			$pro_cat = $row_brand_pro['cat_id'];

			$pro_brand = $row_brand_pro['brand_id'];
			$pro_title = $row_brand_pro['product_title'];
			$pro_price = number_format($row_brand_pro['product_price'], 0, ",", ".");
			$pro_image = $row_brand_pro['product_image'];
			$uri = $_SERVER['REQUEST_URI'];

			echo "
			<li class='grid-items'>
			<div class='tred-pro'>
				<div class='tr-pro-img'>
					<a href='product.php?pro_id=$pro_id'>
						<img width='100%' height='330' src='admin-area/product_images/$pro_image' alt='pro-img1'>
					</a>
				</div>
				<div class='pro-icn'>
					<a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
					<a href='grid-list.php?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
				</div>
			</div>
			<div class='caption'>
				<h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
				<div class='pro-price'>
					<span class='new-price'>$pro_price VND</span>
				</div>
			</div>
		</li>
		 ";
		}
	}
}
function pagination()
{
	global $con;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$page = $page - 1;
	$limit = 8;
	$start = $limit * $page;
	if (isset($_GET['brand'])) {
		$brand_id = $_GET['brand'];

		$get_brand_pro = "select * from product where brand_id='$brand_id'";

		$run_brand_pro = mysqli_query($con, $get_brand_pro);
		$total = mysqli_num_rows($run_brand_pro);
		$total = $total / $limit;
		$total = ceil($total);
	}
}

?>










