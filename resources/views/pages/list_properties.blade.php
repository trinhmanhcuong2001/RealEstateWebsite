@extends('main')
@section('content')
    <div class="hero page-inner overlay" style="background-image: url('template/images/hero_bg_1.jpg');">

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Thuê Phòng Trọ</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-weight-bold text-primary heading">Căn Hộ Nổi Bật</h2>
                </div>
                
            </div>
            <div class="row">

                <div class="col-12">


                    <div class="property-slider-wrap">



                        <div class="property-slider">

                            @foreach ($properties as $property)
                                <div class="property-item">

                                    <a href="{{URL::to('/chi-tiet', $property->id .'-'. Str::slug($property->title, '-') .'.html')}}" class="img">
                                        <img src="{{URL::to($property->image_main->image_url)}}" alt="Image" class="img-fluid-1">
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2"><span>{{number_format($property->price)}} VNĐ</span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">{{$property->address}}</span>
                                            <span class="city d-block mb-3 over-flow-2">{{$property->title}}</span>
        
                                            <div class="specs d-flex mb-4">
                                                <span class="d-block d-flex align-items-center me-3">
                                                    <span class="icon-bed me-2"></span>
                                                    <span class="caption">{{$property->bedroom}} phòng ngủ</span>
                                                </span>
                                                <span class="d-block d-flex align-items-center">
                                                    <span class="icon-bath me-2"></span>
                                                    <span class="caption">{{$property->bathroom}} phòng tắm </span>
                                                </span>
                                            </div>
        
                                            <a href="{{URL::to('chi-tiet/'. $property->id.'-'. Str::slug($property->title, '-').'.html')}}" class="btn btn-primary py-2 px-3">Xem thêm</a>
                                        </div>
                                    </div>
                                </div> <!-- .item -->
                            @endforeach

                        </div>


                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="section section-Bất Động Sản">
        <div class="container">
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="property-item mb-30">

                            <a href="{{URL::to('chi-tiet/'. $property->id.'-'. Str::slug($property->title, '-').'.html')}}" class="img">
                                <img src="{{URL::to($property->image_main->image_url)}}" alt="Image" class="img-fluid-1">
                            </a>

                            <div class="property-content">
                                <div class="price mb-2"><span>{{number_format($property->price)}} VNĐ</span></div>
                                <div>
                                    <span class="d-block mb-2 text-black-50">{{$property->address}}</span>
                                    <span class="city d-block mb-3 over-flow-2">{{$property->title}}</span>

                                    <div class="specs d-flex mb-4">
                                        <span class="d-block d-flex align-items-center me-3">
                                            <span class="icon-bed me-2"></span>
                                            <span class="caption">{{$property->bedroom}} phòng ngủ</span>
                                        </span>
                                        <span class="d-block d-flex align-items-center">
                                            <span class="icon-bath me-2"></span>
                                            <span class="caption">{{$property->bathroom}} phòng tắm </span>
                                        </span>
                                    </div>

                                    <a href="{{URL::to('chi-tiet/'. $property->id.'-'. Str::slug($property->title, '-').'.html')}}" class="btn btn-primary py-2 px-3">Xem thêm</a>
                                </div>
                            </div>
                        </div> <!-- .item -->
                    </div>
                @endforeach
            </div>
            <div class="row align-items-center py-5">
                <div class="col-lg-3">
                    Pagination (1 of 10)
                </div>
                <div class="col-lg-6 text-center">
                    <div class="custom-pagination">
                        <a href="#">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection