<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Competition') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
 
                    <form method="POST" action="{{ route('competitions.index') }}">
                        @csrf
 
                        <div>
                            <x-label for="comp_name" value="{{ __('Competition Name') }}" />
                            <x-input id="comp_name" class="block mt-1 w-full" type="text" name="comp_name" :value="old('comp_name')" required autofocus autocomplete="comp_name" />
                            <x-label for="code" value="{{ __('Competition code') }}" />
                            <x-input id="code" class="block mt-1 w-full" type="int" name="code" :value="old('code')" required autofocus autocomplete="code" />
                            <x-label for="part_nbr" value="{{ __('Participant Number') }}" />
                            <x-input id="part_nbr" class="block mt-2 w-full" type="int" name="part_nbr" :value="old('part_nbr')" required autofocus autocomplete="part_nbr" />
                            <x-label for="description" value="{{ __('Description') }}" />
                            <x-input id="description comp" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                            <x-label for="categorie" value="{{ __('categorie') }}" />
                            <x-input id="categorie" class="block mt-1 w-full" type="text" name="categorie" :value="old('categorie')" required autofocus autocomplete="categorie" />
                            <x-label for=" criteria 1" value="{{ __(' criteria 1') }}" />
                            <x-input id=" criteria 1" class="block mt-1 w-full" type="text" name=" criteria 1" :value="old(' criteria 1')" required autofocus autocomplete=" criteria 1" />
                            <x-label for=" criteria 2 " value="{{ __(' criteria 2') }}" />
                            <x-input id=" criteria 2" class="block mt-1 w-full" type="text" name=" criteria 2" :value="old(' criteria 2')" required autofocus autocomplete=" criteria 2" />
                            <x-label for=" criteria 3" value="{{ __(' criteria 3') }}" />
                            <x-input id=" criteria 3" class="block mt-1 w-full" type="text" name=" criteria 3" :value="old(' criteria 3')" required autofocus autocomplete=" criteria 3" />
                            <x-label for=" criteria 4" value="{{ __(' criteria 4') }}" />
                            <x-input id=" criteria 4" class="block mt-1 w-full" type="text" name=" criteria 4" :value="old(' criteria 4')" required autofocus autocomplete=" criteria 4" />
                            <x-label for=" criteria 5" value="{{ __(' criteria 5') }}" />
                            <x-input id=" criteria 5" class="block mt-1 w-full" type="text" name=" criteria 5" :value="old(' criteria 5')" required autofocus autocomplete=" criteria 5" />
                            
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Competition') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>