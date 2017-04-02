	<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span><?php echo array_get($settings, 'shop_name.value', ''); ?></span></h2>
                        <p><?php echo array_get($settings, 'shop_description.value', ''); ?></p>
                        <div class="footer-social">
                            <a href="<?php echo array_get($settings, 'facebook.value', ''); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="<?php echo array_get($settings, 'line.value', ''); ?>" target="_blank"><i class="fa fa-weixin"></i></a>
                            <a href="<?php echo array_get($settings, 'website.value', ''); ?>" target="_blank"><i class="fa fa-globe"></i></a>
                            <a href="<?php echo url('contact');?>" target="_blank"><i class="fa fa-phone"></i></a>
                        </div>
                    </div>
                </div>
                
<?php if (isset($menus) && is_array($menus)) : ?>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">เมนูแนะนำ</h2>
                        <ul>
<?php foreach ($menus as $menu) : ?>
                            <li>
                                <a href="{{ env('APP_URL') }}/<?php echo array_get($menu, 'url', ''); ?>">
                                    <?php echo array_get($menu, 'title', ''); ?>
                                </a>
                            </li>
<?php endforeach; ?>
                        </ul>                        
                    </div>
                </div>
<?php endif; ?>
                
<?php   if (isset($categories) && is_array($categories)) : ?>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">หมวดหมู่สินค้า</h2>
                        <ul>
<?php       foreach ($categories as $category) : ?>
                            <li>
                                <a href="<?php echo url('products?catid=' . array_get($category, 'id', ''));?>">
                                    <?php echo array_get($category, 'title', '');?>
                                </a>
                            </li>
<?php       endforeach; ?>
                        </ul>                        
                    </div>
                </div>
<?php   endif; ?>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">สมัครรับข่าวสาร</h2>
                        <p>ลงทะเบียนสมัครรับข้อมูลข่าวสารจากเรา เพื่อรับข้อเสนอและสิทธิพิเศษจากทางเรา ด้วยการกรอกอีเมลลงในช่องข้างล่างนี้นะคะ</p>
                        <div class="newsletter-form">
                            <form action="#" onsubmit="javascript:alert('บันทึกข้อมูลอีเมล ' + $('#newsletter_email').val() +' เรียบร้อยแล้วค่ะ');return false;">
                                <input id="newsletter_email" type="email" placeholder="พิมพ์อีเมลของคุณ">
                                <input type="submit" value="ส่งข้อมูล">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>
                
                <!-- <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div> -->
            </div>
        </div>
    </div>