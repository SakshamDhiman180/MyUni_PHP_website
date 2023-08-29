<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notification\createRequest;
use App\Models\Course;
use App\Models\Notification;
use App\Services\Admin\NotificationService;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $notifications = Notification::with('course')->get();
        return view('admin.pages.notification.index')->with(['notification' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courseList = Course::get();
        return view('admin.pages.notification.create')->with(['courseList' => $courseList]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequest $request, NotificationService $notificationService, Notification $notification)
    {
        //
        $notificationService->create($request, $notification);
        return redirect()->route('notification.index')->with(
            'success',
            'notification created successfully.'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $courseList = Course::get();
        $formData = Notification::where('id', $id)->with('course')->first();
        //dd($formData);
        return view('admin.pages.notification.edit')->with(['courseList' => $courseList, 'formData' => $formData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(createRequest $request, string $id, NotificationService $notificationService)
    {
        //
        $notificationService->update($request ,$id);
        return redirect()->route('notification.index')->with(
            'success',
            'notification edited successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Notification::findOrFail($id);
        $data->delete();
    
        return redirect()->route('notification.index')->with(
            'success',
            'Stream deleted successfully'
        );
    }
}
