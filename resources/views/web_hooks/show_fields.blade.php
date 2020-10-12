<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $webHook->id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $webHook->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $webHook->updated_at }}</p>
</div>

<!-- Id Wh Field -->
<div class="form-group">
    {!! Form::label('id_wh', 'Id Wh:') !!}
    <p>{{ $webHook->id_wh }}</p>
</div>

<!-- Store Id Field -->
<div class="form-group">
    {!! Form::label('store_id', 'Store Id:') !!}
    <p>{{ $webHook->store_id }}</p>
</div>

<!-- Event Field -->
<div class="form-group">
    {!! Form::label('event', 'Event:') !!}
    <p>{{ $webHook->event }}</p>
</div>

