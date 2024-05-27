@extends('main')
@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endsection
@section('content')
    <div class="hero page-inner overlay" style="background-image: url({{URL::to($property->image_main->image_url)}});">

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">{{$property->title}} </h1>

                </div>
            </div>


        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
					<div class="img-property-slide-wrap">
						<div class="img-property-slide">
                            @foreach($property->image_description as $img_description)
							    <img src="{{URL::to($img_description->image_url)}}" alt="Image" class="img-fluid">
							@endforeach
						</div>
					</div>
				</div>
            </div>
            <div class="col-lg">
                <h2 class="heading text-primary">{{$property->title}} </h2>
                <p class="meta">{{$property->address}}</p>
                <p class="text-black-50">{!! $property->description !!}</p>
                
                
            </div>
            <div class="bl-user" >
                <div class="use" >
                    <div class="d-block agent-box p-5 use-box">
                        <div class="img mb-6">
                            <img src="{{URL::to('/template/images/person_2-min.jpg')}}" alt="Image" >
                        </div>
                        <div class="text">
                            <h3 class="mb-0">{{$property->user->fullname}} </h3>
                            <div class="meta mb-3">Chủ Phòng</div>
                            <p>SĐT:{{$property->user->phone_number}}</p>
                            <ul class="list-unstyled social dark-hover d-flex">
                                <li class="me-1"><a href="#"><span class="icon-instagram"></span></a></li>
                                <li class="me-1"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="me-1"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="me-1"><a href="#"><span class="icon-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="map" style="width: 600px;height: 400px;margin: auto;">
                
                </div>
            </div>
            <div class="scm-wrap" >
                
                    <div class="row"  style="margin-top:50px ;text-align:center;">
                        <h3>
                            Bình luận về sản phẩm  
                        </h3>
                        
                    @if(Auth::check())
                        <div class="col-xs-8">
                            <div class="scm-filter clearfix">
                                 
                                <div class="pull-right">
                                    <div class="col-xs-11">
                                        <div class="scm-textarea-box">
                                            <textarea class="form-control" id="comment-content" rows="6" placeholder="Nhập nội dung bình luận của bạn ở đây"></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <button style="margin-top: 20px;background-color:aqua;" onclick="addComment({{$property->id}})">Gửi</button>
                            </div>
                        </div>
                    @else
                        <p style="text-align: center">Vui lòng đăng nhập để bình luận! <a href="{{URL::to('login')}}">Bình luận</a></p>
                    @endif
                    </div>
                    <div class="mt-4">
                        Sắp xếp bình luận: <span class="scm-newest">Mới nhất</span> | <span class="scm-likest">Thích nhất</span>
                    </div>
                    <hr>
                    <div class="row scm-comment" id="list-comments" >
                        
                        
                    </div>
                    <div>
                        <hr>
                        <div style="min-width: 30px;display:inline-block"><a href="#" id="pre-comment">Trước</a></div>
                        
                        <div style="min-width: 30px;display:inline-block"><a href="#" id="next-comment">Sau</a></div>
                    </div>
                
            </div>
                
        </div>
        
    </div>
