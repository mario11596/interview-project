<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
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

        $company = Company::where("id", "=", $id)->get()->first();

        if ($company->email_id != Auth::user()->email) {
            return redirect('/company/information');
        }
        return view('company.information-edit', compact('company'));
    }


    public function updateCompany(Request $request, $id)
    {

        $company = Company::where("id", "=", $id)->get()->first();

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'number_employees' => 'required',
            'type' => 'required',
        ]);

        $company->name = $request['name'];
        $company->address = $request['address'];
        $company->city = $request['city'];
        $company->number_employees = $request['number_employees'];
        $company->type = $request['type'];
        $company->email_id = Auth::user()->email;

        $company->save();

        return redirect('/company/information')->with('info', 'Uspješno su ažurirani podaci');
    }


    public function editCandidate($id)
    {
        $candidate = Candidate::where("id", "=", $id)->get()->first();

        if ($candidate->email_id != Auth::user()->email) {
            return redirect('/candidate/information');
        }
        return view('candidate.information-edit', compact('candidate'));
    }


    public function updateCandidate(Request $request, $id)
    {

        $candidate = Candidate::where("id", "=", $id)->get()->first();

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'mobile_number' => 'required',
            'status_type' => 'required',
            'OIB' => 'required', 
            "file" => "required_without_all:name,surname,address,city,mobile_number,status_type,OIB|mimes:pdf|max:10000"
        ]);
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = Auth::user()->email.'.'.$file->getClientOriginalExtension(); 
            $filePath = public_path() . '/files/uploads/';
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

        return redirect('/candidate/information')->with('info', 'Uspješno su ažurirani podaci');
    }


    public function destroyPDF($id) {
        $pathToFile = public_path().'/files/uploads/'.$id.'.pdf';
        
    
        if (File::exists($pathToFile)) {
            File::delete(public_path('/files/uploads/'.$id.'.pdf'));
        }
        
        return redirect('/candidate/information');
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
}
