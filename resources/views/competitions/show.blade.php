<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details Competition') }}
        </h2>
    </x-slot>


    <p>{{ $competition->description }}</p>
    <p>Categorie: {{ $competition->categorie }}</p>
    <p>Criteria 1: {{ $competition->criteria_1 }}</p>
    <p>Criteria 2: {{ $competition->criteria_2 }}</p>

</x-app-layout>