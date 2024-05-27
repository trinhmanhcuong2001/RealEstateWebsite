@extends('admin.admin_layout')
@section('content')
    @if (count($properties) > 0)
        <!-- Top Selling -->
        @include('alert')
        <div class="col-12">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                    <h5 class="card-title">Danh sách tin</h5>

                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">Hình ảnh </th>
                            <th scope="col">TIêu Đề</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Người đăng</th>
                            <th scope="col">Giá (VNĐ)</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col"> Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $key => $property)
                        <tr>
                            <th scope="row"><a href="#"><img src="{{URL::asset($property->image_main->image_url)}}" alt="" height="100px"></a></th>
                            <td><a href="#" class="text-primary fw-bold">{{$property->title}}</a></td>
                            <td>{{$property->address}}</td>
                            <td class="fw-bold">{{$property->user->username}}</td>
                            <td>{{number_format($property->price)}}</td>
                            <td>Chờ duyệt</td>
                            <td>
                            <a href="{{URL::to('admin/properties/edit', $property->id)}}" class="btn btn-primary btn-sm" title="Cập nhật"><i class="bi bi-upload"></i></a>
                            <span></span>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Xóa" onclick="removeID({{$property->id}}, '{{url('admin/properties/delete')}}')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Top Selling -->

    @else
        <div style="min-height: 500px; justify-content:center;align-items: center;display:flex;" >
            <h1>Bạn chưa đăng tin nào!</h1>
        </div>  
    @endif
@endsection