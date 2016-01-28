<div class="col-sm-3 shopper-info" id="account-sidebar">
    <p>{{ trans('lang.Manage Account') }}</p>
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