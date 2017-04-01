<?php if (isset($banners) && is_array($banners)) : ?>
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">

<?php foreach ($banners as $banner) : ?>
					<li>
						<img src="<?php echo getImageUrl(array_get($banner, 'images.0', ''), 1142, 358);?>" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								<?php echo array_get($banner, 'title', ''); ?>
							</h2>
							<h4 class="caption subtitle"><?php echo array_get($banner, 'subtitle', ''); ?></h4>
<?php   if (array_get($banner, 'type', '0') > 0) : ?>
							<a class="caption button-radius" href="<?php echo array_get($banner, 'button_url', ''); ?>">
                                <span class="icon"></span>
                                <?php echo array_get($banner, 'button_title', ''); ?>
                            </a>
<?php   endif; ?>
						</div>
					</li>
<?php endforeach; ?>

				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
<?php endif; ?>