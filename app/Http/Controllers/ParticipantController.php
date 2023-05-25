<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CompetitionController;
use App\Models\Participant;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
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
    public function store(StoreParticipantRequest $request)
    {
 
        $validatedData = $request->validate([
            'comp_code' => 'required|exists:competitions,code',
            'name' => 'required|string|max:255',
            'submission' => 'required',
        ]);
    
        $competition = Competition::where('code', $validatedData['comp_code'])->firstOrFail();
    
        $participant = new Participant;
        $participant->name = $validatedData['name'];
        $participant->submission = $validatedData['submission'];
        $participant->competition_id = $competition->id;
        $participant->comp_code= $validatedData['comp_code'];
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
