<?php

namespace App\Services\Admin;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParentService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($data, $model)
    {
        $password = rand_string(8);
        $parent = $model->create(
            $data->merge([
                'password' => Hash::make($password),
            ])->all()
        );
        $parent['password1'] = $password;
        event(new Registered($parent));
        return $parent;
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
        $parentStatus = ((bool) $data->get('status')) ?  config('constants.status.active') : config('constants.status.inactive');
        $model->update(
            $data->merge([
                'status' => $parentStatus
            ])->all()
        );
        $model->assignRole([$data->role_id]);

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
