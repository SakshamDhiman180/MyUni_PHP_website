<?php $n=1; ?>
@if($courses)
@foreach ($courses as $index => $course)
<div class="col-md-3 mb-4">
    <a href="{{route('common.courseinfo', $course->id)}}" style="text-decoration:none">
    <div class="item p-4">
        <img style="height: 197px; width: 300.7px;" src="{{ asset('assets/img/courses-0' . $n . '.jpg') }}" alt="Course #1">
        <div class="down-content" style="width: 300.7px;">
            <h4>{{ $course->name }}</h4>
            <p>{{ $course->description }}</p>
            <div class="text-button-pay">
                {{-- Add More Info link here --}}
            </div>
        </div>
    </div></a>
</div>
<?php $n++; ?>
@endforeach
@else
<center><h4><em style="color: #f5a425">Not found!</em></h4></center>
@endif