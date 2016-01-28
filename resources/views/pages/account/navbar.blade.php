<div class="col-sm-3" id="account-sidebar">
    <h4>{{ trans('lang.Manage Account') }}</h4>
    <ul class="nav nav-list">
        <li>
            <a href="{{ url('account/dashboard') }}" class="@if (Request::url() == url('account/dashboard')) active @endif">
                {{ trans('lang.General Information') }}
            </a>
        </li>
        <li>
            <a href="{{ url('account/order') }}" class="@if (Request::url() == url('account/order')) active @endif">
                {{ trans('lang.Order') }}
            </a>
        </li>
    </ul>
</div>