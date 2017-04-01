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
                <a href="<?php echo url('');?>">หน้าหลัก</a>
                <a href="<?php echo url('products');?>">สินค้า</a>
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

<?php if (isset($pagination)) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">

                            <li class="<?php echo (array_get($pagination, 'firstPage.active', '') == 0 ? 'disabled' : ''); ?>">
                              <a href="<?php echo array_get($pagination, 'firstPage.url', '');?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
<?php   foreach (array_get($pagination, 'midPage', []) as $key => $midPage) : ?>
                            <li class="<?php echo (array_get($midPage, 'active', '') == 1 ? 'active' : ''); ?>">
                                <a href="<?php echo array_get($midPage, 'url', '');?>"><?php echo $key; ?></a>
                            </li>
<?php   endforeach; ?>
                            <li class="<?php echo (array_get($pagination, 'lastPage.active', '') == 0 ? 'disabled' : ''); ?>">
                              <a href="<?php echo array_get($pagination, 'lastPage.url', '');?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>

                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
<?php endif; ?>

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
