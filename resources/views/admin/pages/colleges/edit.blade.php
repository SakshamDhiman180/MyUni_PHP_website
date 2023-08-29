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
                        <h3 class="mb-0 text-uppercase"><b>Edit {{ $college->name }}</b></h3>
                        <hr class="horizontal dark my-3">
                        <form method="post" action="{{ route('college.update', $college->id) }}" novalidate
                            enctype="multipart/form-data" class="p-4">
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            @csrf
                            @method('put')
                            <div class="form-group-wrapper">
                                <div class="d-flex p-2 p-6">
                                    <div class="uploadButton">
                                        <label class="col-form-label pt-0" for="Image">Banner Image</label><br>
                                        <input type='file' id="imageUpload" name="banner_image" />
                                    </div>
                                    <div class="avatar-upload">
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image: url('{{ asset('storage/' . $college->banner_image ?? 'sdasd') }}');"
                                                onclick="openFullscreenImage('{{ asset('storage/' . $college->banner_image ?? 'efewfewf') }}')">
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
                                    placeholder="College name" attribute="name" value="{{ $college->name }}"
                                    required="true" />

                                <x-form.textarea type="text" label="Description" placeholder="Description"
                                    attribute="description" required="true">{{ $college->description }}
                                </x-form.textarea>
                                @php
                                    $streamsArray = json_decode($college->streams, true);
                                @endphp
                                <div class="d-flex p-2 justify-content-between">
                                    <div class="col-md-6 p-2">
                                        <label class="col-form-label pt-0" for="streams">Streams</label>
                                        <select class="form-control" name="streams[]" id="streams" multiple="multiple">
                                            @foreach($streams as $stream)
                                                <option value="{{ $stream->name }}"
                                                    {{ in_array($stream->name, $streamsArray) ? 'selected' : '' }}>
                                                    {{ $stream->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <x-form.input class="col-form-label pt-0" type="textS" labelname="College Code"
                                            placeholder="Code" attribute="code" id="" value="{{ $college->code }}"
                                            required disabled='ture' />
                                    </div>
                                </div>
                                <x-form.input type="text" class="col-form-label pt-0" labelname="Address" name="address"
                                    placeholder="address" attribute="address" value="{{ $college->address }}"
                                    required="true" />

                                <div class="d-flex p-2 justify-content-between">
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="text" class="col-form-label pt-0" labelname="City"
                                            name="city" placeholder="City" attribute="city" value="{{ $college->city }}"
                                            required="true" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="text" class="col-form-label pt-0" labelname="State"
                                            name="state" placeholder="State" attribute="state"
                                            value="{{ $college->state }}" required="true" />
                                    </div>
                                </div>
                                <div class="d-flex p-2 justify-content-between">
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="test" class="col-form-label pt-0" labelname="Zip"
                                            name="zip" placeholder="zip" attribute="zip" value="{{ $college->zip }}"
                                            required="true" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <x-form.input type="number" class="col-form-label pt-0" labelname="Contact Number"
                                            name="contact_number" placeholder="Contact number" attribute="contact_number"
                                            value="{{ $college->contact_number }}" required="true" />
                                    </div>
                                </div>
                                <x-form.input type="email" class="col-form-label pt-0" labelname="Email"
                                    name="email" placeholder="email" attribute="email" value="{{ $college->email }}"
                                    required="true" />

                                <x-form.input type="text" class="col-form-label pt-0" labelname="Principal Name"
                                    name="principal_name" placeholder="Principal name" attribute="principal_name"
                                    value="{{ $college->principal_name }}" required="true" />
                                <br>

                            </div>
                            <div class="d-flex p-2 justify-content-end mt-4">
                                <div class="d-flex p-2 justify-content-end mt-4">
                                    <a href="{{ route('college.index') }}" type="button" name="button"
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
