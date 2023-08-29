<div class="form-group">
    @if($show_label)
    <x-common.label class="{{$class}}" label="{{ $label }}" attribute="{{ $attribute }}" :showAsterisk="$required" />
    @endif
    <select class="form-control {{ $class }} {{ $errors->has( $attribute ) ? ' is-invalid' : '' }}" 
        name="{{ $attribute }}" id="input-{{ $attribute }}" 
        {{ ($required) ? 'required' : '' }}
        {{ ($readonly) ? 'readonly' : '' }}
        {{ ($disabled) ? 'disabled' : '' }}
        {{ ($multiselect) ? 'multiple' : '' }}
    >
        {{$slot}}
    </select>
    <x-form.error attribute="{{ $attribute }}" />
</div>