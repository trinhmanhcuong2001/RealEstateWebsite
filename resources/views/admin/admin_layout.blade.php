<!DOCTYPE html>
<html lang="en">

    @include('admin.admin_head')

<body>

    @include('admin.admin_header')

    
    @include('admin.admin_sidebar')
   

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

    @include('admin.admin_footer')

</body>

</html>