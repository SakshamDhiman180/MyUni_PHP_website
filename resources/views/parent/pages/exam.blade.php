@extends('parent.layouts.app', [
    'page' => __('Gift History'),
    'active' => 'gift-history',
])
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@section('content')
    <div class="container-fluid middle-content">
        <div class="row">
            <div class="col-lg-12 position-relative z-index-2">
                <h3 class="font-weight-bold mb-3" style="color: white">Entrance Exams</h3>
            </div>
            <div class="col-12">
                <div class="card p-4">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="col-form-label pt-0" for="streams">Streams</label>
                            <select class="form-control" name="streams" id="streams">
                                <option value="">Select streams</option>
                                @foreach ($streams as $stream)
                                    <option value="{{ $stream->name }}">{{ $stream->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label pt-0" for="course">Courses</label>
                            <select class="form-control" name="course" id="course">
                                <option value="">Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label pt-0" for="exam">Exams</label>
                            <select class="form-control" name="exam" id="exam">
                                <option value="">Select Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label pt-0" for="year">Year</label>
                            <input type="number" name="year" id="year" class="form-control"
                                placeholder="Filter by Year">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" id="search_button">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-0">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>Exam year</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Code</th>
                                    <th>course</th>
                                    <th>college</th>
                                    <th>exam_date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        const ajax_url = "{{ route('parent.exam') }}";
        $(document).ready(function() {
            let table = $('#datatable-search').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url: ajax_url,
                    data: function(d) {
                       // d.streams = $('#streams').val();
                        d.course = $('#course').val();
                        d.exam = $('#exam').val();
                        d.year = $('#year').val();
                    }
                },
                columns: [{
                        data: 'admission_year',
                        name: 'admission_year'
                    },{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'course.name',
                        name: 'course.name'
                    },
                    {
                        data: 'college.name',
                        name: 'college.name'
                    },
                    {
                        data: 'exam_date',
                        name: 'exam_date'
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                language: {
                    paginate: {
                        "first": '<i class="fa fa-angles-left"></i>',
                        "last": '<i class="fa fa-angles-right"></i>',
                        "previous": '<i class="fa fa-chevron-left"></i>',
                        "next": '<i class="fa fa-chevron-right"></i>'
                    }
                },
                autoWidth: false
            });

            $('#search_button').click(function() {
                table.draw();
            });
        });
    </script>
@endpush
