<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details Competition') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
   
    <p><b>Category</b> : {{ $competition->categorie }}</p>&nbsp
    <p><b>Description</b> : {{ $competition->description }}</p>&nbsp
    <p><b>Nombre de participants </b>: {{ $competition->part_nbr }}</p>&nbsp
    @if (auth()->user()->role_id==1 || auth()->user()->role_id==2)
    <p><b>Criteria 1 </b>: {{ $competition->criteria_1 }}</p>&nbsp
    <p><b>Criteria 2 </b>: {{ $competition->criteria_2 }}</p>&nbsp
    <p><b>Criteria 3 </b>: {{ $competition->criteria_3 }}</p>&nbsp
    <p><b>Criteria 4 </b>: {{ $competition->criteria_4 }}</p>&nbsp
    <p><b>Criteria 5 </b>: {{ $competition->criteria_5 }}</p>
@endif
</x-app-layout>