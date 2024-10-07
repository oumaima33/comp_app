<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details Participant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
   
    <p> <b>Participant:</b>  {{ $participant->name }}</p>&nbsp
    <p> <b>CompetitonID:</b>  {{ $participant->competition_id }}</p>&nbsp
    <p> <a href="{{ $participant->submission }}" download><b>submission:</b>
        <i class="fa fa-download"></i> </a>  {{ $participant->submission }}</p>&nbsp
    
   
    <script src="https://kit.fontawesome.com/68ee66ea75.js" crossorigin="anonymous"></script>
</x-app-layout>