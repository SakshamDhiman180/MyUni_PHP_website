@extends('common.layouts.auth',
[
'page' => __('Login')
])

@section('content')
<!-- -------- CREATE Login------- -->
<section class="padding-tb pt-0 pt-lg-5 pt-md-4 mt-3 ">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-12 d-flex  mx-auto">
                <div class="card bg-transparent border-0 w-100 ">
                    <div class="card-header text-center bg-transparent border-0">
                        <h2 class="mb-2" style="color: white">Login</h2>
                        <p class="mb-3" style="color: white">Enter your email and password to sign in
                        </p>
                    </div>
                    <div class="card-body form-body p-0">
                        <form method="POST" action="{{ route('common.signin') }}" class="needs-validation" novalidate>
                            @csrf
                            <x-form.radio-user-type class="users-type" hidden/>
                            <div class="form-group-wrapper">
                                <x-form.input type="email" labelname="Email" value="{{ old('email') }}" placeholder="Email" attribute="email" required="true" />

                                <div class="form-group">
                                    <label for="password" class="d-flex justify-content-between">Password <a href="{{ route('common.password.request') }}">Forgot Password?</a></label>
                                    <x-common.input type="password" attribute="password" placeholder="*********" required="true" />
                                </div>
                                <div class="text-center">
                                    <x-common.input type="hidden" attribute="device_token" value="{{ old('device_token') }}" />
                                    <x-form.submit-button class="btn btn-primary mt-1 mt-lg-2 px-5 w-100" text="{{ __('Sign in') }}" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-4 bg-transparent border-0">
                        <p class="mb-4 mx-auto">
                            Don't have an account?
                            <a href="{{ route('common.signup') }}">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCEvRQXTF57TIVfLFtZphCVmLcfnWf05pY",
        authDomain: "bless-a-teacher.firebaseapp.com",
        projectId: "bless-a-teacher",
        storageBucket: "bless-a-teacher.appspot.com",
        messagingSenderId: "1008850702301",
        appId: "1:1008850702301:web:eb74afc66d8079b57a3034",
        measurementId: "G-6B0NVX033G"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {
            //console.log(token);
            $('#input-device_token').val(token);
        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();
  
    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });
</script>
@endpush