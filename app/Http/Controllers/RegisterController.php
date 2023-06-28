<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->security_question = $request->input('security_question');
        $user->security_answer = $request->input('security_answer');
        $user->save();

        // You can also redirect the user to a success page or perform any other action here

        return redirect()->back()->with('success', 'Registration successful!');
    }
    
}
