<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\ParentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VerifyAndPasswordResetController extends Controller
{
    //
    public function resetForm($id)
    {
        $user = ParentUser::find($id);
        
        if (!$user) {
            return redirect()->route('common.signup')
                ->with('error', __('User not found, Please Register First!'));
        }

        if (!$user->email_verified_at) {
            $token =  rand_string(70); 
            $user->remember_token = $token;
            $user->email_verified_at = now();
            $user->status = 1;
            $user->save();
           
            return view('common.auth.passwordReset')->with(['userEmail' => $user->email, 'token' => $token]);
        }

        return redirect()->route('common.signin')
            ->with('warning', __('Your email is already verified, please login'));
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'token' => 'required', 
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = ParentUser::where('remember_token', $request->token)->first();
        if (!$user) {
            return redirect()->route('common.signin')
                ->with('error', __('User not found'));
        }

        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $request->token,
            'created_at' => now(),
        ]);

        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();

        // DB::table('password_resets')->insert([
        //     'email' => $user->email,
        //     'token' => $request->token,
        //     'created_at' => now(),
        // ]);

        return redirect()->route('common.signin')
            ->with('success', __('Password updated successfully. Please login.'));
    }
}
