<div class="form-group">
    @if ($show_label)
        <label for="input-{{ $attribute }}">{{ $label }}</label>
        @if($required == true || $required == 'true')
        <span class="required">*</span>
        @endif
    @endif
    <textarea class="form-control{{ $errors->has($attribute) ? ' is-invalid' : '' }}" name="{{ $attribute }}"
        id="input-{{ $attribute }}" rows="{{ $rows }}" cols="{{ $cols }}" {{ $required ? 'required' : '' }}
        {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}>
      {{ $slot }}
    </textarea>
</div>
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.getElementById("input-{{ $attribute }}"), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'link', 'blockQuote', 'insertTable', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'undo', 'redo',
                ],
            },
        });
    </script>
@endpush
