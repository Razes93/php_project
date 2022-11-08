<?php
include("includes/header.php")
?>

<!-- search page start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="search-title">
                    <?php
                        $search_query = $_GET['search'];
                        echo '
                            <h4>The products searched by keyword "'.$search_query.'" are:</h4>
                        ';
                    ?>
                    
                </div>
                <?php cart(); wishlist();?>
                <!-- <div class="saerch-input">
                        <form>
                            <input type="text" name="search" placeholder="Search our store">
                            <a href="search.php" class="search-btn"><i class="fa fa-search"></i></a>
                        </form>
                    </div> -->
                <div class="search-pro-area">
                  <?php get_pro_search(); ?>
                </div>
                <div class="all-page">
                    <div class="page-number style-1">
                        <a href="javascript:void(0)" class="active">1</a>
                        <a href="search-2.php">2</a>
                        <a href="search-2.php"><i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- search page end -->
<!-- footer start -->
<?php
include("includes/footer.php");
?>s