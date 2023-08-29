<div class="form-group">
    @if ($show_label)
        <label for="input-{{ $attribute }}" class="col-form-label pt-0":showAsterisk="$required">{{ $label }}
            @if ($tooltip != '')
                <small class="text-muted" style="font-size: 0.8rem;">{{ $tooltip }}</small>
            @endif
            @if ($required == true || $required == 'true')
                <span class="required">*</span>
            @endif
        </label>
    @endif
    <textarea class="form-control{{ $errors->has($attribute) ? ' is-invalid' : '' }}" name="{{ $attribute }}"
        placeholder="{{ $placeholder }}" id="input-{{ $attribute }}" rows="{{ $rows }}"
        cols="{{ $cols }}" {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }}
        {{ $disabled ? 'disabled' : '' }}>{{ $slot }}</textarea>
    <x-form.error attribute="{{ $attribute }}" />
</div>
