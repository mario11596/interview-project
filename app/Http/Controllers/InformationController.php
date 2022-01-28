<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{
    public function index()
    {

        $userCheck = User::findOrFail(Auth::id());
        $role = $userCheck->is_company;


        if ($role == true) {
            $user = Company::where("email_id", "=", $userCheck->email)->get()->first();
            return view('company.information', compact('user'));
        } else {
            $user = Candidate::where("email_id", "=", $userCheck->email)->get()->first();
            return view('candidate.information', compact('user'));
        }
    }


    public function editCompany($id){

        $company = Company::where("company_id", "=", $id)->get()->first();

        if ($company->email_id != Auth::user()->email) {
            return redirect('/company/information');
        }
        return view('company.information-edit', compact('company'));
    }


    public function updateCompany(Request $request, $id)
    {

        $company = Company::where("company_id", "=", $id)->get()->first();

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'number_employees' => 'required',
            'type' => 'required',
            "photo" => "required_without_all:name,address,city,number_employees,type|mimes:jpg,png"
        ]);

        if($request->file('photo')){
            $file = $request->file('photo');
            $fileName = Auth::user()->email.'.'.$file->getClientOriginalExtension();
            $filePath = public_path() . '/files/photos/';
            $file->move($filePath, $fileName);
        }

        $company->name = $request['name'];
        $company->address = $request['address'];
        $company->city = $request['city'];
        $company->number_employees = $request['number_employees'];
        $company->type = $request['type'];
        $company->description = $request['description'];
        $company->email_id = Auth::user()->email;

        $company->save();

        return redirect('/company/information')->with('success', 'Uspješno su ažurirani podaci!');
    }


    public function editCandidate($id)
    {
        $candidate = Candidate::where("candidate_id", "=", $id)->get()->first();

        if ($candidate->email_id != Auth::user()->email) {
            return redirect('/candidate/information');
        }
        return view('candidate.information-edit', compact('candidate'));
    }


    public function updateCandidate(Request $request, $id)
    {

        $candidate = Candidate::where("candidate_id", "=", $id)->get()->first();

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'mobile_number' => 'required',
            'status_type' => 'required',
            'OIB' => 'required',
            "file" => "required_without_all:name,surname,address,city,mobile_number,status_type,OIB|mimes:pdf|max:10000",
            "photo" => "required_without_all:name,surname,address,city,mobile_number,status_type,OIB,file|mimes:jpg,png"
        ]);
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = Auth::user()->email.'.'.$file->getClientOriginalExtension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $fileName);
        }
       // dd($request->file('photo'));
        if($request->file('photo')){
            $file = $request->file('photo');
            $fileName = Auth::user()->email.'.'.$file->getClientOriginalExtension();
            $filePath = public_path() . '/files/photos/';
            $file->move($filePath, $fileName);
        }

        $candidate->name = $request['name'];
        $candidate->surname = $request['surname'];
        $candidate->address = $request['address'];
        $candidate->city = $request['city'];
        $candidate->mobile_number = $request['mobile_number'];
        $candidate->status_type = $request['status_type'];
        $candidate->OIB = $request['OIB'];
        $candidate->email_id = Auth::user()->email;

        $candidate->save();

        return redirect('/candidate/information')->with('success', 'Uspješno su ažurirani podaci!');
    }


    public function destroyPDF($id) {
        $pathToFile = public_path().'/files/uploads/'.$id.'.pdf';


        if (File::exists($pathToFile)) {
            File::delete(public_path('/files/uploads/'.$id.'.pdf'));
        }

        return redirect('/candidate/information')->with('success', 'Uspješno je obrisan PDF dokument!');
    }


    public function showPDF($id){
        $pathToFile = public_path().'/files/uploads/'.$id.'.pdf';

        if (file_exists($pathToFile)) {

        $headers = [
            'Content-Type' => 'application/pdf'
        ];
            return response()->file($pathToFile);
        }
    }


    public function destroyPhoto($id) {
        $pathToFile = public_path().'/files/photos/'.$id.'.JPG';
        
        if (File::exists($pathToFile)) {
            File::delete(public_path('/files/photos/'.$id.'.JPG'));
        }
        if(Auth::user()->is_company){
            return redirect('/company/information');
        } else {
            return redirect('/candidate/information');
        }
    }

    public function showCompany($id) {
        $company_id = Job::where('job_id', $id)->value('company_id');
        $company = Company::where('company_id', $company_id)->first();
        return view('candidate.company-show', compact('company'));
    }
}
