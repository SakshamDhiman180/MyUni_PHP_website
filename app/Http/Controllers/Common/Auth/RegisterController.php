<?php

namespace App\Http\Controllers\Common\Auth;

use App\Http\Controllers\Common\BaseController;
use App\Http\Controllers\Controller;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Models\ParentUser;
use App\Models\Teacher;
use App\Notifications\verificationAndpasswordReset;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $courses = Course::get();
        //dd(CollegeCourse::get());
        return view('common.auth.register')->with(['courses' => $courses]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'user_type' => ['required', 'string', 'in:' . config('constants.userType.parent')],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'unique:parents', 'unique:teachers'],
            'cource_id' => ['required'],
            'college_id' => ['required'],
            'exam_id' => ['required'],
            // 'password' => ['required', 'string', 'min:8'],
        ];

        $domainError = [
            'email.not_regex' => 'The :attribute domain is not allowed.',
        ];

        return Validator::make($data, $rules, $domainError);
    }


    /**
     * Create a new student instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Student
     */
    protected function create(array $data)
    {
       // dd($data);
        if (($data['user_type'] ?? '') == config('constants.userType.parent')) {
            $user = ParentUser::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'course_id' =>  $data['cource_id'],
                'college_id' =>  $data['college_id'],
                'exam_id' =>  $data['exam_id'],
                // 'password' => Hash::make($data['password']),
            ]);
        }

        return $user;
    }

    public function register(Request $request)
    {
    //     dd($request);
        $this->validator($request->all())->validate();
        // $data = $request->all();
        // $password = rand_string(8);
        // $user = $this->create(
        //     $request->merge([
        //         'password' => $password,
        //     ])->all()
        // );
        // $user['password1'] = $password;
        $user = $this->create($request->all());
       // dd($user);
       // $teacher = Teacher::find($gitDonated->teacher_id); 
                 
        $user->notify(new verificationAndpasswordReset($user->first_name, $user->id));
       // event(new Registered( $user));
        // event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        $data = [
            'error' => false,
            'message' => '',
            'data' => []
        ];

        // Return the data as JSON
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect(route('home'))
            ->with(
                'success',
                __('You have been successfully registered. '
                    . 'Verify your email address and Set Your password by clicking on link you have received in you inbox.')
            );
    }

    protected function guard(Request $request)
    {
        if (($request->user_type ?? '') == config('constants.userType.parent')) {
            return parentAuth();
        }
        if (($request->user_type ?? '') == config('constants.userType.teacher')) {
            return teacherAuth();
        }
    }
}
