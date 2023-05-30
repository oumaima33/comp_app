<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CompetitionController;
use App\Models\Participant;
use App\Http\Requests\StoreParticipantRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateParticipantRequest;
use App\Models\competition;
use PDF;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->role_id ==1 ||auth()->user()->role_id ==3 ){
            $participants= Participant::all();
        return view('participants.index', compact('participants'));
        }
        $jurys = auth()->user()->judge;
        // dd($jurys);
        foreach ($jurys as $jury) {
            $juryId=$jury->competition_id;
            $juryData[] = [
                'jury' => $jury,
                'participants' =>Participant::where('competition_id', $juryId)
                ->get(),
            ];
        }
        
        // dd($juryId);
        // $participants = Participant::join('competitions', 'participant.competition_id', '=', 'competitions.id')
        //     ->where('competitions.id', $juryId)
        //     ->get();
        // dd($participants);
            return view('participants.index', compact('juryData'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        
        $participants= Participant ::where('name',auth()->user()->name)->get();
        foreach($participants as $participant){
            // dd($participant->competition_id);
            $competitions = Competition::where('id',$participant->competition_id)->get();
            $evaluations = DB::table('evaluation')->where('fk_par', $participant->id)->get();
            // dd($evaluations);
            $parData=[
                'participant' => $participant,
                       
                'competitions'=>$competitions,
                'evaluations' => $evaluations,

            ];
            
            
        
        }

        return view('participant.participations', compact('parData'));
    
    }
    public function generateCertificate(Participant $participant, competition $competition, $score)
{
    // Code pour calculer le score et récupérer les informations nécessaires
    // dd($participant);
    $data = [
        'participant' => $participant,
        'competition' => $competition,
        'score' => $score,
    ];
    // dd($data);
    view()->share('data', $data);
    $pdf=PDF::loadView('participant.certificat',$data);

    return $pdf->download($data['participant']->name .'_certificat.pdf');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
 
        $validatedData = $request->validate([
            'comp_code' => [
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
