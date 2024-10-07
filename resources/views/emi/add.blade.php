<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Judge') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
            <form id="add-evaluator-form" method="POST" action="{{route('judges.store',$id_comp)}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                           
                        <span class="invalid-feedback">
                            <strong id="evaluator-name-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                       
                        <x-label for="categorie" value="{{ __('Category') }}" />
                        <x-input id="categorie" class="block mt-1 w-full" type="text" name="categorie" :value="old('categorie')" required autofocus autocomplete="categorie" />
                        <span class="invalid-feedback">
                            <strong id="evaluator-categorie-error"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                       
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                        <span class="invalid-feedback">
                            <strong id="evaluator-email-error"></strong>
                        </span>
                    </div>
                </div>
                <div class="flex mt-4">
                    <x-button style="background-color: #6b1e8a" name="add" class="btn btn-success" id="add" type="submit">Add</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>