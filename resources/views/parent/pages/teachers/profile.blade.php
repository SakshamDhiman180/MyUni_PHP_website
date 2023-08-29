@extends('parent.layouts.app', [
'page' => __('Teacher Profile'),
])

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/slick-lightbox.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
@endpush

@section('content')
<div class="container-fluid middle-content">
    <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
            <h3 class="font-weight-bold mb-0">Profile</h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 mb-4">
            <div class="card p-0 p-lg-2">
                <!-- Card header -->
                <div class="card-body p-3 user-info">
                    <div class="d-flex justify-content-start">
                        <img src="{{ asset('storage/' . ($teacher->profile_image ?? '')) }}" alt="kal" class="user-info-left">
                        <div class="user-info-right">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div>
                                    <h2 class="text-start mt-2 mt-lg-3 font-weight-bold">
                                        {{ $teacher->full_name ?? '' }}
                                    </h2>
                                    <p class="text-lg  mt-1 mb-3">
                                        {{ $teacher->experiences->school->name ?? '' }}
                                    </p>
                                </div>
                                @if ($teacherInviteStatus == 'pending')
                                <button class="btn btn-secondary me-2 {{ ($teacherInviteStatus ?? '') == 'accept' ? 'active' : (($teacherInviteStatus ?? 0) == 'pending' ? 'pending' : '') }}" style="width: 160px; height: 65px;" data-invite_action="{{ in_array($teacherInviteStatus ?? '', ['accept', 'pending']) ? 0 : 1 }}" onclick="toggleActionHandler(this, {{ $teacher->id ?? 0 }})">
                                    {{ ($teacherInviteStatus ?? '') == 'accept' ? 'Added' : (($teacherInviteStatus ?? 0) == 'pending' ? 'Pending' : 'Add') }}
                                </button>
                                @else
                                <button class="btn btn-secondary me-2 {{ ($teacherInviteStatus ?? '') == 'accept' ? 'active' : (($teacherInviteStatus ?? 0) == 'pending' ? 'pending' : '') }}" style="width: 160px; height: 65px;" data-invite_action="{{ in_array($teacherInviteStatus ?? '', ['accept', 'pending']) ? 0 : 1 }}" onclick="toggleActionHandler(this, {{ $teacher->id ?? 0 }})" {{ ($teacherInviteStatus ?? '') == 'accept' ? 'hidden' : '' }}>
                                    {{ ($teacherInviteStatus ?? '') == 'accept' ? 'Added' : (($teacherInviteStatus ?? 0) == 'pending' ? 'Pending' : 'Add') }}
                                </button>
                                @endif

                            </div>
                            <ul class="user-info-grade flex-wrap">
                                <li class="d-flex align-items-center">
                                    <img src="{{ asset('assets/parent/img/icons/grade-icon.png') }}" class="me-3" alt="">
                                    <div>
                                        <h5 class="font-weight-bold">Grade</h5>
                                        <p class="font-weight-normal text-lg">{{ $teacher->experiences->grade ?? '' }}
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{ asset('assets/parent/img/icons/birth-icon.png') }}" class="me-3" alt="">
                                    <div>
                                        <h5 class="font-weight-bold">Birthday</h5>
                                        <p class="font-weight-normal text-lg">
                                            {{ date('M d', strtotime($teacher->dob ?? '')) }}
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{ asset('assets/parent/img/icons/contact-teacher-icon.png') }}" class="me-3" alt="">
                                    <div>
                                        <h5 class="font-weight-bold">Years Teaching</h5>
                                        <p class="font-weight-normal text-lg">
                                            {{ $teacher->experiences->teaching_experience ?? 0 }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="user-button-group">
                                <ul class="d-flex justify-content-between flex-wrap">
                                    <li>
                                        <button class="btn  me-3 {{ $teacherInviteStatus == 'accept' ? 'btn-primary' : 'btn-secondary' }}" data-bs-toggle="modal" data-bs-target="#sendGiftClassModal" {{ $teacherInviteStatus == 'accept' ? '' : 'disabled' }}>
                                            Donate to Classroom
                                        </button>
                                        <p class="mt-2">Click to see the classroom's needs</p>
                                    </li>
                                    <li>
                                        <button class="btn btn-secondary me-3" data-bs-toggle="modal" data-bs-target="#sendGiftModal1" {{ $teacherInviteStatus == 'accept' ? '' : 'disabled' }}>
                                            Give {{$teacher->first_name}} Gift
                                        </button>
                                        <p class="mt-2">Give them a gift to say 'Thank You'</p>
                                    </li>
                                    <li>
                                        <a href="{{ route('parent.messages', ['teacher_id' => $teacher->id]) }}" class="btn btn-outline{{ $teacherInviteStatus != 'accept' ? ' disabled' : '' }}">
                                            Contact Teacher
                                        </a>
                                    </li>                                                                       
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card teacher-features">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush " data-toggle="checklist">
                        <li class="list-group-item border-0 flex-column align-items-start checklist-primary">
                            <div class="checklist-item checklist-item-primary">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="w-100 font-weight-bold">What I love about teaching</h5>
                                    <p class="font-weight-normal" class="font-weight-normal">
                                        {{ $teacher->experiences->love_about_teaching ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item border-0 flex-column align-items-start  checklist-skin">
                            <div class="checklist-item">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="w-100 font-weight-bold">Best teacher moment</h5>
                                    <p class="font-weight-normal">
                                        {{ $teacher->experiences->love_about_teaching ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 flex-column align-items-start  checklist-green">
                            <div class="checklist-item">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="w-100 font-weight-bold">Teaching philosophy</h5>
                                    <p class="font-weight-normal">{{ $teacher->experiences->teaching_philosphy ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 flex-column align-items-start  checklist-purple">
                            <div class="checklist-item">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="w-100 font-weight-bold">What I would like to instill in my
                                        students</h5>
                                    <p class="font-weight-normal">
                                        {{ $teacher->experiences->like_to_instill_my_student ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 flex-column align-items-start  checklist-khaki">
                            <div class="checklist-item">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="w-100 font-weight-bold">My Story</h5>
                                    <p class="font-weight-normal">{{ $teacher->experiences->stories ?? '' }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 flex-column align-items-start  checklist-sea-green">
                            <div class="checklist-item">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="w-100 font-weight-bold">Hobbies</h5>
                                    <p class="font-weight-normal">{{ $teacher->experiences->hobbies ?? '' }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card portfolio-gallery">
                <div class="portfolio-slides">
                    @if (!empty($teacher->photos))
                    @foreach ($teacher->photos as $photos)
                    <div class="single">
                        <a href="{{ asset('storage/' . ($photos->url ?? '')) }}">
                            <img src="{{ asset('storage/' . ($photos->url ?? '')) }}" />
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content_model')
<!----------SEND GIFT TEACHER MODAL------>
<div class="modal fade" id="sendGiftModal1" tabindex="-1" role="dialog" aria-labelledby="sendGiftModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bolder" id="sendGiftModalLabel">Send Gift to {{ $teacher->first_name ?? '' }} {{ $teacher->last_name ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="{{ route('parent.donateToTeacher', $teacher)}}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group mb-3 mb-lg-4">
                        <div class="d-flex align-items-center">
                            <img src="{{ (($teacher->profile_image ?? "") != "") ? asset('storage/' . ($teacher->profile_image ?? '')) : asset('assets/parent/img/default-user.png') }}" class="avatar avatar-xl" alt="">
                            <h5 class="ms-3 font-weight-bolder">{{ $teacher->first_name ?? '' }}</h5>
                        </div>
                    </div>
                    <div class="form-group mb-2 mb-lg-4">
                        <label for="card-name" class="col-form-label">Gift Cards I love</label>
                        <select required class="form-control choices-single" name="giftcard_merchant_id" id="choices-card2" data-placeholder="Select the card" placeholder="Select the card">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="donate-text" class="col-form-label pt-0">Gift Card Value</label>
                        <select required class="form-control" name="giftcard_id" id="giftcard_options2" data-placeholder="Select" placeholder="Select">
                            @foreach ($giftcardOptions as $option)
                            <option value="{{ $option->card_id }}">{{ $option->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Appreciation Note</label>
                        <textarea required class="form-control" name="appreciation_note" id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-form.submit-button class="btn btn-secondary" text="{{ __('Checkout')  }}" />
                </div>
            </form>
        </div>
    </div>
</div>
<!----------SEND GIFT CLASSROOM MODAL------>
<div class="modal fade" id="sendGiftClassModal" tabindex="-1" role="dialog" aria-labelledby="sendGiftClassModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bolder" id="sendGiftClassModalLabel">Send Donation to Classroom
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="{{ route('parent.donateToClass', $teacher)}}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ (($teacher->profile_image ?? "") != "") ? asset('storage/' . ($teacher->profile_image ?? '')) : asset('assets/parent/img/default-user.png') }}" class="avatar avatar-xl" alt="">
                            <h5 class="ms-3 font-weight-bolder">
                                <span class="text-sm font-weight-normal">Class Teacher</span><Br />
                                {{$teacher->first_name }}
                            </h5>
                        </div>
                    </div>
                    <div class="form-group mb-2 mb-lg-4">
                        <label for="card-name" class="col-form-label">Here's my list</label>
                        <div class="card p-0 mb-2 shadow-none card-note card-orange">
                            <div class="card-header p-3 d-flex justify-content-between align-items-center">
                                <p>
                                    {!! nl2br(e($supply??'')) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="donate-text" class="col-form-label pt-0">Donate</label>
                        <input required class="form-control" type="text" name="amount" placeholder="$0" id="donate-text" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Appreciation Note</label>
                        <textarea required class="form-control"  name="appreciation_note"  id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-form.submit-button class="btn btn-secondary" text="{{ __('Checkout')  }}" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script-js')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
<script src="{{ asset('assets/js/plugins/orbit-controls.js') }}"></script>
<script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script src="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js"></script>
@endpush

@push('js')
<script>
    $('.portfolio-slides').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.portfolio-slides').slickLightbox({
        itemSelector: 'a',
        navigateByKeyboard: true
    });
</script>

<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    // TOGGLE BUTTON
    function toggleActionHandler(element, teacherId) {
        var action = $(element).data('invite_action');
        $(element).prop('disabled', true);
        $(element).append('<i class="fas fa-spinner fa-spin"></i>');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = "{{ route('parent.addRemoveTeacher') }}";
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
                var status = (response.invite_status != undefined) ? response.invite_status : '';
                if (status == 'pending') {
                    $(element).addClass('pending').data('invite_action', 0).html('Pending');
                } else {
                    $(element).removeClass('pending active').data('invite_action', 1).html('Add');
                }
            },
            error: function(xhr) {
                $(element).prop('disabled', false);
                //console.log(xhr);
            }
        });
    }
</script>

<script>
    // DATA TABLES
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
    });
</script>
<script>
    // cards
    const giftCard2 = @json($giftcards);
    const giftCardId2 = document.querySelector('#choices-card2');
    const choices22 = new Choices(giftCardId2, {
        choices: giftCard2,
        shouldSort: false,
        shouldSortItems: false,
        allowHTML: true
    });

    $("#choices-card2").change(function() {
        var merchantId = this.value;
        var url = "{{ route('common.gift_card_options') }}";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            data: {
                method: '_GET',
                merchantId: merchantId
            },
            success: function(response) {
                if (response.error == false) {
                    var options = '';
                    $.each(response.data.giftcardOptions, function(key, value) {
                        //console.log(key, value);
                        options += '<option value="' + value.card_id + '"> ' + value.price + ' </option>';
                    });
                    $('#giftcard_options2').html(options);
                }
            }
        });
    });
</script>
@endpush