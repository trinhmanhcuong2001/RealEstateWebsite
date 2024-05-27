@extends('main')
@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<link rel="stylesheet" href="{{URL::to('template/css/MarkerCluster.css')}}">
	<link rel="stylesheet" href="{{URL::to('template/css/MarkerCluster.Default.css')}}">
    <link rel="stylesheet" href="{{URL::to('template/css/leaflet-search.css')}}">
	
@endsection
@section('content')
@php
    session(['test' => 'Ha ha ha ha']);
@endphp
    <div class="hero">


        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('{{URL::to('template/images/hero_bg_3.jpg')}}')"></div>
            <div class="img overlay" style="background-image: url('{{URL::to('template/images/hero_bg_2.jpg')}}')"></div>
            <div class="img overlay" style="background-image: url('{{URL::to('template/images/hero_bg_1.jpg')}}')"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1 class="text-white">Bản đồ</h1>
	                <div id="map" style="width: 600px;height: 400px;margin: auto;"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">Căn Hộ Nổi Bật </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p><a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">Xem Tất Cả</a></p>
                </div>
            </div>
            <div class="row">

                <div class="col-12">


                    <div class="property-slider-wrap">



                        <div class="property-slider">
                            @foreach($properties as $key => $property)
                                <div class="property-item">

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

                                            <a href="{{URL::to('chi-tiet/'. $property->id.'-'. Str::slug($property->title, '-').'.html')}}" class="btn btn-primary py-2 px-3">Xem Thêm</a>
                                        </div>
                                    </div>
                                </div> 
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




    <div class="section sec-testimonials">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">Bình luận </h2>
                </div>
                <div class="col-md-6 text-md-end">
                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev">Prev</span>
                        
                        <span class="next" data-controls="next">Next</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    
                </div>
            </div>
            <div class="testimonial-slider-wrap">
                <div class="testimonial-slider">
                    <div class="item">
                        <div class="testimonial">
                            <img src="{{URL::to('template/images/person_1-min.jpg')}}" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                            <div class="rate">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                            </div>
                            <h3 class="h5 text-primary mb-4">James Smith</h3>
                            <blockquote>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                            <p class="text-black-50">Designer, Co-founder</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial">
                            <img src="{{URL::to('template/images/person_2-min.jpg')}}" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                            <div class="rate">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                            </div>
                            <h3 class="h5 text-primary mb-4">Mike Houston</h3>
                            <blockquote>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                            <p class="text-black-50">Designer, Co-founder</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial">
                            <img src="{{URL::to('template/images/person_3-min.jpg')}}" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                            <div class="rate">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                            </div>
                            <h3 class="h5 text-primary mb-4">Cameron Webster</h3>
                            <blockquote>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                            <p class="text-black-50">Designer, Co-founder</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial">
                            <img src="{{URL::to('template/images/person_4-min.jpg')}}" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                            <div class="rate">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                            </div>
                            <h3 class="h5 text-primary mb-4">Dave Smith</h3>
                            <blockquote>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                            <p class="text-black-50">Designer, Co-founder</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="section section-4 bg-light">
        <div class="container">
            <div class="row justify-content-center  text-center mb-5">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">Hãy Tìm Ngôi Nhà Hoàn Hảo  </h2>
                    <p class="text-black-50">Không có gì khiến tôi thích thú hơn là về căn hộ của mình, đóng cửa lại và nấu bữa tối nhỏ cho người tôi thương. Căn hộ của tôi thực sự là một thiên đường. Đó là tổ ấm nơi có thể vỗ về và chữa lành mọi tổn thương trong tôi.</p>
                </div>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="{{URL::to('template/images/hero_bg_3.jpg')}}" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-home2"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">2M Căn Hộ</h3>
                            <p class="text-black-50">Doanh nghiệp hàng đầu cung cấp nhà ở tại Việt Nam</p>   
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-person"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Doanh Nghiệp Hàng Đầu</h3>
                            <p class="text-black-50">kinh nghiệm trên 10 năm làm việc trong lĩnh vực có uy tín cao</p>   
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-security"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Giấy tờ hợp pháp</h3>
                            <p class="text-black-50">Phương châm uy tín là số 1 luôn đầy đủ hợp đồng pháp lý cho mỗi khách hàng</p>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-counter mt-5">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">100000</span></span>
                        <span class="caption text-black-50">Người Sử Dụng sản phẩm</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">20000</span></span>
                        <span class="caption text-black-50"> Đối tác </span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">20000000</span></span>
                        <span class="caption text-black-50"> Sản Phẩm</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">10000</span></span>
                        <span class="caption text-black-50"> Đại lý </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row justify-content-center footer-cta" data-aos="fade-up">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="mb-4 ">Hãy Trở Thành Khách Hàng Của chúng Tôi Ngay Bây Giờ</h2>
                <p><a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">Hãy Cho Chúng Tôi Thêm thông Tin Để Có Thể Hỗ TRợ Tìm Căn Hộ Ưng Ý NHất</a></p>
            </div> <!-- /.col-lg-7 -->
        </div> <!-- /.row -->
    </div>

    <div class="section section-5 bg-light">
        <div class="container">
            <div class="row justify-content-center  text-center mb-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">Người Phát Triển</h2>
                    <p class="text-black-50">Với Sứ Mệnh Hỗ Trợ Mọi Người Tìm Được Những Căn Nhà Hoàn Hảo</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">

                        <img src="{{URL::to('template/images/person_1-min.jpg')}}" alt="Image"
                        class="img-fluid">

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Đại</a></h2>
                            <span class="meta d-block mb-3">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere officiis inventore cumque tenetur laboriosam, minus culpa doloremque odio, neque molestias?</p>

                            <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">

                        <img src="{{URL::to('template/images/person_2-min.jpg')}}" alt="Image"
                        class="img-fluid">

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Jean Smith</a></h2>
                            <span class="meta d-block mb-3">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere officiis inventore cumque tenetur laboriosam, minus culpa doloremque odio, neque molestias?</p>

                            <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">

                        <img src="{{URL::to('template/images/person_3-min.jpg')}}" alt="Image"
                        class="img-fluid">

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Alicia Huston</a></h2>
                            <span class="meta d-block mb-3">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere officiis inventore cumque tenetur laboriosam, minus culpa doloremque odio, neque molestias?</p>

                            <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{URL::to('template/js/leaflet.markercluster-src.js')}}"></script>
    <script src="{{URL::to('template/js/leaflet-search.js')}}"></script>
    <script>

        var mymap = L.map('map').setView([20.99740692788566,105.86875554174186], 10);
        var geojson = '';
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);
        function showFeatureInfor(feature, layer) {
                    if (feature.properties) {
                        layer.bindPopup("<b>Tiêu đề: " + feature.properties.title + 
                            "</b><br><b>Địa chỉ: " + feature.properties.address + 
                                "</b><br><a href='"+ feature.properties.url +"'>Xem chi tiết</a>");
                    }
                    
                };
        $.ajax({
			url: "{{URL::to('propertiesAPI')}}",
			dataType: "json",
			async: false,
			success: function(data) {
                geojson = data;
                			
			}
		});
        //Add clusters on the map
        var cluster_properties = L.markerClusterGroup();
		var properties = L.geoJSON(geojson,{
			onEachFeature : showFeatureInfor,
			// pointToLayer: function (feature, latlng){
			// 	return L.marker(latlng, {icon: HomeTest})
			// } 
		}).addTo(cluster_properties);
		cluster_properties.addTo(mymap);
        //Search by address on the map 
        var propertyPointLayers = L.layerGroup([
            cluster_properties
        ]);
        L.control.search({
            layer: propertyPointLayers,
            initial: false,
            propertyName: 'address',
            zoom: 16,
            buildTip: function(text, val){
                return '<a href="#"> ' + text + '</a>';
            }
        }).addTo(mymap);
    </script>
@endsection