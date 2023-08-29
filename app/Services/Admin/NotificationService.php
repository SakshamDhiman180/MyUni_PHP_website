<?php

namespace App\Services\Admin;

use App\Models\Course;
use App\Models\Notification;
use App\Models\Stream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NotificationService
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
    
        $notifications = []; // An array to store the created notification models
    
        foreach ($param['courses'] as $courseId) {
            $notification = new $model; // Create a new instance of the model
            $notification->course_id = $courseId;
            $notification->notification = $param['notification'];
            $notification->status = $param['status'];
            $notification->save();
            
            $notifications[] = $notification; // Add the created model to the array
        }
    
        return $notifications; // Return the array of created notification models
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
    try {
        $param = $data->validated();
        // dd($param); // Uncomment this line to debug

        $notification = Notification::findOrFail($id);
        $notification->course_id = $param['courses'][0];
        $notification->notification = $param['notification'];
        $notification->status = $param['status'];
        $notification->save();
      
        return $notification;
    } catch (\Exception $e) {
        // Log or handle the exception
        return response()->json(['error' => 'Update failed.'], 500);
    }
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
