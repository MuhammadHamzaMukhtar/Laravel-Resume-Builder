<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data = array();
        $data = Education::all()->where('user_id',$id);
        return view('education.index',compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'degree' => ['required', 'max:255','string'],
            'institute' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'degree.required' =>"Field Must not be empty",
            'institute.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $edu = new Education;

        $edu->degree = $request->degree;
        $edu->institute = $request->institute;
        $edu->year = $request->year;
        $edu->user_id = Auth::user()->id;
        if($edu->save()){
            return redirect('education_summary');
        }else{
            echo 'error';
        }
       }

    public function edit($id)
    {
        // $id = $id);
        $data = Education::find($id);
        return view('education.update',compact('data'));
    }

    public function destroy($id)
    {
        // $id = base64_decode($id);
        $del = Education::find($id)->delete();
        if($del)
        {
            return redirect('education_summary')->with('delete','Deleted Successfully!');
            return back();
        }
    }

    public function create()
    {
        return view('education.create');
    }

    public function update(Request $request, $id)
    {
        // $id = base64_decode($id);
        $request->validate([
            'degree' => ['required', 'max:255','string'],
            'institute' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'degree.required' =>"Field Must not be empty",
            'institute.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $update = Education::findorFail($id)->update([
            'degree' => $request->degree,
            'institute' => $request->institute,
            'year' => $request->year,
        ]);
        if($update)
        {
            return redirect('education_summary')->with('update','Updated Successfully!');
        }
    }
}
