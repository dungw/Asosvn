@extends('admin.layouts.boxed')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Product
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="{{ url('admin/product') }}">Products</a></li>
            <li class="active"><a href="#">Create product</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Create product</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url' => 'admin/product']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('sku', 'Sku:') !!}
                {!! Form::text('sku', old('sku'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('brand_id', 'Brand:') !!}
                {!! Form::select('brand_id', $brands, old('brand_id'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', old('price'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('availability', 'Availability:') !!}
                {!! Form::select('availability', $availabilities, old('availability'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('condition', 'Condition:') !!}
                {!! Form::select('condition', $conditions, old('condition'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('quantity', 'Quantity:') !!}
                {!! Form::text('quantity', 'quantity', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
@stop

