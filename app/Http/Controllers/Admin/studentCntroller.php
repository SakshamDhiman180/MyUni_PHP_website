<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentCntroller extends Controller
{
    //
    public function index(){
        $userData = ParentUser::with('course', 'college', 'exam')->get();
        //dd($userData);
        return view('admin.pages.students.index')->with(['userData' => $userData]);
    }
}
