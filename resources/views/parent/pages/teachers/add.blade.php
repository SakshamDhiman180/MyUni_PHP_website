@extends('parent.layouts.app', [
    'page' => __('Add Teacher'),
    'active' => 'add-teacher',
])

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid middle-content container-table">
        <div class="row">
            <div class="col-lg-12 position-relative z-index-2 d-flex justify-content-between m-1">
                <h3 class="font-weight-bold mb-3 text-center">Add a Teacher</h3>
                <a class="btn btn-secondary" href="{{ route('parent.inviteTeacher') }}">Invite teacher</a>
            </div>
            <div class="col-12">
                <div class="card p-0">
                    <!-- Card header -->
                    <div class="table-responsive table-nodatatable">
                        <table class="table table-flush" id="datatable-search">
                            <tbody>
                                @if (!empty($activeTeachers))
                                    @foreach ($activeTeachers ?? [] as $teacher)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ ($teacher->profile_image ?? '') != '' ? asset('storage/' . $teacher->profile_image) : asset('assets/teacher/img/default-user.png') }}"
                                                        class="avatar me-3" alt="">
                                                    <h6 class="font-weight-bold"> {{ $teacher->first_name ?? '' }}
                                                        {{ $teacher->last_name ?? '' }}<br />
                                                        <span
                                                            class="font-weight-normal">{{ $teacher->experiences->school->name ?? '' }}</span>
                                                    </h6>
                                                </div>
                                            </td>
                                            <td>
                                                @if (!empty($teacher->experiences->grade))
                                                    @php
                                                        $grades = explode(',', $teacher->experiences->grade);
                                                    @endphp
                                                    @foreach ($grades as $grade)
                                                        <span class="badge badge-yellow">{{ $grade }}</span>
                                                    @endforeach
                                                @else
                                                    Nil
                                                @endif
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-secondary btn-sm me-2 {{ ($teacher->invite_status ?? '') == 'accept' ? 'active' : (($teacher->invite_status ?? 0) == 'pending' ? 'pending' : '') }}"
                                                    data-invite_action="{{ in_array($teacher->invite_status ?? '', ['accept', 'pending']) ? 0 : 1 }}"
                                                    onclick="toggleActionHandler(this, {{ $teacher->id ?? 0 }})">{{ ($teacher->invite_status ?? '') == 'accept' ? 'Added' : (($teacher->invite_status ?? 0) == 'pending' ? 'Pending' : 'Add') }}</button>
                                                <a href="{{ route('parent.viewTeacherProfile', $teacher) }}"
                                                    class="btn btn-outline btn-sm">View Profile</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
    <script>
        function toggleActionHandler(element, teacherId) {
            var action = $(element).data('invite_action');
            $(element).prop('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "{{ route('parent.addRemoveTeacher') }}";
            if (action === 0) {
                Swal.fire({
                    title: 'Remove Teacher',
                    text: 'Are you sure you want to remove this teacher?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(element).append('<i class="fas fa-spinner fa-spin"></i>');
                        $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                method: '_POST',
                                teacher_id: teacherId,
                                action: action
                            },
                            success: function(response) {
                                $(element).prop('disabled', false);
                                var status = (response.invite_status != undefined) ? response
                                    .invite_status :
                                    '';

                                if (result.isConfirmed) {
                                    $(element).removeClass('pending active').data('invite_action', 1)
                                        .html(
                                            'Add');

                                    Swal.fire('Removed!', 'Teacher removed successfully.', 'success');
                                }
                                $(element).find('.fa-spinner').remove();
                            },
                            error: function(xhr) {
                                $(element).prop('disabled', false);
                                //console.log(xhr);
                                $(element).find('.fa-spinner').remove();
                            }
                        });
                    } else {
                        $(element).prop('disabled', false);
                    }
                });
            } else {
                $(element).append('<i class="fas fa-spinner fa-spin"></i>');
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        method: '_POST',
                        teacher_id: teacherId,
                        action: action
                    },
                    success: function(response) {
                        $(element).prop('disabled', false);
                        var status = (response.invite_status != undefined) ? response.invite_status :
                            '';
                        conn.send(JSON.stringify({
                            command: "message",
                            from: "parent_" + userId,
                            to: 'teacher_' + teacherId,
                            count: "1",
                            type: "notify"
                        }));
                        $(element).addClass('pending').data('invite_action', 0).html('Pending');

                        Swal.fire('Invitation sent!',
                            'Your invitation request has been sent to the teacher.', 'success');

                    },
                    error: function(xhr) {
                        $(element).prop('disabled', false);
                        //console.log(xhr);
                    }
                });
            }
        }
    </script>


    <script>
        // DATA TABLES
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: true,
            fixedHeight: true,
        });
    </script>
@endpush
