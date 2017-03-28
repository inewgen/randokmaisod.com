@extends('layouts.ustora')

@section('title', 'ร้านบ้านดอกไม้สด :: หน้าหลัก')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php if(isset($products) && is_array($products)): ?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            <div class="product-breadcroumb">
                            <a href="<?php echo url('');?>">Home</a>
                            <a href="<?php echo url('products');?>?catid=<?php echo array_get($products, '0.categories.id', ''); ?>"><?php echo array_get($products, '0.categories.title', ''); ?></a>
                            <a href="<?php echo url('products');?>/<?php echo array_get($products, '0.id', ''); ?>"><?php echo array_get($products, '0.title', ''); ?></a>
                        </div>

<?php   foreach ($products as $product): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                         <div class="product-upper">
                            <img src="<?php echo array_get($product, 'images.0.url', '');?>" alt="">
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
                          <ul class="pagination">
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
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

@endsection

@push('styles')
    <style type="text/css">
        /* Style */
    </style>
@endpush

@push('scripts')
    <script type="text/javascript">
        $(function () {
            /* Script */
        });
    </script>
@endpush
