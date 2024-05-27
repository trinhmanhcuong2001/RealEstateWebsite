<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <!-- <title>Forms / Layouts </title> -->
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($title)
        <title>{{$title}}</title>
    @endif
  
    <!-- Favicons -->
    <link href="{{URL::asset('/template/admin/img/favicon.png')}}" rel="icon">
    <link href="{{URL::asset('/template/admin/img/apple-assetuch-icon.png')}}" rel="apple-assetuch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nuniasset:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="{{URL::asset('/template/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/template/admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/template/admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/template/admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/template/admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/template/admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/template/admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="{{URL::asset('/template/admin/css/Admin.css')}}" rel="stylesheet">
    @yield('admin_head')
  </head>