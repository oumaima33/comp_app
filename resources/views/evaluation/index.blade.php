<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluation') }}
        </h2>
        
    </x-slot>
<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Il y a eu des problèmes avec les données entrées.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- @dd($participant) --}}
    <h1>Évaluer la soumission de {{ $participant->name }}</h1>
    <form method="POST" action="{{ route('evaluations.store',$participant->id) }}">
        @csrf
        {{-- <input type="hidden" name="participant_id" value="{{ $participant->first()->id }}">
        <input type="hidden" name="fk_jd" value="{{ Auth::user()->id }}"> --}}
        <div > 
            <label for="note1">Critère 1 :{{$competition->criteria_1}}</label>
            <input type="number"  id="note1" name="note1" min="0" max="10" step="1"  required>
        </div>
        <div >
            <label for="note2">Critère 2: {{$competition->criteria_2}}</label>
            <input type="number"  id="note2" name="note2" min="0" max="10" step="1" required>
        </div>
        <div >
            <label for="note3">Critère 3: {{$competition->criteria_3}}</label>
            <input type="number"  id="note3" name="note3" min="0" max="10" step="1" required>
        </div>
        <div >
            <label for="note4">Critère 4: {{$competition->criteria_4}}</label>
            <input type="number"  id="note4" name="note4" min="0" max="10" step="1" required>
        </div>
        <div >
            <label for="note5">Critère 5 : {{$competition->criteria_5}}</label>
            <input type="number"  id="note5" name="note5" min="0" max="10" step="1" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
</x-app-layout>
