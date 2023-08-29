<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\ContactUsRequest;
use App\Services\Common\ContactUsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('common.contact');
    }
    
    /**
     * sendMail
     *
     * @return void
     */
    public function sendMail(ContactUsRequest $request, ContactUsService $service)
    {
        try {
            $sendMail = $service->sendMail($request->validated());

            if ($sendMail) {
                return redirect()->route('contact')
                ->with('success', __('Mail sent successfully'));
            }
            return redirect()->route('contact')
                ->with('error', __('Something went wrong!'));
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->route('contact')
                ->with('error', __('Something went wrong! Error: ' . $e->getMessage()));
        }
    }
}
