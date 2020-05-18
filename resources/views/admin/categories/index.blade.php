@extends('admin.base.index')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="ibox">
            <div class="ibox-head bg-info">
                <div class="ibox-title text-white">Nueva Categortía</div>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-body">
                {!! Form::open(['url' => 'store-category']) !!}
                    @include('admin.categories.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="ibox">
            <div class="ibox-head badge-info">
                <div class="ibox-title">Lista de Categorías</div>
            </div>
            <div class="ibox-body">
                <div class="table-categories">
                    @include('admin.categories.tableCategorie')

                </div>
                {{$categories->render()}}
            </div>
        </div>
    </div>
</div>
@endsection

@include('admin.categories.script')
