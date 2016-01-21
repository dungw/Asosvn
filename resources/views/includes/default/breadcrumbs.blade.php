<div class="breadcrumbs">
    <ol class="breadcrumb">
        @forelse ($items as $item)
            <li>
                @if ($item['active'] == 0)
                    <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                @else
                    {{ $item['title'] }}
                @endif
            </li>
        @empty

        @endforelse
    </ol>
</div>