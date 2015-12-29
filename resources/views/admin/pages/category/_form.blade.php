<div class="box-body">
    {!! Form::open(array_merge($options, ['class' => 'form-horizontal'])) !!}

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Whoops!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li><% $error %></li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('name', 'Name', true) !!}
        {!! App\Helpers\MyHtml::text('name', old('name') ? old('name') : (isset($category) ? $category->name : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('slug', 'Slug', false) !!}
        {!! App\Helpers\MyHtml::text('slug', old('slug') ? old('slug') : (isset($category) ? $category->slug : null), ['class' =>
        'form-control', 'readonly' => true]) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('parent_id', 'Parent') !!}
        {!! App\Helpers\MyHtml::select('parent_id', $categories, old('parent_id') ? old('parent_id') : (isset($category) ? $category->parent_id : 0), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('order', 'Order') !!}
        {!! App\Helpers\MyHtml::input('number', 'order', old('order') ? old('order') : (isset($category) ? $category->order : null), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>

@section('footer-content')

    @parent

    <script type="text/javascript">
        $('input[name="name"]').blur(function() {

            $.ajax({
                url: '/admin/category/generate-slug',
                method: 'POST',
                data: {
                    name: $(this).val()
                },
                success: function(data) {
                    $('input[name="slug"]').val(data);
                }
            });

        });
    </script>

@endsection