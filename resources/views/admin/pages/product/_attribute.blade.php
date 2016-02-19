{{--<a href="javascript:void(0)" class="btn btn-xs btn-default font14 add-attribute"><i class="fa fa-plus"></i> {{ trans('lang.add') }}</a>--}}

@foreach($attributes as $attr)

    <div class="form-group">
        {!! App\Helpers\MyHtml::label($attr['key'], "{$attr['name']}") !!}
        {!! App\Helpers\MyHtml::text("attribute[{$attr['key']}]", old("attribute[{$attr['key']}]") ?
        old("attribute[{$attr['key']}]") : (isset($attr['value']) ? $attr['value'] : ''), ['class' => 'form-control'])
        !!}
        <div class="col-sm-3">
            <a href="javascript:void(0);" class="btn btn-xs btn-default font14 remove-attribute">
                <i class="fa fa-times-circle"></i> {{ trans('lang.remove') }}
            </a>
        </div>
    </div>

@endforeach

@section('footer-content')

    @parent

    <script type="text/javascript">
        $('.remove-attribute').click(function () {
            $(this).parent().parent().remove();
            $.growl.notice({ message: "{{ trans('lang.remove_attribute') }}" });
        });
    </script>

@stop