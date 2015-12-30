<!-- Define layout: default / boxed -->
@extends('admin.layouts.boxed')
<!-- Define layout: default / boxed -->

@section('page-header')
    <section class="content-header">
        <h1>
            Boxed Layout
            <small>Blank example to the boxed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Boxed</li>
        </ol>
    </section>
@stop

@section('content')
    <section class="content">
        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when
                working on
                large screens because it prevents the site from stretching very wide.</p>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                Start creating your amazing application!
            </div>
            <div class="box-footer">
                Footer
            </div>
        </div>
    </section>
@stop



