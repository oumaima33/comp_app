<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CompetitionController;
use App\Models\Participant;
use App\Http\Requests\StoreParticipantRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\competition;
class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants= Participant::all();
        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
 
        $validatedData = $request->validate([
            'comp_code' =>  [
                'required','exists:competitions,code',
                function ($attribute, $value, $fail) use ($id) {
                    $competition = Competition::where('id', $id)->where('code', $value)->first();
    
                    if (!$competition) {
                        $fail('The comp_code must match the code of the competition with the specified ID.');
                    }
                }
            ],
            'name' => 'required|string|max:255',
            'submission' => 'required',
        ]);
    
        $competition = Competition::where('code', $validatedData['comp_code'])->where('id',$id)->firstOrFail();
        $user = Auth::user();
        $participant = new Participant;
        $participant->name = $validatedData['name'];
        $participant->submission = $validatedData['submission'];
    
        $participant->competition_id = $competition->id;
        $participant->comp_code= $validatedData['comp_code'];
       
      
        $participant->user_id=$user->id;
        $participant->save();
        
        return redirect('/competitions')->with('success','You have successfully joined the competition.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        return view('participants.show', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParticipantRequest $request, Participant $participant)
    {
        $participant->update($request->validated());

        return redirect()->route('participants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        $participant->delete();
 
        return redirect()->route('participants.index');
    }
}
