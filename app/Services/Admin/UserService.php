<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($data, $model)
    {
        $user = $model->create(
            $data->merge([
                'password' => Hash::make($data->get('password')),
            ])->all()
        );
        $user->assignRole([$data->role_id]);

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data, $model)
    {
        $hasPassword = (bool) $data->get('password');
        $userStatus = ((bool) $data->get('status')) ?  config('constants.status.active') : config('constants.status.inactive');
        $model->update(
            $data->merge([
                'password' => (($hasPassword) ? Hash::make($data->get('password')) : $model->password),
                'status' => $userStatus
            ])->all()
        );
        $model->syncRoles([$data->role_id]);

        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($model)
    {
        return $model->delete();
    }
}
