<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\CareerObject;
use App\Models\Education;
use App\Models\Work;
use App\Models\Certificate;
use App\Models\PDF;

class PdfController extends Controller
{
    public function index(){
        $usrId = Auth::user()->id;
        $data= array();

        $data['basicInfo'] = basicInfo::where('user_id', $usrId)->first();
        $data['objective'] = CareerObject::where('user_id', $usrId)->first();
        $data['educations'] = Education::where('user_id', $usrId)->get();
        $data['works'] = Work::where('user_id', $usrId)->get();
        $data['cetificates'] = Certificate::where('user_id', $usrId)->get();
        return view('pdf.index',compact('data'));
    }

    // public function download()
    // {
    //     $usrId = Auth::user()->id;
    //     $data= array();

    //     $data['basicInfo'] = basicInfo::where('user_id', $usrId)->first();
    //     $data['objective'] = CareerObject::where('user_id', $usrId)->first();
    //     $data['educations'] = Education::where('user_id', $usrId)->get();
    //     $data['works'] = Work::where('user_id', $usrId)->get();
    //     $data['cetificates'] = Certificate::where('user_id', $usrId)->get();
    //     PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    //     $pdf = PDF::loadView('pdf.index',compact('data'));
    //     return $pdf->download('myresume.pdf');
    // }
}
