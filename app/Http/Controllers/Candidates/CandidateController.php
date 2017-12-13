<?php

namespace App\Http\Controllers\Candidates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Candidate;
use Validator;

class CandidateController extends Controller
{
    function Index(Request $request){
        $candidates = Candidate::all();
        foreach( $candidates as $c ){
            $c->state   = Candidate::makeState($c->state);
            $c->status  = Candidate::makeStatus($c->status);
        }
        
        $states = Candidate::getStates();
        
        return View('index')
        ->with('title', "Candidate's Manager")
        ->with('candidates', $candidates)
        ->with('states', $states);
    }
    
    function Insert(Request $request){
        
        $validator = $this->validator($request);
        
        if($validator->fails()){
            $errors =  $validator->errors();
            echo json_encode($errors->all());
            exit;
        }
        
        if( !isset( $request->id ) ){
            $candidate  = new Candidate();
        }else{
            $candidate = Candidate::find($request->id);
        }
        $candidate->fullname        = $request->name;
        $candidate->age             = $request->age;
        $candidate->address         = $request->address;
        $candidate->number          = $request->number;
        $candidate->complement      = $request->complement;
        $candidate->neighborhood    = $request->neighborhood;
        $candidate->city            = $request->city;
        $candidate->state           = $request->state;
        $candidate->postal_code     = $request->postal_code;
        $candidate->status          = $request->status;
        $candidate->save();
        echo 'ok';
        
    }
    
    
    function Delete(Request $request){
        Candidate::find($request->i)->delete();
        echo 'ok';
    }
    
    function Get(Request $request){
        $candidate = Candidate::find($request->i);
        return response()->json($candidate);
        
    }
    
    private function validator(Request $request){
        $rules = [
                'name'  	=> 'required|max:255',
                'age'           => 'required|numeric',
                'address' 	=> 'required|max:255',
                'number' 	=> 'required|max:45',
                'complement'    => '', 
                'neighborhood'  => 'required|max:100',
                'postal_code'	=> 'required|alpha_dash|max:9',
//                'phone'		=> 'required|min:14|max:15',
                'state' 	=> 'required|max:2',
                'city' 		=> 'required|max:100',
                'status' 	=> 'required|min:0,max:1',
        ];
        return Validator::make($request->all(), $rules);
    }
}
