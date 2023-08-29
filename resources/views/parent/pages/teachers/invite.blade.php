@extends('parent.layouts.app',
[
'page' => __('Invite Teacher'),
'active' => 'invite-teacher'
])


@section('content')
<div class="container-fluid middle-content">
    <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
            <h3 class="font-weight-bold mb-3 text-center">Invite a Teacher</h3>
        </div>
        <div class="col-lg-6 col-d-6 mx-auto">
            <div class="card p-4">
                <form action="{{ route('parent.inviteTeacher.store') }}" method="POST" >
                    @csrf
                    @method('POST')
                    <x-form.input type="text" class="col-form-label pt-0" labelname="First name" placeholder="Enter first name" attribute="first_name" required="true" />
                    
                    <x-form.input type="text" class="col-form-label pt-0" labelname="Last name" placeholder="Enter last name" attribute="last_name" required="true" />

                    <x-form.input type="email" class="col-form-label pt-0" labelname="Email" placeholder="Enter email" attribute="email" required="true" />

                    <x-form.input type="number" class="col-form-label pt-0" labelname="Phone" placeholder="Enter phone" attribute="phone" />

                    <div class="modal-footer p-0 border-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary">Send
                            Invite</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
