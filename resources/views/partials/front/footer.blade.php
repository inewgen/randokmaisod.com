	<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>ร้าน<span>บ้านดอกไม้สด</span></h2>
                        <p>รับจัดดอกไม้ ทั้งในและนอกสถานที่ ขายดอกไม้สดและปลอมทั้งปลีกและส่ง รับจัดช่อดอกไม้ พวงรีด ขายอุปกรณ์จัดดอกไม้ทุกชนิด ทั้งปลีกและส่ง บริการจัดส่งดอกไม้ถึงมือผู้รับสนใจสอบถามรายละเอียดได้ที่ 064-9392959</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%94%E0%B8%AD%E0%B8%81%E0%B9%84%E0%B8%A1%E0%B9%89%E0%B8%AA%E0%B8%94-592992124234795/?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://line.me/R/ti/p/%40lkn7166r" target="_blank"><i class="fa fa-weixin"></i></a>
                            <a href="<?php echo url('');?>" target="_blank"><i class="fa fa-globe"></i></a>
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