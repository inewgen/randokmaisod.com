<?php if (isset($products) && is_array($products)): ?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <h2 class="section-title">สินค้าของเรา</h2>
            <div class="row">

<?php   foreach ($products as $product): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                         <div class="product-upper">
                            <img src="<?php echo getImageLink('image', array_get($product, 'images.0.user_id', ''), array_get($product, 'images.0.code', ''), array_get($product, 'images.0.extension', ''), 200, 220, array_get($product, 'images.0.name', ''));?>" alt="">
                        </div>
                        <h2>
                            <a href="<?php echo url('products/' . array_get($product, 'id', ''));?>">
                                <?php echo array_get($product, 'title', '');?>
                            </a>
                        </h2>
                        <div class="product-carousel-price">
                            <ins>฿<?php echo array_get($product, 'price', '');?></ins>
                            <del>฿<?php echo array_get($product, 'price_normal', '');?></del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="0" data-product_sku="" data-product_id="70" rel="nofollow" href="<?php echo url('products/' . array_get($product, 'id', ''));?>">
                                สั่งซื้อ
                            </a>
                        </div>                       
                    </div>
                </div>
<?php   endforeach; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                            <a href="<?php echo url('products');?>" class="wid-view-more">ดูสินค้าทั้งหมด</a>
                            <!-- <ul class="pagination">
                                <li>
                                  <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                            </ul> -->
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
