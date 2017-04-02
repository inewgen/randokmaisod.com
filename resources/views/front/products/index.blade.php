@extends('layouts.ustora')

@section('title', 'ร้านบ้านดอกไม้สด :: สินค้าของเรา')

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
                <a href="<?php echo url('products');?>">สินค้าของเรา</a>
<?php   if (isset($data['catid'])): ?>
                <a href="<?php echo url('products');?>?catid=<?php echo $data['catid'];?>"><?php echo array_get($categories_map, $data['catid'] . '.title', ''); ?></a>
<?php   endif; ?>
            </div>

<?php   foreach ($products as $product): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                         <div class="product-upper">
                            <img src="<?php echo getImageUrl(array_get($product, 'images.0', []), 200, 220);?>" alt="">
                        </div>
                        <h2>
                            <a href="<?php echo url('products/' . array_get($product, 'id', ''));?>">
                                <?php echo array_get($product, 'title', '');?>
                            </a>
                        </h2>
                        <div class="product-carousel-price">
                            <ins><?php echo array_get($product, 'price', '');?>  บาท</ins>
<?php       if (array_get($product, 'price_normal', 0) > 0) : ?>
                            <del><?php echo array_get($product, 'price_normal', '');?> บาท</del>
<?php       endif; ?>
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

            @include('vendor.pagination.index')

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
