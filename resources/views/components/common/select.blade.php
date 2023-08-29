<select class="form-control{{ $errors->has($attribute) ? ' is-invalid' : '' }}" 
    name="{{ $attribute }}" id="input-{{ $id }}" {{ ($required) ? 'required' : '' }}
    {{ ($multiselect) ? 'multiple' : '' }}>
    {{$slot}}
</select>