<div class="form-check">
  <x-common.checkbox attribute="{{ $attribute }}" class="form-check-input checkbox" value="{{ $value }}" 
    checked="{{ $checked }}" required="{{ $required }}" readonly="{{ $readonly }}"/>
  @if((bool) $show_label)
  <x-common.label class="custom-control-label" label="{{ $label }}" attribute="{{ $attribute }}" />
  @endif
</div>
