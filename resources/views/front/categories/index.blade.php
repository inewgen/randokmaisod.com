@extends('layouts.ustora')

@section('title', 'ร้านบ้านดอกไม้สด :: หมวดหมู่สินค้า')

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

<?php if(isset($categories) && is_array($categories)): ?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            <div class="product-breadcroumb">
                <a href="<?php echo url('');?>">หน้าหลัก</a>
                <a href="<?php echo url('categories');?>">หมวดหมู่สินค้า</a>
            </div>

<?php   foreach ($categories as $category): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                         <div class="product-upper">
                            <img src="<?php echo getImageUrl(array_get($category, 'images.0', []), 200, 220);?>" alt="">
                        </div>
                        <h2>
                            <a href="<?php echo url('products?catid=' . array_get($category, 'id', ''));?>">
                                <?php echo array_get($category, 'title', '');?>
                            </a>
                        </h2>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="0" data-product_sku="" data-product_id="70" rel="nofollow" href="<?php echo url('products?catid=' . array_get($category, 'id', ''));?>">
                                ดูสินค้าภายในหมวดหมู่นี้
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
