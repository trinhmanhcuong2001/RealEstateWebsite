<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="{{URL::to('/')}}" class="logo m-0 float-start">DDC</a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="active"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                    <li ><a href="{{URL::to('/danh-sach')}}">Danh sách</a></li>
                    
                    <li><a href="about.html">Giới Thiệu</a></li>
                    <li><a href="contact.html">Liên Hệ</a></li>
                    @if (isset(Auth::user()->role) && Auth::user()->role == 0)
                        <li><a href="{{URL::to('admin/dashboard')}}">Quản lý</a></li>
                    @elseif (isset(Auth::user()->role) && Auth::user()->role == 1  )
                        <li><a href="{{URL::to('properties/add')}}">Đăng tin</a></li>
                    @endif
                    @if (Auth::check())
                        <li>
                            <div class="dropdown-1">
                                <span> {{Auth::user()->username}} </span><i class="fas-solid fa-caret-down"></i>
                                <div class="dropdown-content">
                                    <a href="{{URL::to('user-info')}}">Cài đặt tài khoản</a>
                                    <hr>
                                    <a href="{{URL::to('logout')}}">Đăng xuất</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li><a href="{{URL::to('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>

                <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </div>
</nav>