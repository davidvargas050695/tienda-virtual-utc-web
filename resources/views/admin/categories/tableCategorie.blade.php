<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                @if ($category->status =='activo')
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-close text-warning"></i>
                @endif
            <td>
                @can('update category')
                    <a href="{{route('edit-category',$category->id)}}"
                                        class="btn btn-default btn-xs"
                                        data-toggle="tooltip"
                                        data-original-title="Editar"
                                        data-id-category="{{$category->id}}">
                                        <i class="fa fa-pencil font-14"></i>
                     </a>
                @endcan
                @can('delete category')
                    <a class="btn btn-default btn-xs btn-delete-category"
                        data-toggle="tooltip"
                        @if ($category->status=="activo")
                            data-original-title="Deshabilitar"
                        @else
                            data-original-title="Habilitar"
                        @endif
                        data-id-category="{{$category->id}}">
                        @if ($category->status=="activo")
                        <i class="fa fa-close font-14 text-danger"></i>
                        @else
                        <i class="fa fa-exchange font-14 text-success"></i>
                        @endif

                    </a>
                @endcan


            </td>
        </tr>
        @endforeach
    </tbody>
</table>

