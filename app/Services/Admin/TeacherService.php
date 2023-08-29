<?php

namespace App\Services\Admin;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherService
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
        $teacher = $model->create(
            $data->merge([
                'password' => Hash::make($password),
            ])->all()
        );
        $teacher['password1'] = $password;
        event(new Registered($teacher));
        return $teacher;
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
        $teacherStatus = ((bool) $data->get('status')) ?  config('constants.status.active') : config('constants.status.inactive');
        $model->update(
            $data->merge([
                'status' => $teacherStatus
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
