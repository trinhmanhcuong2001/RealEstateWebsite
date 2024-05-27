<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>
        <link rel="stylesheet" href="{{URL::asset('template/css/login.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <style>
            .alert {
                position:relative;padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem;
            }
            .alert.alert-danger {
                color:#721c24;background-color:#f8d7da;border-color:#f5c6cb;
            }
            .alert.alert-success {
                color:#155724;background-color:#d4edda;border-color:#c3e6cb;
            }
        </style>
    </head>
    <body>
       
        <div class="container" id="container">
            @include('alert')
            <div class="form-container sign-up-container">
                <form action="{{URL::to('signup')}}" method="POST">
                    @csrf
                    <h1>Tạo Tài Khoản </h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>Sử dụng email của bạn để đăng ký</span>
                    <input type="text" placeholder="Họ và tên" name="fullname"/>
                    <input type="text" placeholder="Địa chỉ" name="address"/>
                    <input type="text" placeholder="Số điện thoại" name="phone_number" />
                    <input type="text" placeholder="Tên đăng nhập" name="username"/>
                    <input type="email" placeholder="Email" name="email"/>
                    <input type="password" placeholder="Mật Khẩu" name="password"/>
                    <button>Đăng ký</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="{{URL::to('signin')}}" method="POST">
                    @csrf
                    <h1>Đăng Nhập</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                    <input type="text" placeholder="Email" name="username"/>
                    <input type="password" placeholder="Password" name="password"/>
                    <a href="#">Quên mật khẩu?</a>
                    <button type="submit" >Đăng nhập</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Chào mừng trở lại</h1>
                        <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                        <button class="ghost" id="signIn">Đăng nhập</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Xin chào bạn!</h1>
                        <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                        <button class="ghost" id="signUp">Tạo tài Khoản</button>
                    </div>
                </div>
            </div>
        </div>

        <footer>

        </footer>

        <script src="{{URL::asset('template/js/login.js')}}"></script>
    </body>
</html>