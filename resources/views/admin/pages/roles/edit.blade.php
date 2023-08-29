<?php

use App\Models\Permission;
use Illuminate\Support\Str;

$permissions_list = Permission::list();
?>
@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'role'])

@section('content')



<main class="main-content mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card card-body mt-4">
                    <p class="text-sm mb-0">Edit Role</p>
                    <hr class="horizontal dark my-3">
                    <form method="post" action="{{ route('roles.update', $role) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <x-form.input type="text" attribute="name" placeholder="{{ __('Name') }}" required="true" value="{{ $role->name }}" />
                        <div class="form-group">
                            <div class="form-group">
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Module</th>
                                            <th colspan="10">Permissions</th>
                                        </tr>
                                        <tr>
                                            @foreach($permissions_list as $action)
                                            <th>{{ Str::ucfirst($action) }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission['name'] }}</td>
                                            @foreach($permissions_list as $name)
                                            <td>
                                                @if(array_key_exists($name, $permission['permissions']))
                                                <span class="form-check">
                                                    <x-common.checkbox attribute="permission[]" class="form-check-input float-none" value="{{ $permission['permissions'][$name] }}" checked="{{ in_array($permission['permissions'][$name], $rolePermissions) }}" />
                                                </span>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <x-form.error attribute="permission" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('roles.index') }}" type="button" name="button" class="btn btn-light m-0">BACK TO LIST</a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection