<div class="col-sm-3">
    <ul class="list-group">
        <li class="list-group-item no-radius">
            <a href="{{ url('account/dashboard') }}" class="@if (Request::url() == url('account/dashboard')) active @endif">
                {{ trans('lang.General Information') }}
            </a>
        </li>
        <li class="list-group-item no-radius">
            <a href="{{ url('account/order') }}" class="@if (Request::url() == url('account/order')) active @endif">
                {{ trans('lang.Order') }}
            </a>
        </li>
    </ul>
</div>