<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="https://bootadmin.net/">Statist</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in-alt"></i> {{ __('auth.login') }}</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><i class="fa fa-user-plus"></i> {{ __('auth.register') }}</a></li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> {{ __('auth.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{--<a href="{{ route('logout') }}" class="nav-link"><i class="fa fa-sign-out-alt"></i> Выйти</a>--}}
                </li>
            @endguest
        </ul>
    </div>
</nav>