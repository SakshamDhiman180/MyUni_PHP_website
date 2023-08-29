@php $uid = uniqid($name); @endphp
<div class="form-group">
    @if ((bool) $labelText)
        <x-common.label label="{{ $labelText }}" class="btn-image btn btn-lg btn-outline-secondary w-100" attribute="{{ $name }}" class="d-block" :showAsterisk="$required" />
    @endif
    <input type="hidden" id="remove-{{ $name }}" name="remove_{{ $name }}" value="0">
    <input class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }} {{((bool) $imageUrl) ? ' d-none' : '' }}" type="file" name="{{ $name }}"
        id="input-{{ $name }}" accept="image/png,image/jpg,image/jpeg" {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }} />
    @if ((bool) $imageUrl)
        <img class="{{ $imageCssClass }}" id="img-{{ $entityName . '-' . $entityId . '-' . $name }}" src="{{ $imageUrl }}" height="100" />
        <button type="button"
            onclick="removeImage{{ $uid }}('{{ $entityName }}', '{{ $entityId }}', '{{ $name }}');"
            class="btn btn-danger btn-xs" id="btn-{{ $entityName . '-' . $entityId . '-' . $name }}">X</button>
    @endif
    <x-form.error attribute="{{ $name }}" />
</div>
@if ((bool) $imageUrl)
    @push('js')
        <script>
            function removeImage{{ $uid }}(entityName, id, name) {
                $('#img-' + entityName + '-' + id + '-' + name).hide();
                $('#btn-' + entityName + '-' + id + '-' + name).hide();
                $('#input-' + name).removeClass('d-none');
                $('#remove-' + name).val("1");
            }
        </script>
    @endpush
@endif
