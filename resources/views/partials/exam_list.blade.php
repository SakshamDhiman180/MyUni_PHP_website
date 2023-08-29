<?php $n = rand(1, 8); ?>
@if(count($exams) === 0)
<center><h4><em style="color: #f5a425">No data found!</em></h4></center>
@else
@foreach ($exams as $index => $data)
<div class="col-md-3 mb-4">
    <div class="item p-4" >
        <img style="height: 197px; width: 300.7px;" src="{{ asset('assets/img/exam_banner-0' . $n . '.jpg') }}" alt="Course #1">
        <div class="down-content" style="width: 300.7px;">
            <h4>{{ $data->name }}</h4>
            <p>{{ $data->description }}</p>
            <p>Exam fee:- ${{ $data->fee }}</p>
        </div>
    </div>
</div>
<?php $n = ($n % 8) + 1; ?>
@endforeach
@endif





