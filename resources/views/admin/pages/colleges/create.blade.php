@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'college'])
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    #imagePreview {
        background-size: cover;
        background-position: center;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

    #imagePreview:hover {
        transform: scale(1.1);
    }

    .fullscreen-image {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .fullscreen-image img {
        max-width: 90%;
        max-height: 90%;
    }
</style>

@section('content')
    <div class="content listing-page">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 p-4 p-lg-5 mx-auto">
                    <div class="card card-body p-4 p-lg-5 mt-4">
                        <h3 class="mb-0 text-uppercase"><b>Add College</b></h3>
                        <hr class="horizontal dark my-3">
                        <form method="POST" action="{{route('college.store')}}" novalidate enctype="multipart/form-data" class="p-4">
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            @csrf
                            <div class="form-group-wrapper">
                                <div class="d-flex p-2 p-6">
                                    <div class="uploadButton">
                                        <label class="col-form-label pt-0" for="Image">Banner Image</label><br>
                                        <input type='file' id="imageUpload" name="banner_image" />
                                    </div>
                                    <div class="avatar-upload">
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url('{{ asset('storage/') }}');"
                                                onclick="openFullscreenImage('{{ asset('storage/') }}')">
                                            </div>
                                            <br>
                                            <div>
                                                <center><small>Click the Image to preview in Full-Screen</small></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <x-form.input type="text" class="col-form-label pt-0" labelname="Name" name="name"
                                    placeholder="College name" attribute="name" value="" required="true" />

                                <x-form.textarea type="text" label="Description" placeholder="Description"
                                    attribute="description" required="true">
                                </x-form.textarea>
                                <div class="d-flex p-2 justify-content-between">
                                    <div class="col-md-6 p-2">
                                        <label class="col-form-label pt-0" for="streams">Streams</label>
                                        <select class="form-control" name="streams[]" id="streams" multiple="multiple">
                                            @foreach($streams as $stream)
                                                <option value="{{ $stream->name }}">{{ $stream->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <x-form.input class="col-form-label pt-0" type="text" labelname="College Code"
                                            placeholder="Code" attribute="code" id="" value="" required />
                                    </div>
                                </div>
                                <x-form.input type="text" class="col-form-label pt-0" labelname="Address" name="address"
                                    placeholder="address" attribute="address" value="" required="true" />
                                
                                <div class="d-flex p-2 justify-content-between">
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="text" class="col-form-label pt-0" labelname="City"
                                            name="city" placeholder="City" attribute="city" value=""
                                            required="true" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="text" class="col-form-label pt-0" labelname="State"
                                            name="state" placeholder="State" attribute="state" value=""
                                            required="true" />
                                    </div>
                                </div>
                                <div class="d-flex p-2 justify-content-between">
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="text" class="col-form-label pt-0" labelname="Zip"
                                            name="zip" placeholder="zip" attribute="zip" value=""
                                            required="true" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="text" class="col-form-label pt-0" labelname="Contact Number"
                                            name="contact_number" placeholder="Contact number" attribute="contact_number"
                                            value="" required="true" />
                                    </div>
                                </div>
                                <x-form.input type="text" class="col-form-label pt-0" labelname="Email"
                                    name="email" placeholder="email" attribute="email" value=""
                                    required="true" />

                                <x-form.input type="text" class="col-form-label pt-0" labelname="Principal Name"
                                    name="principal_name" placeholder="Principal name" attribute="principal_name"
                                    value="" required="true" />
                                <br>

                            </div>
                            <div class="d-flex p-2 justify-content-end mt-4">
                                <div class="d-flex p-2 justify-content-end mt-4">
                                    <a href="{{route('college.index')}}" type="button" name="button"
                                        class="btn btn-light m-0">BACK TO LIST</a>
                                    <button type="submit" name="button"
                                        class="btn bg-gradient-primary m-0 ms-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#streams').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });
    </script>
    <script>
        function openFullscreenImage(imageUrl) {
            const fullscreenImage = document.createElement('div');
            fullscreenImage.classList.add('fullscreen-image');
            fullscreenImage.innerHTML = `<img src="${imageUrl}" alt="Full Screen Image">`;
            document.body.appendChild(fullscreenImage);

            fullscreenImage.addEventListener('click', () => {
                fullscreenImage.remove();
            });
        }

        $(document).ready(function() {
            $('#imageUpload').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').attr('onclick', 'openFullscreenImage("' + e.target.result +
                        '")');
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#signImgUpload').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#signImgPreview').css('background-image', 'url(' + e.target.result + ')');
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#thumbnailUpload').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#thumbnailPreview').css('background-image', 'url(' + e.target.result + ')');
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush
