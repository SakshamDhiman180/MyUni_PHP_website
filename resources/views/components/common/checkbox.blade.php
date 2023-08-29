<input class="{{ $class }}" type="checkbox" value="{{ $value }}" 
  id="input-{{ $attribute }}" name="{{ $attribute }}" {{ (($checked=='true') || ($checked==true))  ? " checked" : "" }}
  {{ ($required) ? " required" : "" }}
  {{ ($readonly=='true') ? " disabled" : "" }} />
