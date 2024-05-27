@extends('admin.admin_layout')
@section('content')
        <!-- Top Selling -->
        @include('alert')
        <div class="col-12">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                    <h5 class="card-title">Danh sách tài khoản</h5>

                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">Hình ảnh </th>
                            <th scope="col">Tài khoản</th>
                            <th scope="col">Email</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <th scope="row"><a href="#"><img src="" alt="" height="100px"></a></th>
                            <td><a href="#" class="text-primary fw-bold">{{$user->username}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>
                                @if ($user->role !== 0)
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Xóa" onclick="removeID({{$user->id}}, '{{url('admin/users/delete')}}')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="m-auto">
                    {{$users->links()}}
                </div>
            </div>
        </div><!-- End Top Selling -->

@endsection