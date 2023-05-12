<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::select($name, array_merge([''=>''],$options), $value,['class' => 'form-control']) }}
</div>