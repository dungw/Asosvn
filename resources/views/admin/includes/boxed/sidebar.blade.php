<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('bower_components/AdminLTE/dist/img/owner.jpg') }}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ ucfirst(Auth::user()->name) }}</p>
                <a href="{{ url('bower_components/AdminLTE/pages/examples') }}/#"><i
                            class="fa fa-circle text-success"></i> Super Administrator</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="{{ url('admin/brand') }}">
                    <i class="fa fa-gg"></i> <span>Brand</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/brand') }}"><i class="fa fa-caret-right"></i> Listing</a></li>
                    <li><a href="{{ url('admin/brand/create') }}"><i class="fa fa-caret-right"></i> Add new</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{ url('admin/product') }}">
                    <i class="fa fa-paperclip"></i> <span>Category</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/category') }}"><i class="fa fa-caret-right"></i> Listing</a></li>
                    <li><a href="{{ url('admin/category/create') }}"><i class="fa fa-caret-right"></i> Add new</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{ url('admin/product') }}">
                    <i class="fa fa-paw"></i> <span>Product</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/product') }}"><i class="fa fa-caret-right"></i> Listing</a></li>
                    <li><a href="{{ url('admin/product/create') }}"><i class="fa fa-caret-right"></i> Add new</a></li>
                </ul>
            </li>

        </ul>
    </section>
</aside>