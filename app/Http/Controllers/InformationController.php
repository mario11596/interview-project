<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'status' => 'required',
            'OIB' => 'required'
        ]);

        $candidate->name = $request['name'];
        $candidate->surname = $request['surname'];
        $candidate->address = $request['address'];
        $candidate->city = $request['city'];
        $candidate->mobile_number = $request['mobile_number'];
        $candidate->status = $request['status'];
        $candidate->OIB = $request['OIB'];
        $candidate->email_id = Auth::user()->email;

        $candidate->save();

        return redirect('/candidate/information')->with('info', 'Uspješno su ažurirani podaci');
    }

}
