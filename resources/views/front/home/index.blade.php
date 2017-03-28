@extends('layouts.ustora')

@section('title', 'ร้านบ้านดอกไม้สด :: หน้าหลัก')

@section('content')

    @include('front.home.banners')
    
    @include('front.home.promotion')
    
    @include('front.home.maincontent')
    
    @include('front.home.brands')
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                @include('front.home.productslist')

                <!-- @include('front.home.topsellers')
                
                @include('front.home.recently')
                
                @include('front.home.topnew') -->
                
            </div>
        </div>
    </div> <!-- End product widget area -->
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
