<div class="form-group">
    @if ($show_label)
        <x-common.label label="{{ $labelname }}" attribute="{{ $attribute }}" :showAsterisk="$required"
            tooltip="{{ $tooltip }}" />
    @endif
    <x-common.input type="{{ $type }}" attribute="{{ $attribute }}" placeholder="{{ $placeholder }}"
        required="{{ $required }}" value="{{ $value }}" min="{{ $min }}"
        maxlength="{{ $maxlength }}" readonly="{{ $readonly }}" disabled="{{ $disabled }}" />
    <x-form.error attribute="{{ $attribute }}" />
</div>
