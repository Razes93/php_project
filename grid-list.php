<?php
include("includes/header.php")
?>

<!-- grid-list start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="all-filter">
                    <div class="categories-page-filter">
                        <h4 class="filter-title">Categories</h4>
                        <a href="#category-filter" data-bs-toggle="collapse" class="filter-link"><span>Categories
                            </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-option collapse" id="category-filter">
                            <?php getCats(); ?>
                        </ul>
                    </div>
                    <div class="categories-page-filter">
                        <h4 class="filter-title">Brands</h4>
                        <a href="#category-filter" data-bs-toggle="collapse" class="filter-link"><span>Categories
                            </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-option collapse" id="category-filter">
                            <?php getBrands(); ?>
                        </ul>
                    </div>
                    <!-- <div class="price-filter">
                        <h4 class="filter-title">Filter by price</h4>
                        <a href="#price-filter" data-bs-toggle="collapse" class="filter-link"><span>Filter by price
                            </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-price collapse" id="price-filter">
                            <li class="f-price">
                                <input type="checkbox">
                                <label>0-100</label>
                            </li>
                            <li class="f-price">
                                <input type="checkbox">
                                <label>100-200</label>
                            </li>
                            <li class="f-price">
                                <input type="checkbox">
                                <label>200-300</label>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-size">
                        <h4 class="filter-title">Filter by size</h4>
                        <a href="#size-filter" data-bs-toggle="collapse" class="filter-link"><span>Filter by size
                            </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-size collapse" id="size-filter">
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>10kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>10ltr</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>1kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>1ltr</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>2kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>3kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>5kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>5ltr</label>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-tag">
                        <h4 class="filter-title">Filter by tags</h4>
                        <a href="#tags-filter" data-bs-toggle="collapse" class="filter-link"><span>Filter by tags
                            </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-tag collapse" id="tags-filter">
                            <li class="tag"><a href="product.php">Almond</a></li>
                            <li class="tag"><a href="product.php">Banana</a></li>
                            <li class="tag"><a href="product.php">Bitrrot</a></li>
                            <li class="tag"><a href="product.php">Blackberry</a></li>
                            <li class="tag"><a href="product.php">Chikoo</a></li>
                            <li class="tag"><a href="product.php">Coconet</a></li>
                            <li class="tag"><a href="product.php">Guava</a></li>
                            <li class="tag"><a href="product.php">juice</a></li>
                            <li class="tag"><a href="product.php">Ladiesfinger</a></li>
                            <li class="tag"><a href="product.php">Litchi</a></li>
                            <li class="tag"><a href="product.php">Minirrot</a></li>
                            <li class="tag"><a href="product.php">Mussel</a></li>
                            <li class="tag"><a href="product.php">Onion</a></li>
                            <li class="tag"><a href="product.php">Organic-food</a></li>
                            <li class="tag"><a href="product.php">Potato</a></li>
                            <li class="tag"><a href="product.php">Shrimp</a></li>
                            <li class="tag"><a href="product.php">Tomato</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <?php cart();
                wishlist(); ?>
                <div class="grid-4-product">
                    <!-- <div class="grid-list-select">
                        <ul class="grid-list">

                        </ul>
                        <ul class="grid-list-selector">
                            <li>
                                <label>Sort by</label>
                                <select>
                                    <option>Featured</option>
                                    <option>Best selling</option>
                                    <option>Alphabetically,A-Z</option>
                                    <option>Alphabetically,Z-A</option>
                                    <option>Price, low to high</option>
                                    <option>Price, high to low</option>
                                    <option>Date new to old</option>
                                    <option>Date old to new</option>
                                </select>
                            </li>
                        </ul>
                    </div> -->
                    <div class="grid-pro">
                        <ul class="grid-product">
                            <?php
                            getCount();
                            getPro();
                            get_pro_by_cat_id();
                            get_pro_by_brand_id();
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="list-all-page">
                    <div class="page-number">
                        <a href="javascript:void(0)"><i class="fa fa-angle-double-left"></i></a>
                        <?php pagination(); ?>
                        <a href="javascript:void(0)"><i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- grid-list start -->
<?php
include("includes/footer.php");
?>