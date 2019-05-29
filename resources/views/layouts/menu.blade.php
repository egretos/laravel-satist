<div class="sidebar sidebar-dark bg-dark">
    <ul class="list-unstyled">
        <li @if(Request::routeIs('home')) class="active" @endif>
            <a href="{{ route('home') }}">
                <i class="fa fa-fw fa-chart-bar"></i> Главная
            </a>
        </li>
    </ul>
    <ul class="list-unstyled">
        <li @if(Request::routeIs('entities.index')) class="active" @endif>
            <a href="{{ route('entities.index') }}">
                <i class="fa fa-fw fa-list"></i> {{ __('entity.Entities') }}
            </a>
        </li>
    </ul>
</div>