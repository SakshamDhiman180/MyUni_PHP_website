<label @php echo ((bool) $class) ? 'class="' . $class . '"' : ''; @endphp for="{{ $attribute }}">
    {{ $label }}

    @if ($tooltip != '')
        <small class="text-muted" style="font-size: 0.8rem;">{{ $tooltip }}</small>
    @endif

    @if ($showAsterisk == true || $showAsterisk == 'true')
        <span class="required">*</span>
    @endif

    @if ($required == true || $required == 'true')
        <span class="required">*</span>
    @endif

    @if ($model ?? '' != '')
        <a class="btn btn-link add-new-school" title="Add {{ $label }}" data-bs-toggle="modal"
            data-bs-target="#{{ $model }}"
            style="color: blue; font-size: 14px; cursor: pointer; float: right; text-decoration: none; position: absolute; right: 54px;">
            Add new school
        </a>
    @endif


</label>
