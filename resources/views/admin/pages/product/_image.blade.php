<input type="hidden" name="_token" value="{{ csrf_token() }}">
@foreach ($product->images()->get() as $image)

    <div id="row-image-{{ $image->id }}" class="row row-img border-b">
        <div class="col-sm-10">
            <img src="{{ asset('uploads/products/' . $image->image[0] . '/' . $image->image[1] . '/' . $image->image[2] . '/' . \App\ProductImage::getThumb($image->image)) }}">
        </div>

        <div class="col-sm-2">

            <a href="javascript:void(0);" class="btn btn-xs btn-default font14 remove-image" image="{{ $image->id }}">
                <i class="fa fa-times-circle"></i> Remove
            </a>
        </div>
    </div>

@endforeach

@section('footer-content')

    @parent

    <script type="text/javascript">

        $('a.remove-image').on('click', function () {

            var image = $(this).attr('image');

            $.ajax({
                url: '/admin/product/{{ $product->id }}/delimage/' + image,
                type: 'PUT',
                data: '',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            })
            .done(function (json) {
                var data = JSON.parse(json);
                if (data.success) {
                    $.growl.notice({message: "Delete image successful!"});

                    //remove row
                    $('#row-image-' + image).fadeOut();

                } else {
                    $.growl.error({message: "Cannot delete this image!"});
                }
            })
            .fail(function () {
                $.growl.error({message: "Cannot delete this image!"});
            });
        });

    </script>

@endsection
