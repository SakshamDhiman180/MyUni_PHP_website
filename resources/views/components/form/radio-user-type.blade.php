<ul class="{{ $class }}">
    <li>
        <input type="radio" name="user_type" id="parent" value="Parent" {{ session('previous_route') == 'home' ? 'checked' : ''; }} checked="true" hidden>
        <label class="free-label four col" for="parent" hidden>I am a Parent</label>
    </li>
    {{-- <li>
        <input type="radio" name="user_type" id="teacher" value="Teacher" {{ session('previous_route') != 'home' ? 'checked' : ''; }}>
        <label class="basic-label four col" for="teacher">I am a Teacher</label>
    </li>     --}}
</ul>
