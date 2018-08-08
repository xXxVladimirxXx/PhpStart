<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">

                            <?php foreach ($categories as $categoriItem) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="/category/<?php echo $categoriItem['id'];?>"><?php echo $categoriItem['name'];?></a></h4>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>

                            <?php foreach ($productsList as $product) { ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                            <a href="/product/<?php echo $product['id']; ?>">
                                            <img src="<?php echo Product::getImage($product['id']); ?>" while="252" height="270" alt="" />
                                                <h2>$<?php echo $product['price']; ?></h2>
                                                <p><?php echo $product['name']; ?></p>
                                            </a>
                                                <a href="cart/add/<?php echo $product['id']; ?>" data-id="<?php echo $product['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if ($product['is_new']){ ?>
                                                <img src="/template/images/home/new.png" class="new" alt="">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            
                    <div class="col-sm-9 padding-right">
                        <div class="pagination-area">
                            <?php echo $pagination->get(); ?>
                        </div>
                    </div>
                    
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>