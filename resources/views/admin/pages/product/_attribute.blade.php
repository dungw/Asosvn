
@foreach($attributes as $attr)

    <div class="form-group">
        {!! App\Helpers\MyHtml::label($attr['key'], "{$attr['name']}") !!}
        {!! App\Helpers\MyHtml::text("attribute[{$attr['key']}]", old("attribute[{$attr['key']}]") ? old("attribute[{$attr['key']}]") : (isset($attr['value']) ? $attr['value'] : ''), ['class' => 'form-control']) !!}
    </div>

@endforeach
