<header id="header">
  <div class="d-flex flex-column">
    <nav id="navbar" class="nav-menu navbar">
      @if (Auth::user()->hasRole('superadministrator'))
        <ul>
          <li><a href="/form-teacher" class="nav-link {{ Request::path() == 'form-teacher' ? 'active' : '' }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Student</span></a></li>
          <li><a href="/form-teacher/teacher" class="nav-link {{ Request::path() == 'form-teacher/teacher' ? 'active' : '' }}"><i class="fa fa-sitemap" aria-hidden="true"></i><span>Sub Teacher</span></a></li>
          <li><a href="/form-teacher/course" class="nav-link {{ Request::path() == 'form-teacher/course' ? 'active' : '' }}"><i class="fa fa-book" aria-hidden="true"></i><span>Courses</span></a></li>
        </ul>
      @elseif (Auth::user()->hasRole('administrator'))
        <ul>
          <li><a href="#" class="nav-link active"><i class="bx bx-home"></i> <span>Courses</span></a></li>
        </ul>
      @else
        <ul>
          <li><a href="#" class="nav-link active"><i class="bx bx-home"></i> <span>Register Classes</span></a></li>
          <li><a href="#" class="nav-link"><i class="bx bx-user"></i> <span>Marks</span></a></li>
        </ul>
      @endif
    </nav>
  </div>
</header>
