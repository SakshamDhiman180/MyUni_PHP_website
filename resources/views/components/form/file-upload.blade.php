<div class="form-group">
    @if ((bool) $labelText)
    <x-common.label label="{{ $labelText }}" :showAsterisk="$required" attribute="input-{{ $name }}" />
    @endif
    <input class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" type="file" name="{{ $name }}" id="input-{{ $name }}"
    {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} {{$multiple ? 'multiple' : ''}}
    accept="{{ $accept }}"
    />

    <input hidden name="{{$name}}" />
    @if($value)
         <a download={{ $name }} href="{{ (asset('storage/'. ($value ??''))) }}" class="btn blue btn-outline mt-2 uppercase" href="" target="_blank">
            Download
        </a>
        @if(pathinfo($value, PATHINFO_EXTENSION) !='zip')
        <a href="{{ (asset('storage/'. ($value ??''))) }}" class="btn blue btn-outline mt-2 uppercase"  target="_blank">
            view
        </a>
        @endif
        @endif
    <x-form.error attribute="{{ $name }}" />
</div>
