<?php

namespace App\Http\Controllers\Common\Auth;

use App\Http\Controllers\Common\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ParentUser;
use App\Models\Teacher;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PARENT_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        $id = (int) $request->route('id');
        $userType = $request->user_type ?? '';

        if ($userType == config('constants.userType.parent')) {
            $user = ParentUser::where('id', $id)->first();
        } else {
            $user = Teacher::where('id', $id)->first();
        }

        if (!(bool) $user) {
            throw new AuthorizationException();
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($user->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect(route('common.password.request'))
                ->with('info', __('Your email is already verified. set your password'));
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('common.password.request'))
            ->with('success', __('Your email has been verified. Now you can proceed to set your password and complete your application'));
    }
}
