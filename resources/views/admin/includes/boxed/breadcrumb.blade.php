<section class="content-header">
    <h1>
        {{ $headingText }}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        @foreach ($breadcrumb as $crumb)
            <li @if ($crumb == end($breadcrumb)) class="active" @endif><a
                        href="{{ $crumb['url'] }}">{{ $crumb['name'] }}</a></li>
        @endforeach
    </ol>
</section>