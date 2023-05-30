<?php

namespace App\Http\Controllers;
use App\Models\participant;
use App\Models\competition;
use App\Models\evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Participant $participant, $competition_id)
    {
// dd($participant);
        $evaluations = Evaluation::all();
        $competition= Competition::where('id',$competition_id)->first();
        return view('evaluation.index', compact(['participant','evaluations','competition']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  $participantID )
    {
        $request->validate([
            'note1' => 'required|integer|min:0|max:10',
            'note2' => 'required|integer|min:0|max:10',
            'note3' => 'required|integer|min:0|max:10',
            'note4' => 'required|integer|min:0|max:10',
            'note5' => 'required|integer|min:0|max:10',
            
        ]);
    
    
        $evaluation = new Evaluation();
        $evaluation->note1 = $request->input('note1');
        $evaluation->note2= $request->input('note2');
        $evaluation->note3 = $request->input('note3');
        $evaluation->note4 = $request->input('note4');
        $evaluation->note5 = $request->input('note5');
        
        $evaluation->fk_par =$participantID;
        $evaluation->fk_jd = auth()->user()->id;
        
        
        
        $evaluation->save();
    
        return redirect('/participants')->with('success', 'Evaluation enregistrée avec succès.');
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
    public function destroy(string $id)
    {
        //
    }
}
