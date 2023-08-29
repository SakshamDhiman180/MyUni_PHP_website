@extends('parent.layouts.app', [
    'page' => __('Gift History'),
    'active' => 'gift-history',
])

@section('content')
    <div class="container-fluid middle-content">
        <div class="row">
            <div class="col-lg-12 position-relative z-index-2">
                <h3 class="font-weight-bold mb-3" style="color: white">Courses</h3>
            </div>
             <div class="col-12">
                <div class="card p-4">
                    <form id="filterForm">
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label class="col-form-label pt-0" for="streamFilter">Stream</label>
                                <select class="form-control" name="streamFilter" id="streamFilter">
                                    <option value="">Select Stream</option>
                                    @foreach ($streams as $stream)
                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label pt-0" for="feeFilter">Fee</label>
                                <select class="form-control" name="feeFilter" id="feeFilter">
                                    <option value="">Select exam Fee</option>
                                    @foreach ($exam_fees as $data)
                                        <option value="{{ $data->fee }}">{{$data->fee }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label pt-0" for="admissionViaExam">Admission via exam (Y/N)</label>
                                <select class="form-control" name="admissionViaExam" id="admissionViaExam">
                                    <option value="">Select Option</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label pt-0" for="examFilter">Exams</label>
                                <select class="form-control" name="examFilter" id="examFilter">
                                    <option value="">Select Exam</option>
                                    @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label pt-0" for="collegeFilter">College</label>
                                <select class="form-control" name="collegeFilter" id="collegeFilter">
                                    <option value="">Select College</option>
                                    @foreach ($colleges as $college)
                                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-0">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Code</th>
                                    <th>Stream</th>
                                    <th>category_code</th>
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
    <script>
        // Initialize DataTable
        let table = $('#datatable-search').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            autoWidth: false, 
            ajax: {
                url: "{{ route('parent.course') }}",
                data: function(d) {
                    d.streamFilter = $('#streamFilter').val();
                    d.feeFilter = $('#feeFilter').val();
                    d.admissionViaExam = $('#admissionViaExam').val();
                    d.examFilter = $('#examFilter').val();
                    d.collegeFilter = $('#collegeFilter').val();
                }
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'code', name: 'code' },
                { data: 'stream.name', name: 'streams' },
                { data: 'category.name', name: 'category_code' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
        });

        $('#filterForm').on('submit', function (e) {
            e.preventDefault();
            table.ajax.reload();
        });
    </script>
@endpush
