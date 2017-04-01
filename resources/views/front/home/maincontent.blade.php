<?php if (isset($products_h) && is_array($products_h)): ?>
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">สินค้าแนะนำ</h2>
                        <div class="product-carousel">

<?php   foreach ($products_h as $product_h): ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo getImageLink('image', array_get($product_h, 'images.0.user_id', ''), array_get($product_h, 'images.0.code', ''), array_get($product_h, 'images.0.extension', ''), 200, 220, array_get($product_h, 'images.0.name', ''));?>" alt="">
                                    <div class="product-hover">
                                        <a href="<?php echo url('products/' . array_get($product_h, 'id', ''));?>" class="add-to-cart-link">
                                            <i class="fa fa-shopping-cart"></i>
                                            สั่งซื้อ
                                        </a>
                                        <a href="<?php echo url('products/' . array_get($product_h, 'id', ''));?>" class="view-details-link">
                                            <i class="fa fa-link"></i>
                                            ดูรายละเอียด
                                        </a>
                                    </div>
                                </div>
                                
                                <h2>
                                    <a href="<?php echo url('products/' . array_get($product_h, 'id', ''));?>">
                                        <?php echo array_get($product_h, 'title', '');?>
                                    </a>
                                </h2>
                                
                                <div class="product-carousel-price">
                                    <ins>฿<?php echo array_get($product_h, 'price', '');?></ins>
<?php       if (array_get($product_h, 'price_normal', '0') > 0) : ?>
                                    <del>฿<?php echo array_get($product_h, 'price_normal', '');?></del>
<?php       endif; ?>
                                </div> 
                            </div>
<?php   endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
<?php endif; ?>
