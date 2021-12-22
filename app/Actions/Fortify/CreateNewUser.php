<?php

namespace App\Actions\Fortify;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        if(isset($input['is_company'])){

            $user = new User();
            $user->email = $input['email'];
            $user->is_company = true;
            $user->password = Hash::make($input['password']);
            $user->save();
            
            $company= new Company();
            $company->email_id = $input['email'];
            $company->name = $input['name'];
            $company->address = $input['addressCompany'];
            $company->city = $input['cityCompany'];
            $company->number_employees = $input['number_employees'];
            $company->type = $input['type'];
            $company->save();
          

        } 
        if(isset($input['is_candidate'])){
            $user = new User();
            $user->email = $input['email'];
            $user->is_company = false;
            $user->password = Hash::make($input['password']);
            $user->save();

            $candidate = new Candidate();
            $candidate->name = $input['name'];
            $candidate->surname = $input['surname'];
            $candidate->address = $input['addressCandidate'];
            $candidate->city = $input['cityCandidate'];
            $candidate->mobile_number = $input['mobile_number'];
            $candidate->status = $input['status'];
            $candidate->OIB = $input['OIB'];
            $candidate->email_id = $input['email'];
            $candidate->save();
        }   
        return $user;
        /*return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);*/
    }
}
