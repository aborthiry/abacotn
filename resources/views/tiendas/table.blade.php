<div class="table-responsive">
    <table class="table" id="tiendas-table">
        <thead>
            <tr>
                <th>Client_Id</th>
                <th>Client_Secret</th>
                <th>Store_Id</th>
                <th>Token</th>
                <th>Habilitada</th>
                <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiendas as $tienda)
            <tr>
                <td>{{ $tienda->client_id }}</td>
                <td>{{ $tienda->client_secret }}</td>
                <td>{{ $tienda->store_id }}</td>
                <td>{{ $tienda->token }}</td>
                <td>{{ $tienda->habilitada }}</td>
                <td>{{ $tienda->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['tiendas.destroy', $tienda->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                        <a href="{{ route('tiendas.edit', [$tienda->id]) }}" class='btn btn-secondary btn-xs'><i
                                class="fa fa-pencil-square-o"></i></a>

                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'
                        => 'btn btn-secondary btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}

                        <a href="{{ 'https://www.tiendanube.com/apps/'.$tienda->client_id.'/authorize' }}"
                            class='btn btn-secondary btn-xs'><i class="fa fa-refresh"></i></a>
                    </div>
                    {!! Form::close() !!}


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>