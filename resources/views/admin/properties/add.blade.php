@extends('admin.admin_layout')
@section('admin_head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
@endsection
@section('content')
@include('alert')
    <div class="pagetitle">
        <h1>Đăng tin</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
        <div class="col-lg-12">

            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin cơ bản</h5>

                <!-- General Form Elements -->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Tiêu Đề</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="validationDefault03" class="col-sm-2 col-form-label" >Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="validationDefault03" name="address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Giá</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Phòng ngủ</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="bedroom">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Phòng tắm</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="bathroom">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh chính</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh mô tả (Tối đa 3 ảnh)</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFiles" multiple="multiple" name="images[]" onchange="checkFileCount()">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mô Tả</label>
                        <div class="col-sm-10">
                            <textarea id="editor" class="form-control" style="height: 100px" name="description"></textarea>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Loại</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="gridRadios1" value="Căn hộ" checked>
                                <label class="form-check-label" for="gridRadios1">
                                Căn hộ
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="gridRadios2" value="Chung cư">
                                <label class="form-check-label" for="gridRadios2">
                                Chung cư
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Vị trí trên bản đồ (Click vào bản đồ)</label>  
                        <div class="col-sm-10">
                          <div id="map" style="width: 800px;height: 400px;"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lat" class="col-sm-2 col-form-label">Lat</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="lat" name="lat">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="lng" class="col-sm-2 col-form-label">Lng</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" id="lng" name="lng">
                        </div>
                      </div>
                    <div class="row mb-3">
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary" >Thêm</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
            </div>

        </div>

        
    </section>
@endsection
@section('admin_footer')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="{{URL::asset('/template/ckeditor5/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        function checkFileCount(){
            var files = document.getElementById('formFiles').files;
            if(files.length > 3) {
                alert('Chỉ được chọn tối đa 3 ảnh!');
                document.getElementById('formFiles').value = "";
            }
        }
        // Map
        var map = L.map('map').setView([20.99740692788566,105.86875554174186], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var geocoder = L.Control.geocoder({
            defaultMarkGeocode: false
        }).on('markgeocode', function(e) {
            map.setView(e.geocode.center, 16);
            L.marker(e.geocode.center).addTo(map).bindPopup(e.geocode.name).openPopup();
            document.getElementById('lat').value = e.geocode.center.lat;
            document.getElementById('lng').value = e.geocode.center.lng;
        }).addTo(map);
        map.on('click', function(e){
            document.getElementById('lat').value = e.latlng.lat;
            document.getElementById('lng').value = e.latlng.lng;
            L.marker([e.latlng.lat,e.latlng.lng]).addTo(map);
        });
    </script>
@endsection