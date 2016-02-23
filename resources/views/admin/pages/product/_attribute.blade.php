{{--<a href="javascript:void(0)" class="btn btn-xs btn-default font14 add-attribute"><i class="fa fa-plus"></i> {{ trans('lang.add') }}</a>--}}

<div class="attribute-container">
@foreach($attributes as $attr)

    <div class="form-group">
        {!! App\Helpers\MyHtml::label($attr['key'], "{$attr['name']}") !!}
        {!! App\Helpers\MyHtml::text("attribute[{$attr['key']}]", old("attribute[{$attr['key']}]") ?
        old("attribute[{$attr['key']}]") : (isset($attr['value']) ? $attr['value'] : ''), ['class' => 'form-control'])
        !!}
        <div class="col-sm-1">
            <span>{{ $attr['unit'] ? "({$attr['unit']})" : null }}</span>
        </div>
        <div class="col-sm-2">
            <a href="javascript:void(0);" class="btn btn-xs btn-default font14 remove-attribute">
                <i class="fa fa-times-circle"></i> {{ trans('lang.remove') }}
            </a>
        </div>
    </div>

@endforeach
</div>

<!-- attribute model for getting in Js -->
<div class="hidden attribute-model">

    <div class="form-group">

        <div class="col-sm-2 talign-r">
            <label for="" class="control-label attribute-item-label"></label>
        </div>

        <div class="col-sm-7">
            <input type="text" name="" class="form-control attribute-item-value" placeholder="Attribute value here..">
        </div>

        <div class="col-sm-3">
            <a href="javascript:void(0);" class="btn btn-xs btn-default font14 remove-attribute">
                <i class="fa fa-times-circle"></i> {{ trans('lang.remove') }}
            </a>
        </div>

    </div>

</div>
<!-- \attribute model for getting in Js -->

@section('footer-content')

    @parent

    <script type="text/javascript">

        $(document).on('click', '.remove-attribute', function () {
            $(this).parent().parent().remove();
        });

    </script>

@stop