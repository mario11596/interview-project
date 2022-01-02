<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index(){  

        $userCheck= User::findOrFail(Auth::id());
        $role =  $userCheck->is_company;
    
       
        if($role == true){
            $user = Company::where("email_id","=",$userCheck->email)->get()->first();
        } else {
            $user = Candidate::where("email_id","=",$userCheck->email)->get()->first();
        }
        return view('nekiPage', compact('user'));
    }

    
    public function editCompany(Company $company){
    
        if($company->email_id != auth()->user->email){
            return redirect('/information');
        }
        return view('', compact('company'));
    }


    public function updateCompany(Request $request,$id){ 

        $company = Company::where("id","=",$id)->get()->first();

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'number_employess' => 'required',
            'type' => 'required',
        ]);
      
        $company->name = request('name');
        $company->address = request('address');
        $company->city = request('city');
        $company->number_employess = request('number_employess');
        $company->type = request('type');
        $company->email_id = auth()->user->email;

        $company->save();

        return redirect('/information')->with('info', 'Uspješno su ažurirani podaci');
    }


    public function editCandidate(Candidate $candidate){
    
        if($candidate->email_id != auth()->user->email){
            return redirect('/information');
        }
        return view('', compact('candidate'));
    }


    public function updateCandidate(Request $request,$id){ 

        $candidate = Candidate::where("id","=",$id)->get()->first();

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'mobile_number' => 'required',
            'status' => 'required',
            'OIB' => 'required'
        ]);
      
        $candidate->name = request('name');
        $candidate->surname = request('surname');
        $candidate->address = request('address');
        $candidate->city = request('city');
        $candidate->mobile_number = request('mobile_number');
        $candidate->status = request('status');
        $candidate->OIB = request('OIB');
        $candidate->email_id = auth()->user->email;

        $candidate->save();

        return redirect('/information')->with('info', 'Uspješno su ažurirani podaci');
    }

}
