<div class="box-body">
    {!! Form::open($options) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', old('name') ? old('name') : $product->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sku', 'Sku:') !!}
        {!! Form::text('sku', old('sku') ? old('sku') : $product->sku, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, old('category_id') ? old('category_id') : $product->category_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('brand_id', 'Brand:') !!}
        {!! Form::select('brand_id', $brands, old('brand_id')? old('brand_id') : $product->brand_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('distributors', 'Distributor:') !!}
        {!! Form::select('distributors[]', $distributors, old('distributors') ? old('distributors') : $product->distributors()->lists('distributor_id'), ['class' => 'form-control', 'multiple' => true]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::input('number', 'price', old('price') ? old('price') : $product->price, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('availability', 'Availability:') !!}
        {!! Form::select('availability', $availabilities, old('availability') ? old('availability') : $product->availability, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('condition', 'Condition:') !!}
        {!! Form::select('condition', $conditions, old('condition') ? old('condition') : $product->condition, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::input('number', 'quantity', old('quantity') ? old('quantity') : $product->quantity, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', old('description') ? old('description') : $product->description, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>