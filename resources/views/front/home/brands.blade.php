<?php   if (isset($categories) && is_array($categories)) : ?>
	<div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">

<?php       foreach ($categories as $category) : ?>
                            <a alt="<?php echo array_get($category, 'title', '');?>" href="<?php echo url('products?catid=' . array_get($category, 'id', ''));?>">
                                <img alt="<?php echo array_get($category, 'title', '');?>" src="<?php echo getImageUrl(array_get($category, 'images.0', []), 270, 120);?>">
                            </a>
<?php       endforeach; ?>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
<?php   endif; ?>
