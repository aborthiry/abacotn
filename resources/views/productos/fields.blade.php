<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Secret Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_secret', 'Client Secret:') !!}
    {!! Form::text('client_secret', null, ['class' => 'form-control']) !!}
</div>

<!-- Store Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_id', 'Store Id:') !!}
    {!! Form::number('store_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('token', 'Token:') !!}
    {!! Form::text('token', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Habilitada Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('habilitada', 'Habilitada:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('habilitada', 0) !!}
        {!! Form::checkbox('habilitada', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tiendas.index') }}" class="btn btn-default">Cancel</a>
</div>
