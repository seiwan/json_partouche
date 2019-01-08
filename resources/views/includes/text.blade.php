<div id='group-{{ $field }}' class="form-group {{ $errors->has($field) ? ' has-error' : '' }} {{ old($field) && !$errors->has($field) ? ' has-success' : '' }}">
    {{ Form::label($field, $fieldName, ['class' => 'control-label col-sm-2']) }}

    <div class="col-sm-6">
        {{ Form::text($field, null, ['class' => 'form-control', 'placeholder' => $placeholder]) }}

        @if ( $errors->has($field) )
            <span id="{{ $field }}ErrorMsg" class="help-block">
                <strong>
                    {{ $errors->first($field) }}
                </strong>
            </span>
        @endif
    </div>
</div>
