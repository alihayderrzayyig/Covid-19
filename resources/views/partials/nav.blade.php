<nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-nav">
    <div class="container-fluid">
        @auth
        <div class="btn-group">
          <a
            class="overflow-hidden shadow rounded-circle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="{{ asset('img/user.jpg') }}"
              width="30"
              height="30"
              class="align-top d-inline-block"
              alt=""
              loading="lazy"
            />
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile') }}">
                الصفحة الشخصية
                <i class="fas fa-user"></i>
                </a>
            </li>
            {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            <li><hr class="dropdown-divider" /></li>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="dropdown-item">
                تسجيل الخروج
                <i class="fas fa-power-off"></i>
              </button>
            </form>
          </ul>
        </div>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="login">التسجيل</a>
        @endguest

      <!-- الزر في الشاشات الصغيرة -->
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="mb-2 navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @if ($active_sidebar=='index' ) active @endif" aria-current="page" href="{{ route('home') }}"
              >الصفحة الرئيسة</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($active_sidebar=='vaccine' ) active @endif" href="{{ route('vaccine') }}">اللقاحات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($active_sidebar=='about' ) active @endif" href="{{ route('about') }}">عن الموقع</a>
          </li>

          <li class="nav-item">
            <a class="navbar-brand" href="#">كورونا - <span>19</span></a>
          </li>
        </ul>




      </div>

      <a class="navbar-brand" href="#">كورونا - <span>19</span></a>


    </div>
  </nav>
