<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio venta</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->code}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->sale_price}}</td>
            <td>{{$product->subcategory->name}}</td>

            <td>
                @if ($product->status =='activo')
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-close text-warning"></i>
                @endif
            <td>

                    <a href="{{route('edit-product',$product->id)}}"
                        class="btn btn-default btn-xs"
                        data-toggle="tooltip"
                        data-original-title="Editar"
                        data-id-product="{{$product->id}}">
                        <i class="fa fa-pencil font-14"></i>
                    </a>
                    <a
                        class="btn btn-default btn-xs btn-delete-product"
                        data-toggle="tooltip"
                        @if ($product->status=="activo")
                            data-original-title="Deshabilitar"
                        @else
                            data-original-title="Habilitar"
                        @endif
                        data-id-product="{{$product->id}}">
                            @if ($product->status=="activo")
                            <i class="fa fa-close font-14 text-danger"></i>
                            @else
                            <i class="fa fa-exchange font-14 text-success"></i>
                            @endif

                     </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

