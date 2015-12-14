<div class="box-body">
    {!! Form::open($options) !!}

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
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', old('name') ? old('name') : (isset($product) ? $product->name : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sku', 'Sku:') !!}
        {!! Form::text('sku', old('sku') ? old('sku') : (isset($product) ? $product->sku : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Image:') !!}
        {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, old('category_id') ? old('category_id') : (isset($product) ?
        $product->category_id : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('brand_id', 'Brand:') !!}
        {!! Form::select('brand_id', $brands, old('brand_id')? old('brand_id') : (isset($product) ? $product->brand_id :
        null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('distributors', 'Distributor:') !!}
        {!! Form::select('distributors[]', $distributors, old('distributors') ? old('distributors') : (isset($product) ?
        $product->distributors()->lists('distributor_id') : null), ['class' => 'form-control', 'multiple' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::input('number', 'price', old('price') ? old('price') : (isset($product) ? $product->price : null),
        ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('availability', 'Availability:') !!}
        {!! Form::select('availability', $availabilities, old('availability') ? old('availability') : (isset($product) ?
        $product->availability : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('condition', 'Condition:') !!}
        {!! Form::select('condition', $conditions, old('condition') ? old('condition') : (isset($product) ?
        $product->condition : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::input('number', 'quantity', old('quantity') ? old('quantity') : (isset($product) ? $product->quantity
        : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', old('description') ? old('description') : (isset($product) ?
        $product->description : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>