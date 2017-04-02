@extends('layouts.ustora')

@section('title', 'ร้านบ้านดอกไม้สด :: ติดต่อเรา')

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

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="product-breadcroumb">
                    <a href="<?php echo url('');?>">หน้าหลัก</a>
                    <a href="<?php echo url('categories');?>">ติดต่อเรา</a>
                </div>

                <!-- start contact us Section -->
                <section id="ctn_sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <h1>ติดต่อเรา</h1>
                                    
                                </div>          
                            </div>      
                            <div class="col-sm-6"> 
                                <div id="cnt_form">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="<?php echo URL::to('contact');?>" class="contactForm" name="frm_main" id="frm_main" method="post">
                                        <div class="form-group">
                                        <input type="text" name="name" class="form-control name-field" required="required" placeholder="ชื่อของคุณ">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control mail-field" required="required" placeholder="อีเมลของคุณ">
                                        </div>
                                        <div class="form-group">
                                            <input type="mobile" name="mobile" class="form-control mail-field" required="required" placeholder="เบอร์โทรติดต่อกลับ">
                                        </div> 
                                        <div class="form-group">
                                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="ข้อความ"></textarea>
                                        </div> 
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">ส่งข้อความ</button>
                                        </div>
                                        <input type="hidden" name="user_id" value="">
                                        <input type="hidden" name="referer" value="<?php echo URL::to('contact');?>">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form> 
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="cnt_info">
                                    <ul>
                                        <li><i class="fa fa-home"></i>
                                            <p>
                                                <?php echo array_get($settings, 'address.value', ''); ?>
                                            </p>
                                        </li>
                                        <li><i class="fa fa-facebook"></i>
                                            <p><a href="<?php echo array_get($settings, 'facebook.value', ''); ?>">
                                                <?php echo array_get($settings, 'facebook.value', ''); ?>
                                            </a></p>
                                        </li>
                                        <li><i class="fa fa-weixin"></i>
                                            <p><a href="<?php echo array_get($settings, 'line.value', ''); ?>">
                                                <?php echo array_get($settings, 'line.value', ''); ?>
                                            </a></p>
                                        </li>
                                        <li><i class="fa fa-globe"></i>
                                            <p><a href="<?php echo array_get($settings, 'website.value', ''); ?>">
                                                <?php echo array_get($settings, 'website.value', ''); ?>
                                            </a></p>
                                        </li>
                                        <li><i class="fa fa-envelope"></i>
                                            <p><a href="mailto:<?php echo array_get($settings, 'email.value', ''); ?>">
                                                <?php echo array_get($settings, 'email.value', ''); ?>
                                            </a></p>
                                        </li>
                                        <li><i class="fa fa-phone"></i>
                                            <p>
                                                <?php echo array_get($settings, 'mobile.value', ''); ?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>          
                        </div>
                    </div>
                </section>
                <!-- End contact us  Section -->

                <!-- start located map Section -->
                <section id="ltd_map_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="map">                       
                            <h1>แผนที่ร้านค้า</h1><a href="#slidingDiv" class="show_hide" rel="#slidingDiv"></a>
                            <div id="slidingDiv">
                                <div class="map_area">
                                    <div id="googleMap" style="width:100%;height:400px;"></div>
                                </div>
                            </div>  
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                <!-- End located map  Section -->

            </div>

        </div>
    </div>

@endsection

@push('styles')
    <style type="text/css">
        #clt_sec .owl-controls .owl-nav {
        display : none;
        }
        #ctn_sec {
        padding : 70px 0;
        }
        #cnt_form .btn {
        background : #353638;
        padding : 10px 35px;
        }
        #cnt_form .form-control:focus {
        border : #0080FF solid 1px;
        }
        .cnt_info ul {
        margin : 0;
        padding : 0;
        border-left : 1px solid #C7C7C7;
        padding-left : 30px;
        }
        .cnt_info ul li {
        list-style : none outside none;
        padding : 15px 0;
        }
        .cnt_info ul li i {
        color : #818181;
        float : left;
        margin-top : 5px;
        }
        .cnt_info p {
        padding-left : 30px;
        }
        .map_area {
        margin-bottom : 93px;
        }
        .ft ul {
        margin : 0;
        padding : 0;
        text-align : center;
        }
        .ft ul li {
        list-style : none outside none;
        padding-right : 10px;
        display : inline;
        }
        .ft ul li a {
        border : #818181 solid 1px;
        border-radius : 50px;
        display : inline-block;
        margin : 0 auto;
        padding : 7px 11px;
        text-align : center;
        }
        .ft ul li a i {
        color : #363636;
        font-size : 15px;
        transition: all 1s ease 0s;
        -moz-transition: all 1s ease 0s;
        -webkit-transition: all 1s ease 0s
        }
        .ft ul li a i:hover {
        color : #00AFF0;transition: all 1s ease 0s;
        -moz-transition: all 1s ease 0s;
        -webkit-transition: all 1s ease 0s
        }
        .ft ul li .fa-facebook {
        padding : 3px;
        }
        #ltd_map_sec {
        /*background : none 0 0 repeat scroll #363636;*/
        /*text-align : center;*/
        }
        .map > h1 {
        color : #000;
        /*font-size : 20px;*/
        font-weight : normal;
        text-transform : uppercase;
        }
        #ft_sec {
        padding : 70px 0;
        }
        .copy_right {
        margin : 0;
        padding : 0;
        }
        .copy_right li {
        font-size : 14px;
        font-weight : 600;
        list-style : none outside none;
        padding : 2px;
        text-align : center;
        color : #818181;
        text-transform : uppercase;
        }
        .copy_right {
        margin : 0;
        padding : 0;
        margin-top : 18px;
        }
        .map i {
        font-size : 22px;
        font-weight : bold;
        color : #fff;
        margin-left : 15px;
        }
    </style>
@endpush

@push('scripts')
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVjTijWk9XHfgq81SwkgkTrVLT55TTxrA&callback=initMap"></script> -->
    <script>

      // The following example creates a marker in Stockholm, Sweden using a DROP
      // animation. Clicking on the marker will toggle the animation between a BOUNCE
      // animation and no animation.

      var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 15,
          scrollwheel: false,
          center: {lat: <?php echo array_get($settings, 'shop_latitude.value', ''); ?>, lng: <?php echo array_get($settings, 'shop_longitude.value', ''); ?>}
        });

        marker = new google.maps.Marker({
          map: map,
          position: map.getCenter(),
          animation:google.maps.Animation.BOUNCE,
          // draggable: true,
          // animation: google.maps.Animation.DROP,
          position: {lat: <?php echo array_get($settings, 'shop_latitude.value', ''); ?>, lng: <?php echo array_get($settings, 'shop_longitude.value', ''); ?>},
          icon: 'http://res.ranbandokmaisod.com/public/uploads/assets/images/default/map-marker.png',
        });
        marker.addListener('click', toggleBounce);
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVjTijWk9XHfgq81SwkgkTrVLT55TTxrA&callback=initMap">
    </script>
    <!-- <script type="text/javascript">
        function initialize() {
          var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            center: new google.maps.LatLng(17.16306217508892,104.1541906446218)
          };
          var map = new google.maps.Map(document.getElementById('googleMap'),
              mapOptions);
          var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation:google.maps.Animation.BOUNCE,
            icon: 'http://res.ranbandokmaisod.com/public/uploads/assets/images/default/map-marker.png',
            map: map
          });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        $(function () {
            /* Script */
        });
    </script> -->
@endpush
