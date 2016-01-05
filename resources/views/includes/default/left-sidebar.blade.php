
<div class="left-sidebar">
    <h2>Category</h2>

    <div class="panel-group category-products" id="accordian">

        @forelse($categories as $category)
            @if ($category->parent_id == 0)

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h4 class="panel-title">
                            @if ($category->children()->count() > 0)
                                <a class="parents" data-children="c{{ $category->id }}" data-toggle="collapse" data-parent="#accordian" href="#c{{ $category->id }}">
                                    <span class="badge pull-right"><i
                                                class="fa {{ (isset($curCategory) && in_array($curCategory->id, $category->children->lists('id'))) ? 'fa-minus' : 'fa-plus' }}"></i></span>
                                    {{ $category->name }}
                                </a>
                            @else

                                @if (isset($curCategory) && ($curCategory->id == $category->id))
                                    <a href="{{ App\Helpers\MyHtml::remove_category($category) }}" class="pull-right remove-selection"><i class="fa fa-times"></i></a>
                                @else
                                    <a href="{{ App\Helpers\MyHtml::action_to_category($category) }}" class="{{ (isset($curCategory) && ($curCategory->id == $category->id)) ? 'active-category' : '' }}">{{ $category->name }}</a>
                                @endif

                            @endif
                        </h4>
                    </div>

                    @if ($category->children()->count() > 0)
                        <div id="c{{ $category->id }}"
                             class="panel-collapse {{ (isset($curCategory) && in_array($curCategory->id, $category->children->lists('id'))) ? 'in' : 'collapse' }}">
                            <div class="panel-body">
                                <ul>
                                    @foreach ($category->children()->orderBy('name')->get() as $child)
                                        <li>
                                            <a href="{{ App\Helpers\MyHtml::action_to_category($child) }}" class="{{ (isset($curCategory) && ($curCategory->id == $child->id)) ? 'active-category' : '' }}">{{ $child->name }}</a>
                                            @if (isset($curCategory) && ($curCategory->id == $child->id))
                                                <a href="{{ App\Helpers\MyHtml::remove_category($child) }}" class="pull-right child-remove-selection"><i class="fa fa-times"></i></a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>

            @endif
        @empty

        @endforelse
    </div>

    @if ($brands->count() > 0)
        <div class="brands_products">

            <h2>Brands</h2>

            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">

                    @foreach ($brands as $brand)
                        @if ($brand->products()->count() > 0)
                            <li>
                                @if (isset($curBrand) && ($brand->id == $curBrand->id))
                                    <a class="active-brand"
                                       href="{{ App\Helpers\MyHtml::remove_brand($brand) }}">{{ $brand->name }}&nbsp;<i class="fa fa-times pull-right font12"></i></a>
                                @else
                                    <a class=""
                                       href="{{ App\Helpers\MyHtml::action_to_brand($brand) }}">{{ $brand->name }}&nbsp;<span class="pull-right font12">({{ $brand->products()->count() }})</span></a>
                                @endif
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>

        </div>
    @endif

    <div class="price-range">
        <h2>Price Range</h2>

        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5"
                   data-slider-value="[250,450]" id="sl2"><br/>
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div>

    <div class="shipping text-center">
        <img src="{{ asset('images/home/shipping.jpg') }}" alt=""/>
    </div>

</div>

@section('footer-content')

    <script type="text/javascript">
        $(document).ready(function () {
            $('.parents').click(function () {

                if ($('#' + $(this).attr('data-children')).hasClass('collapse')) {
                    $(this).find('i').attr('class', 'fa fa-minus');
                } else {
                    $(this).find('i').attr('class', 'fa fa-plus');
                }

            });
        });
    </script>

@stop

