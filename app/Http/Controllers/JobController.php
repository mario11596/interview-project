<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index(Request $request) {
        if ($request->has('company_id')) {
            $query = DB::table('jobs')->where('company_id', '=', $request->input('company_id'));
        } else {
            $query = DB::table('jobs');
        }
        return $query->paginate($request->input('count', 10));
    }

    public function create(Request $request) {
        DB::table('jobs')->insert($request->all());
    }

    public function delete(Request $request) {
        /*if (DB::table('jobs')->where('id', '=', $request->input('job_id'))->get('company_id') != $request->input('company_id')) {
            abort(403);
        }*/
        DB::table('jobs')->delete($request->input('job_id'));
    }

}
