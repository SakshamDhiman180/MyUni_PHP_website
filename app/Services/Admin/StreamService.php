<?php

namespace App\Services\Admin;

use App\Models\Stream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StreamService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($data, $model)
    {
        $param = $data->validated();
        $user = $model->create($param);
        //dd($user);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data, $id)
    {
        $param = $data->validated();
        $user = Stream::where('id', $id)->update($param);

        return $user;
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
