<input class="form-control{{ $errors->has($attribute) ? ' is-invalid' : '' }}"
    name="{{$attribute}}" id="input-{{ convert_attr_name($attribute, '_') }}" type="{{ $type }}"
    placeholder="{{ $placeholder }}" value="{!! old(convert_attr_name($attribute), html_entity_decode($value)) !!}"  {{ $readonly }}
    {{ ($required) ? 'required' : '' }}
    {{ ($readonly == 'true') ? 'readonly' : '' }}
    {{ ($disabled) ? 'disabled' : '' }}
    {{ ($type == 'number') ? ' min=0' : '' }}
    {{($type=="date")?"max=".date('Y-m-d'):""}}
    {{($min)?"min=".$min:""}}
    {{($maxlength)?"maxlength=".$maxlength:""}}
    />
