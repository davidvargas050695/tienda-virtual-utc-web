@extends('admin.base.index')

@section('content')
<div class="row">

        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head bg-info">
                    <div class="ibox-title text-white">Nueva Tipo de empresa</div>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-body">
                    {!! Form::open(['url' => 'store-company']) !!}
                        @include('admin.companytype.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    <div class="col-md-8">
        <div class="ibox">
            <div class="ibox-head badge-info">
                <div class="ibox-title">Tipos de empresas</div>
            </div>
            <div class="ibox-body">
                <div class="table-company table-responsive">
                    @include('admin.companytype.table')

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@include('admin.companytype.script')
