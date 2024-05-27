  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link  collapsed" href="{{URL::to('properties/add')}}">
          <i class="bi bi-grid"></i>
          <span>Đăng tin</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link  collapsed" href="{{URL::to('properties/posted')}}">
          <i class="bi bi-check"></i>
          <span>Tin đã đăng</span>
        </a>
      </li>
      @if(Auth::user()->role == 0)
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Quản lí tin đăng</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{URL::to('admin/properties/show')}}" >
              <i class="bi bi-circle"></i><span>Danh sách tin</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{URL::to('admin/users/show')}}">
          <i class="bi bi-person"></i>
          <span>Tài Khoản </span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="F.A.Q.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav --> --}}
      @endif
    </ul>

  </aside><!-- End Sidebar-->