


<div class="box-body">
    {!! Form::open(array_merge($options, ['class' => 'form-horizontal'])) !!}

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
        {!! App\Helpers\MyHtml::text('name', old('name') ? old('name') : (isset($product) ? $product->name : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('sku', 'Sku', true) !!}
        {!! App\Helpers\MyHtml::text('sku', old('sku') ? old('sku') : (isset($product) ? $product->sku : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('images', 'Image') !!}
        {!! App\Helpers\MyHtml::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('category_id', 'Category', true) !!}
        {!! App\Helpers\MyHtml::select('category_id', $categories, old('category_id') ? old('category_id') : (isset($product) ?
        $product->category_id : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('brand_id', 'Brand') !!}
        {!! App\Helpers\MyHtml::select('brand_id', $brands, old('brand_id')? old('brand_id') : (isset($product) ? $product->brand_id :
        null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('distributors', 'Distributor') !!}
        {!! App\Helpers\MyHtml::select('distributors[]', $distributors, old('distributors') ? old('distributors') : (isset($product) ?
        $product->distributors()->lists('distributor_id') : null), ['class' => 'form-control', 'multiple' => true]) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('price', 'Price') !!}
        {!! App\Helpers\MyHtml::input('number', 'price', old('price') ? old('price') : (isset($product) ? $product->price : null),
        ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('availability', 'Availability') !!}
        {!! App\Helpers\MyHtml::select('availability', $availabilities, old('availability') ? old('availability') : (isset($product) ?
        $product->availability : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('condition', 'Condition') !!}
        {!! App\Helpers\MyHtml::select('condition', $conditions, old('condition') ? old('condition') : (isset($product) ?
        $product->condition : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('quantity', 'Quantity') !!}
        {!! App\Helpers\MyHtml::input('number', 'quantity', old('quantity') ? old('quantity') : (isset($product) ? $product->quantity
        : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('description', 'Description') !!}
        {!! App\Helpers\MyHtml::textarea('description', old('description') ? old('description') : (isset($product) ?
        $product->description : null), ['class' => 'product-des form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>

@section('footer-content')

    @parent

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.product-des').wysihtml5();
    </script>

@endsection
