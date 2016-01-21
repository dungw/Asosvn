@extends('layouts.default')

@section('title')
    {{ $category->name or $brand->name }}
@stop

@section('intermediate')
    @include('includes.default.advertisement')
@stop

@section('content')
    <section>
        <div class="container">

            @include('includes.default.breadcrumbs', ['items' => [
                ['title' => trans('lang.Home'), 'url' => url('/'), 'active' => 0],
                ['title' => isset($category) ? $category->name : $brand->name, 'active' => 1],
            ]])

            <div class="row">

                <div class="col-sm-3">
                    @include('includes.default.left-sidebar')
                </div>

                <div class="col-sm-9 padding-right">

                    <div class="features_items">

                        <h2 class="title text-center">{{ $category->name or $brand->name }}</h2>

                        @forelse($products as $product)

                            @include('pages.partials.single_product', ['product' => $product])

                        @empty
                            <div class="col-sm-12">
                                <span>{{ trans('lang.No product.') }}</span>
                            </div>
                        @endforelse

                    </div>

                    <div class="pull-right">
                        {!! $products->render() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop



