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
        {!! Form::text('name', old('name') ? old('name') : (isset($category) ? $category->name : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('parent_id', 'Parent:') !!}
        {!! Form::select('parent_id', $categories, old('parent_id') ? old('parent_id') : (isset($category) ? $category->parent_id : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('order', 'Order:') !!}
        {!! Form::input('number', 'order', old('order') ? old('order') : (isset($category) ? $category->order : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>