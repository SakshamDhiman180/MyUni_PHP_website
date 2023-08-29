@if ($colleges)
    @foreach ($colleges as $index => $college)
        <div class="col-md-3 mb-4">
            <a href="{{ route('common.collegeinfo', $college->id) }}" style="text-decoration: none">
                <div class="item p-4">
                    <img style="height: 197px; width: 300.7px;"
                        src="{{ asset('storage/' . $college->banner_image ?? 'sdasd') }}" alt="Course #1">
                    <div class="down-content" style="width: 300.7px;">
                        <h4>{{ $college->name }}</h4>
                        <p>{{ $college->description }}</p>
                        <div class="text-button-pay">
                            {{-- Add More Info link here --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    <center>
        <h4><em style="color: #f5a425">Not found!</em></h4>
    </center>
@endif
