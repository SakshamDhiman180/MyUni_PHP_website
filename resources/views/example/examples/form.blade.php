@extends('example.layouts.app',[])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Example Datatables') }}</div>
                    <form method="post" action="{{ $form_route }}" autocomplete="off" id="example_frm" enctype="multipart/form-data">
                        @csrf
                        @method($form_method)
                        <div class="card-body ">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <x-form.input type="text" attribute="title" placeholder="{{ __('Title') }}" value="{{old('title', $example->title??'')}}" required="true" />
                                </div>
                                <div class="col-md-6">
                                    <x-form.input type="number" attribute="mobile" placeholder="{{ __('Mobile') }}" value="{{old('mobile', $example->mobile??'')}}" required="true" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <x-form.textarea attribute="description" label="{{ __('Description') }}" required="true" rows="5">{{old('description', $example->description??'')}}</x-form.textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <x-form.select attribute="type" label="{{ __('Select Type') }}" required="true">
                                        <option value="">Please select</option>
                                        <option {{ old('type', $example->type??'') == 1 ? 'selected' : '' }} value="1">Option 1</option>
                                        <option {{ old('type', $example->type??'') == 2 ? 'selected' : '' }} value="2">Option 2</option>
                                    </x-form.select>
                                </div>
                                <div class="col-md-6">
                                    <x-form.file-upload name="image"
                                        labelText="{{ __('Upload Exam Result') }}" require="true"
                                        accept=".png, .jpeg, .jpg" />
                                    @if(isset($example) && ($example->image != null))
                                            <a download="file" href="{{asset('storage/'. $example->image) }}" class="btn btn-xs blue btn-outline uppercase"  target="_blank">Download File</a>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-common.label class="form-check-label" attribute="input-status" label="Status" />
                                        <div class="form-check form-switch">
                                            <x-common.checkbox class="form-check-input" attribute="status" placeholder="{{ __('Status') }}" value="1" checked="{{isset($example->status) && $example->status == '1' ? 'true' : 'false'}}" />
                                            <x-common.label class="form-check-label" attribute="input-status" label="Status" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <x-form.submit-button text="{{ __($form_button_title) }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    const frm_id = "example_frm";
    const frm_rules = {
        name: {
            required: true,
        },
        code: {
            required: true,
        },
        example_category_id: {
            required: true,
        }
    };
    $("#"+frm_id).validate({
        rules: frm_rules,
        errorClass: 'is-invalid text-danger',
    });
</script>
@endpush