@endsection
@section('footer')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const commentContent = document.getElementById('comment-content');
        const listComments = document.getElementById('list-comments');

        function addComment(property_id){
            if(commentContent.value.trim()!==''){
                fetch("{{URL::to('addComment')}}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token' : csrfToken
                    },
                    body: JSON.stringify({content : commentContent.value, property_id: property_id})
                })
                .then(response => {
                    if(!response.ok){
                        throw new Error('Network response was not ok');
                    }else{
                        return response.json();
                    }
                })
                .then(comment => {
                    
                    const newComment = document.createElement('div');
                    newComment.classList.add('col-xs-11');
                    newComment.style.marginTop = '20px';
                    newComment.innerHTML = `
                        <div class="scm-comment-head icon-user"> ${comment.comment.user.username} </div>
                        <div class="scm-comment-body"> ${comment.comment.content}</div>
                        <div class="scm-comment-addition clearfix">
                            <div class="pull-left scm-comment-time">${comment.comment.created_at}</div>
                            <div class="pull-right scm-comment-action">
                                <a href="">Thích</a>
                                <a href="">Trả lời</a>
                            </div>
                        </div>
                        <hr>
                    `;
                    //Thêm comment mới vào danh sách hiển thị
                    listComments.prepend(newComment);
                    //Xóa nội dung
                    commentContent.value='';
                    //Thông báo bình luận thành công
                    alert(comment.message); 

                        
                })
                .catch(error => {
                    console.log('Error: ' + error);
                    alert('Lỗi! Vui lòng thử lại!');
                })
            }else{
                alert('Nội dung bình luận không được để trống!');
            }
        }

        const preComment = document.getElementById('pre-comment');
        const nextComment = document.getElementById('next-comment');
        var page =1;

        document.addEventListener('DOMContentLoaded', ()=> {
            function showComments(page){
                fetch(`{{URL::to('showComments', $property->id)}}?page=${page}`)
                .then(response => {
                    if(!response.ok){
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(comments => {
                    listComments.innerHTML = '';
                    comments.data.forEach(comment => {
                        const newComment = document.createElement('div');
                        newComment.classList.add('col-xs-11');
                        newComment.style.marginTop = '20px';
                        newComment.innerHTML = `
                            <div class="scm-comment-head icon-user"> ${comment.user.username}</div>
                            <div class="scm-comment-body"> ${comment.content}</div>
                            <div class="scm-comment-addition clearfix">
                                <div class="pull-left scm-comment-time">${comment.created_at}</div>
                                <div class="pull-right scm-comment-action">
                                    <a href="">Thích</a>
                                    <a href="">Trả lời</a>
                                </div>
                            </div>
                            <hr>
                        `;
                        listComments.appendChild(newComment);
                    });
                    if(page <= 1 || comments == ''){
                        preComment.style.display = 'none';
                    }else{
                        preComment.style.display = 'inline-block';
                    }
                    if(comments.last_page == page || comments == ''){
                        nextComment.style.display = 'none';
                    }else{
                        nextComment.style.display = 'inline-block';
                    }
                    
                })
                .catch(error => {
                    console.error(error);
                    alert('Không thể tải bình luận!');
                })
            }
            showComments(page);
            preComment.addEventListener('click',(e)=> {
                e.preventDefault();
                page--;
                showComments(page);
            });
            nextComment.addEventListener('click',(e)=> {
                e.preventDefault();
                page++;
                showComments(page);
            });
            
        });
        var mymap = L.map('map', {zoomControl: false , maxZoom: 18, minZoom: 18});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);
        
		$.ajax({
			url: "{{URL::to('propertyAPI', $property->id)}}",
			dataType: "json",
			async: false,
			success: function(data) {
				var lat = data.features[0].geometry.coordinates[1];
				var lng = data.features[0].geometry.coordinates[0];
				mymap.setView([lat, lng], 20);
                L.geoJSON(data).addTo(mymap);			


                L.Control.Watermark = L.Control.extend({
                    onAdd: function(map) {
                        var container = L.DomUtil.create('div'); 
                        container.style.background = 'white';
                        container.style.padding = '5px';
                        container.style.border = '2px solid rgba(0, 0, 0, 0.2)';
                        var a = L.DomUtil.create('a');
                        a.innerHTML = 'Xem trên Google Map'; 
                        a.href = "https://www.google.com/maps/search/?api=1&query=" + lat + "," + lng;
                        a.target = '_blank'; 
                        a.style.fontSize = '15px';
                        container.appendChild(a); 

                        return container; 
                    },

                    onRemove: function(map) {
                        // Không cần thiết
                    }
                });

                L.control.watermark = function(opts) {
                    return new L.Control.Watermark(opts);
                }

                L.control.watermark({ position: 'topleft' }).addTo(mymap);
			}
		});
		
    </script>
@endsection