<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
    <thead>
        <tr>

            <th>CI</th>
            <th>RUC</th>
            <th>Nombres y Apellidos</th>
            <th>Email</th>
            <th>Télefono</th>
            <th>Empresa</th>
            <th>Aprobado</th>
            <th>Estado</th>
            <th>Ver</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($merchants as $merchant)
        <tr>
            <td>{{$merchant->user->ci}}</td>
            <td>{{$merchant->user->ruc}}</td>
            <td>{{$merchant->user->last_name}} {{$merchant->user->name}}</td>
            <td>{{$merchant->user->email}}</td>
            <td>{{$merchant->phone}}</td>
            <td>{{$merchant->company_name}}</td>
            <td>{{\Carbon\Carbon::parse($merchant->updated_at)->diffForhumans()}}</td>

            <td>
                @if ($merchant->status =='aprobado')
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-close text-warning"></i>
                @endif
            <td>

                @can('update user')
            <a href="{{route('show-request-merchants',$merchant->id)}}" class="btn btn-default btn-xs"
                    title="Ver petición"
                    data-toggle="tooltip">
                        <i class="fa fa-eye font-14 text-primary"></i>
                    </a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

