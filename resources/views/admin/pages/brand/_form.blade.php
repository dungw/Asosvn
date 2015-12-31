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
        {!! App\Helpers\MyHtml::text('name', old('name') ? old('name') : (isset($brand) ? $brand->name : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('slug', 'Slug', false) !!}
        {!! App\Helpers\MyHtml::text('slug', old('slug') ? old('slug') : (isset($brand) ? $brand->slug : null), ['class' =>
        'form-control', 'readonly' => true]) !!}
    </div>

    @if (isset($brand))
    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-7">
            {!! isset($brand) ? Html::image(App\Helpers\MyHtml::showThumb($brand->logo, 'brand') , null, []) : '' !!}
        </div>
    </div>
    @endif

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('logo', 'Logo') !!}
        {!! App\Helpers\MyHtml::file('logo', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('website', 'Website') !!}
        {!! App\Helpers\MyHtml::text('website', old('website') ? old('website') : (isset($brand) ? $brand->website : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('order', 'Order') !!}
        {!! App\Helpers\MyHtml::input('number', 'order', old('order') ? old('order') : (isset($brand) ? $brand->order : null), ['class' => 'form-control']) !!}
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
                url: '/admin/brand/generate-slug',
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

@stop