<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicInfoController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'first_name' => ['required', 'max:255','string'],
            'last_name' => ['required', 'max:255'],
            'profession' => ['required', 'max:255'],
            'division' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'website' => ['required', 'URL'],
            'post_code' => ['required', 'integer'],
            'phone' => ['required', 'integer'],
            'email' => ['required','email','unique:basic_information']],
            [
                'first_name.required' =>"Field Must not be empty",
                'first_name.string' =>"Name Should be a String",
                'last_name.required' =>"Field Must not be empty",
                'profession.required' =>"Field Must not be empty",
                'division.required' =>"Field Must not be empty",
                'address.required' =>"Field Must not be empty",
                'email.required' =>"Field Must not be empty",
                'email.email' =>"Please Enter a valid Email",
                'website.required' =>"Field Must not be empty",
                'website.URL' =>"Enter a valid URL",
                'post_code.required' =>"Field Must not be empty",
                'post_code.integer' =>"Enter valid Post Code",
                'phone.required' =>"Field Must not be empty",
                'phone.integer' =>"Enter valid Phone Number",
            ]);

        BasicInfo::create([
            'user_id' => Auth::user()->id,
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'profession' => $req->profession,
            'division' => $req->division,
            'address' => $req->address,
            'email' => $req->email,
            'website' => $req->website,
            'post_code' => $req->post_code,
            'phone' => $req->phone,
        ]);

        return view('education.create');
    }
}
