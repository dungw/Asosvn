<div class="form-group">
    <a href="javascript:void(0)" class="btn btn-xs btn-default font14 add-attribute"><i
                class="fa fa-plus"></i> {{ trans('lang.add') }}</a>
</div>

<div class="attribute-container">
    <?php $elementIndex = 0; ?>

    @forelse($attributes as $attr)

        <div class="form-group attribute-item">

            <div class="col-sm-2">
                <input type="text" name="attribute[{{ $elementIndex }}][key]" class="form-control" value="{{ old("attribute[{$elementIndex}][key]") ?
                old("attribute[{$elementIndex}][key]") : $attr['key'] }}">
            </div>

            <div class="col-sm-4">
                <input type="text" name="attribute[{{ $elementIndex }}][name]" class="form-control" value="{{ old("attribute[{$elementIndex}][name]") ?
                old("attribute[{$elementIndex}][name]") : $attr['name'] }}">
            </div>

            <!--
        <div class="col-sm-2">
{{--            <input type="text" name="attribute[{{ $index }}][key]" class="form-control" value="{{ old("attribute[{$index}][key]") ?--}}
                old("attribute[{$index}][key]") : $attr['key'] }}">
        </div>
        -->

            <div class="col-sm-4">
                <a href="javascript:void(0);" class="btn btn-xs btn-default font14 remove-attribute">
                    <i class="fa fa-times-circle"></i> {{ trans('lang.remove') }}
                </a>
            </div>

        </div>

        <?php $elementIndex ++; ?>

    @empty

        <div class="form-group attribute-item">

            <div class="col-sm-2">
                <input type="text" name="attribute[0][key]" class="form-control attribute-item-key" placeholder="Attribute key here..">
            </div>

            <div class="col-sm-4">
                <input type="text" name="attribute[0][name]" class="form-control attribute-item-name" placeholder="Attribute name here..">
            </div>

            <!--
        <div class="col-sm-2">
{{--            <input type="text" name="attribute[{{ $index }}][key]" class="form-control" value="{{ old("attribute[{$index}][key]") ?--}}
                old("attribute[{$index}][key]") : $attr['key'] }}">
        </div>
        -->

            <div class="col-sm-4">
                <a href="javascript:void(0);" class="btn btn-xs btn-default font14 remove-attribute">
                    <i class="fa fa-times-circle"></i> {{ trans('lang.remove') }}
                </a>
            </div>

        </div>

    @endforelse
</div>

<!-- store attribute number -->
<input type="hidden" name="attr_number_temp" value="{{ $elementIndex }}">

<div class="hidden attribute-model">
    <div class="form-group">

        <div class="col-sm-2">
            <input type="text" name="" class="form-control attribute-item-key" placeholder="Attribute key here..">
        </div>

        <div class="col-sm-4">
            <input type="text" name="" class="form-control attribute-item-name" placeholder="Attribute name here..">
        </div>

        <!--
        <div class="col-sm-2">
{{--            <input type="text" name="attribute[{{ $index }}][key]" class="form-control" value="{{ old("attribute[{$index}][key]") ?--}}
                old("attribute[{$index}][key]") : $attr['key'] }}">
        </div>
        -->

        <div class="col-sm-4">
            <a href="javascript:void(0);" class="btn btn-xs btn-default font14 remove-attribute">
                <i class="fa fa-times-circle"></i> {{ trans('lang.remove') }}
            </a>
        </div>

    </div>

</div>

@section('footer-content')

    @parent

    <script type="text/javascript">
        $(document).ready(function () {
            $('.remove-attribute').click(function () { $(this).parent().parent().remove(); });

            $('.add-attribute').click(function () {

                var attributeModel = $('.attribute-model').clone();
                var container = $('.attribute-container');
                var indexDom = $('input[name=attr_number_temp]');
                var index = parseInt(indexDom.val()) + 1;

                container.append(attributeModel);
                container.find('.attribute-model').attr('class', '');
                container.find('.attribute-item-key').removeClass('attribute-item-key').addClass('attribute[' + index + '][key]');
                container.find('.attribute-item-name').removeClass('attribute-item-name').addClass('attribute[' + index + '][name]');

                indexDom.val( index );

            });
        });
    </script>

@stop



