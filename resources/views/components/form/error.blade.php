@if($errors->has(convert_attr_name($attribute)))
  <span id="{{ $attribute }}-error" class="error d-block text-danger" for="input-{{ $attribute }}">
    {{ $errors->first(convert_attr_name($attribute)) }}
  </span>
@endif