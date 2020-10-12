<div class="table-responsive">
    <table class="table" id="webHooks-table">
        <thead>
            <tr>
                <th>Id Wh</th>
                <th>Store Id</th>
                <th>Event</th>
                <th>Created_at</th>

            </tr>
        </thead>
        <tbody>
            @foreach($webHooks as $webHook)
            <tr>
                <td>{{ $webHook->id_wh }}</td>
                <td>{{ $webHook->store_id }}</td>
                <td>{{ $webHook->event }}</td>
                <td>{{ $webHook->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>