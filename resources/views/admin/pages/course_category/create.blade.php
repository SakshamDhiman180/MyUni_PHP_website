@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'cource_cate'])

@section('content')
<main class="main-content mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Add New Category</h6>
                    <hr class="horizontal dark my-3">

                    <form method="post" action="{{ route('cource_category.store') }}" autocomplete="off" >
                        @csrf
                        @method('post')
                        <div class="col-md-12">
                            <x-form.input class="col-form-label pt-0" type="text" labelname="name"
                                placeholder="course name" attribute="name" id="" value=""
                                required/>
                        </div>
                        <div class="col-md-12">
                            <x-form.input class="col-form-label pt-0" type="text" labelname="Course Code"
                                placeholder="Code" attribute="code" id="" value=""
                                required/>
                        </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{route('cource_category.index')}}" type="button" name="button"
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
</main>
@endsection