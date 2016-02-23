@section('head')
    <link rel="stylesheet"
          href="{{ asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@stop

@if ($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Whoops!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {!! App\Helpers\MyHtml::label('name', 'Name', true) !!}
    {!! App\Helpers\MyHtml::text('name', old('name') ? old('name') : (isset($product) ? $product->name : null), ['class'
    =>
    'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('sku', 'Sku', true) !!}
    {!! App\Helpers\MyHtml::text('sku', old('sku') ? old('sku') : (isset($product) ? $product->sku : null), ['class' =>
    'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('slug', 'Slug', false) !!}
    {!! App\Helpers\MyHtml::text('slug', old('slug') ? old('slug') : (isset($product) ? $product->slug : null), ['class'
    =>
    'form-control', 'readonly' => true]) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('images', 'Image') !!}
    {!! App\Helpers\MyHtml::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('category_id', 'Category', true) !!}
    {!! App\Helpers\MyHtml::select('category_id', $categories, old('category_id') ? old('category_id') :
    (isset($product) ?
    $product->category_id : null), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('brand_id', 'Brand') !!}
    {!! App\Helpers\MyHtml::select('brand_id', $brands, old('brand_id')? old('brand_id') : (isset($product) ?
    $product->brand_id :
    null), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('distributors', 'Distributor') !!}
    {!! App\Helpers\MyHtml::select('distributors[]', $distributors, old('distributors') ? old('distributors') :
    (isset($product) ?
    $product->distributors()->lists('distributor_id') : null), ['id' => 'distributor-selection', 'class' =>
    'form-control', 'multiple' => true]) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('price', 'Price') !!}
    {!! App\Helpers\MyHtml::input('number', 'price', old('price') ? old('price') : (isset($product) ? $product->price :
    null),
    ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('availability', 'Availability') !!}
    {!! App\Helpers\MyHtml::select('availability', $availabilities, old('availability') ? old('availability') :
    (isset($product) ?
    $product->availability : null), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('condition', 'Condition') !!}
    {!! App\Helpers\MyHtml::select('condition', $conditions, old('condition') ? old('condition') : (isset($product) ?
    $product->condition : null), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('quantity', 'Quantity') !!}
    {!! App\Helpers\MyHtml::input('number', 'quantity', old('quantity') ? old('quantity') : (isset($product) ?
    $product->quantity
    : null), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! App\Helpers\MyHtml::label('description', 'Description') !!}
    {!! App\Helpers\MyHtml::textarea('description', old('description') ? old('description') : (isset($product) ?
    $product->description : null), ['class' => 'product-des form-control']) !!}
</div>

@section('footer-content')

    @parent

    <script src="{{ asset('js/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('.product-des').wysihtml5();
            $('#distributor-selection').select2({
                placeholder: 'Select a distributor'
            });

            $('input[name="name"]').blur(function () {

                $.ajax({
                    url: '/admin/product/generate-slug',
                    method: 'POST',
                    data: {
                        name: $(this).val()
                    },
                    success: function (data) {
                        $('input[name="slug"]').val(data);
                    }
                });

            });

            //get attribute when default
            var category = $('select[name="category_id"]');
            /*if (category.val() > 0) {
                getAttribute(category.val());
            }*/

            //get attribute when change value of category selector
            category.change(function () {
                getAttribute($(this).val());
            });

            function getAttribute(id) {
                $.ajax({
                    url: '/admin/category/get-attribute',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function (json) {

                        var data = $.parseJSON(json);
                        var container = $('.attribute-container');

                        //clear old attribute list
                        container.html('');

                        //append attribute
                        for (var i = 0; i < data.length; i++) {
                            var attributeModel = $('.attribute-model').clone();

                            container.append(attributeModel);
                            container.find('.attribute-model').attr('class', '');
                            container.find('.attribute-item-label').removeClass('attribute-item-label').attr('for', data[i]['key']).text(data[i]['name']);
                            container.find('.attribute-item-value').removeClass('attribute-item-value').attr('name', 'attribute[' + data[i]['key'] + ']');
                        }

                    }
                });
            }
        });

    </script>

@stop
