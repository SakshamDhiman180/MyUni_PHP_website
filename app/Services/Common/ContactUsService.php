<?php

namespace App\Services\Common;

use App\Mail\Common\ContactUsMail;
use Exception;
use Illuminate\Support\Facades\Mail;

class ContactUsService extends BaseService
{
    /**
     * Send mail
     *
     * @return json object
     */
    public function sendMail($mailData)
    {
        try {
            Mail::to(
                env('CONTACT_US_MAIL', 'support@yopmail.com')
            )->send(
                new ContactUsMail($mailData)
            );
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
