@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
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
        {!! App\Helpers\MyHtml::label('title', 'Title', true) !!}
        {!! App\Helpers\MyHtml::text('title', old('title') ? old('title') : (isset($blog) ? $blog->title : null), ['class' =>
        'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('slug', 'Slug', false) !!}
        {!! App\Helpers\MyHtml::text('slug', old('slug') ? old('slug') : (isset($blog) ? $blog->slug : null), ['class' =>
        'form-control', 'readonly' => true]) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('subtitle', 'Subtitle') !!}
        {!! App\Helpers\MyHtml::textarea('subtitle', old('subtitle') ? old('subtitle') : (isset($blog) ? $blog->subtitle : null), ['class' =>
        'form-control', 'rows' => '3']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('image', 'Thumbnail Image') !!}
        {!! App\Helpers\MyHtml::file('image', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::label('content', 'Content', true) !!}
        {!! App\Helpers\MyHtml::textarea('content', old('content') ? old('content') : (isset($blog) ?
        $blog->content : null), ['class' => 'blog-content form-control']) !!}
    </div>

    <div class="form-group">
        {!! App\Helpers\MyHtml::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

@section('footer-content')

    @parent

    <script src="{{ asset('js/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        $('.blog-content').wysihtml5();
        $('input[name="title"]').blur(function() {

            $.ajax({
                url: '/admin/blog/generate-slug',
                method: 'POST',
                data: {
                    title: $(this).val(),
                    _token: $('input[name="_token"]').val()
                },
                success: function(data) {
                    $('input[name="slug"]').val(data);
                }
            });

        });

    </script>

@stop
