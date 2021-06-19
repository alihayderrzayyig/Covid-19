<div class="p-0 m-0 admin-side-bar col-3">
    <div class="admin-info">
        <img src="{{ asset('img/08.jpg ') }}" alt="" class="bg-img">
        <img src="{{ asset('img/user.jpg ') }}" alt="">
        <h4>{{ auth()->user()->name }}</h4>
        <p class="m-0">{{ auth()->user()->email }}</p>
    </div>
    <div class="admin-link">
        <a href="{{ route('admin.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='main' ) active @endif">
            <i class="fas fa-home align-self-center"></i>
            <p class="align-self-center">الصفحة الرئيسية</p>
        </a>
        <a href="{{ route('admin.message.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='admin-message' ) active @endif">
            <i class="fas fa-sms align-self-center"></i>
            <p class="align-self-center">الرسائل</p>
        </a>
        <a href="{{ route('admin.vaccine.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar == 'vaccine') active @endif">
            <i class="fas fa-syringe align-self-center"></i>
            <p class="align-self-center">اللقاحات</p>
        </a>
        <a href="{{ route('admin.counting.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='counting' ) active @endif">
            <i class="fas fa-chart-line align-self-center"></i>
            <p class="align-self-center">الاحصائيات</p>
        </a>
        <a href="{{ route('admin.users.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='users' ) active @endif">
            <i class="fas fa-users align-self-center"></i>
            <p class="align-self-center">الاعظاء</p>
        </a>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="flex-row-reverse d-flex">
                <i class="fas fa-sign-out-alt align-self-center"></i>
                <p class="align-self-center">تسجيل الخروج</p>
            </button>
        </form>
    </div>
</div>
