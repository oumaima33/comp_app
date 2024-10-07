{{-- 
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
    {{-- <h1>Évaluer la soumission de {{ $participant->name }}</h1>
    <form method="POST" action="{{ route('evaluations.store',$participant->id) }}">
        @csrf --}}
        {{-- <input type="hidden" name="participant_id" value="{{ $participant->first()->id }}">
        <input type="hidden" name="fk_jd" value="{{ Auth::user()->id }}"> --}}
        {{-- <div > 
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
</x-app-layout> --}} 
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
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                <x-validation-errors class="mb-4" />
    <h1>Évaluer la soumission de<b> {{ $participant->name }}</b></h1><br>
    <form method="POST" action="{{ route('evaluations.store',$participant->id) }}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
        {{-- <input type="hidden" name="participant_id" value="{{ $participant->first()->id }}">
        <input type="hidden" name="fk_jd" value="{{ Auth::user()->id }}"> --}}
        <div > 
            <x-label for="note1" value="Criteria 1 : {{$competition->criteria_1}}" />
            <x-input id="note1" class="block mt-1 w-full" type="number" name="note1" min="0" max="10" step="1" required autofocus autocomplete="note1" />

        </div>
        <div >
            <x-label for="note2" value="Criteria 2 : {{$competition->criteria_2}}" />
            <x-input id="note2" class="block mt-1 w-full" type="number" name="note2" min="0" max="10" step="1" required autofocus autocomplete="note2" />
        </div>
        <div >
            <x-label for="note3" value="Criteria 3 : {{$competition->criteria_3}}" />
            <x-input id="note3" class="block mt-1 w-full" type="number" name="note3" min="0" max="10" step="1" required autofocus autocomplete="note3" />
        </div>
        <div >
            <x-label for="note4" value="Criteria 4 : {{$competition->criteria_4}}" />
            <x-input id="note4" class="block mt-1 w-full" type="number" name="note4" min="0" max="10" step="1" required autofocus autocomplete="note4" />
        </div>
        <div >
            <x-label for="note5" value="Criteria 5 : {{$competition->criteria_5}}" />
            <x-input id="note5" class="block mt-1 w-full" type="number" name="note5" min="0" max="10" step="1" required autofocus autocomplete="note5" />
        </div>
        <div class="flex mt-4">
        <x-button style="background-color: #6b1e8a" type="submit" class="btn btn-primary">Enregistrer</x-button></div>
    </form>
</div>
</x-app-layout>