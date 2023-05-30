<?php

namespace App\Http\Controllers;
use App\Models\judge;
use App\Models\Competition;
use App\Models\participant;
use App\Models\User;

use App\Models\evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\judgeinvitation;
use App\Mail\judgealerte;
use Illuminate\Support\Facades\Validator;

class JudgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions=competition::orderby('id')->get();

return view('emi.jury',compact(['competitions']));
        
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create( $id)
    {
        $id_comp=$id;
        return view('emi.add',compact('id_comp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_comp)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required',
            'email' => 'bail|required||email',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $email = $request->email;
            $categorie = $request->categorie;

            $name=$request->name;
        
            $evaluator = Judge::where('competition_id',$id_comp)->where('name',$name)->first();
            $user=User::where('email',$email)->first();
            $competition=competition::where('id',$id_comp)->first();
            // checking if the evaluator exists already or not
            // if he doesn't exist we add him to the DB
            if($evaluator == null ){
                if( $user==null){
                    
                
                    $role=2;
                    $new_user=User::create([  
                     'name' => $request->name,
                     'email' => $request->email,
                     'password' => Hash::make($password),
                     'role_id'=>$role,
     
                    ]);
                $new_evaluator = Judge::create([
                    'name' => $request->name,
                    'categorie' =>$request->categorie,
                    'competition_id'=>$id_comp,
                    'comp_code'=>$new_user->id,
                    
                ]);
            
                }else {
                    
            
                    $new_evaluator = Judge::create([
                        'name' => $request->name,
                        'categorie' => $categorie,
                        'competition_id'=>$id_comp,
                        'comp_code'=>$user->id,
                        
                    ]);
                }
                
                

                // sending alert invitation to the evaluator by email
                
                $details=[
                    'competition_name' =>$competition->comp_name,
                    'evaluator_email' => $email,
                    'evaluator_password' => $password,
                ];
        
                Mail::to($email)->send(new judgeinvitation($details));
            }else{
            
                    $new_evaluator = Judge::create([
                        'name' => $request->name,
                        'categorie' => $categorie,
                        'competition_id'=>$id_comp,
                        'comp_code'=>$user->id,
                        
                    ]);
                // sending alert invitation to the evaluator by email
                $details=[
                    
                    'competition_name' =>$competition->comp_name,
                ];
        
                Mail::to($email)->send(new judgealerte($details));
            }
            return redirect()->route('judges.index')->with('success', 'Le jury a été invité avec succès.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(judge $judge)
    {
        $judge->delete();

    return redirect()->route('judges.index')->with('success', 'Le jury a été supprimé avec succès.');

    }
}
