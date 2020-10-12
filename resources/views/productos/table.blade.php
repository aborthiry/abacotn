<div class="table-responsive">
    <table class="table" id="tiendas-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Precio</th>                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->name->es }}</td>
                <td>{{ $producto->description->es }}</td>
                <td>{{ $producto->variants[0]->stock }}</td>
                <td>{{ $producto->variants[0]->price }}</td>
               
                <td>
                    {!! Form::open(['route' => ['tiendas.destroy', $producto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                        <a href="{{ route('tiendas.edit', [$producto->id]) }}" class='btn btn-secondary btn-xs'><i
                                class="fa fa-pencil-square-o"></i></a>

                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'
                        => 'btn btn-secondary btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}

                        
                    </div>
                    {!! Form::close() !!}


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>