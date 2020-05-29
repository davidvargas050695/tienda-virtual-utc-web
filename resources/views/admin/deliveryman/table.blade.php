<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
    <thead>
        <tr>

            <th>CI</th>
            <th>Nombres y Apellidos</th>
            <th>Email</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Placa</th>
            <th>Aprobado</th>
            <th>Estado</th>
            <th>Ver</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deliverymen as $delivery)
        <tr>
            <td>{{$delivery->user->ci}}</td>

            <td>{{$delivery->user->last_name}} {{$delivery->user->name}}</td>
            <td>{{$delivery->user->email}}</td>
            <td>{{$delivery->vehicle_make}}</td>
            <td>{{$delivery->vehicle_type}}</td>
            <td>{{$delivery->vehicle_plate}}</td>
            <td>{{\Carbon\Carbon::parse($delivery->updated_at)->diffForhumans()}}</td>

            <td>
                @if ($delivery->status =='aprobado')
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-close text-warning"></i>
                @endif
            <td>

                @can('update user')
            <a href="{{route('show-request-merchants',$delivery->id)}}" class="btn btn-default btn-xs"
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

