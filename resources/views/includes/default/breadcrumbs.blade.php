<div class="breadcrumbs">
    <ol class="breadcrumb no-padding">
        @forelse ($items as $item)

            @if ($item['active'] == 0)
                <li class="active">
                    <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                </li>
            @else
                <li>
                    {{ $item['title'] }}
                </li>
            @endif

        @empty

        @endforelse
    </ol>
</div>
<div class="clearfix"></div>