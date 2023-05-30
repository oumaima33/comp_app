<?php

namespace App\Http\Controllers;
use App\Models\Participant;
use App\Models\competition;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StorecompetitionRequest;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdatecompetitionRequest;
use Illuminate\Contracts\Auth\Access\Gate;


class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competition::with('participants')->get();
        $user = Auth::user();
        
        return view('competitions.index', compact('competitions', 'user'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competitions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecompetitionRequest $request)
    {
        $validatedData = $request->validate([
            'comp_name' => 'required|max:255',
            'code'=>'required',
            'part_nbr' => 'required|integer',
            'description' => 'required',
            'categorie' => 'required',
        ]);
    
        $competition = new Competition();
        $competition->comp_name = $request->input('comp_name');
        $competition->code = $request->input('code');
        $competition->part_nbr = $request->input('part_nbr');
        $competition->description = $request->input('description');
        $competition->categorie = $request->input('categorie');
        $competition->criteria_1 = $request->input('criteria_1');
        $competition->criteria_2 = $request->input('criteria_2');
        $competition->criteria_3 = $request->input('criteria_3');
        $competition->criteria_4 = $request->input('criteria_4');
        $competition->criteria_5 = $request->input('criteria_5');
        
        $competition->save();
     
       return redirect('/competitions')->with('success', 'La compétition a été créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(competition $competition)
    {
     
        return view('competitions.show', compact('competition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(competition $competition)
    {
        
        return view('competitions.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecompetitionRequest $request, competition $competition)
    {
        $competition->update($request->validated());

        return redirect()->route('competitions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(competition $competition)
    {
        $competition->delete();
 
        return redirect()->route('competitions.index');
    }


    public function join(Request $request,$id)
    {
       
       
        $competition=competition::where('id',$id)->firstOrFail();
        return view('competitions.join', compact('competition'));
       

       
    }
}



