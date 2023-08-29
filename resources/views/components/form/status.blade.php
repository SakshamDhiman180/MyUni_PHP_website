<div class="form-group mt-3">
    @if ((bool) $label)
        <x-common.label label="{{ $label }}" attribute="{{ $attribute }}" />
    @endif
    <div class="form-check form-switch">
        <x-common.checkbox attribute="{{ $attribute }}" class="form-check-input" value="{{ $value }}"
            checked="{{ $checked }}" />
        <x-common.label class="form-check-label" attribute="{{ $attribute }}" label="Active" />
    </div>
</div>
