<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details Participant') }}
        </h2>
    </x-slot>


    
    <p>Participant: {{ $participant->name }}</p>
    <p>submission: {{ $participant->submission }}</p>
 
</x-app-layout>