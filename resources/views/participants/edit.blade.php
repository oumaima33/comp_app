<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit participant') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
 
                    <form method="POST" action="{{ route('participants.update',$participant) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="hidden" name="id" value="{{ $competition->id}}">
                            <x-label for="name" value="{{ __('Participant Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="string" name="name" :value="$participant->name" required autofocus autocomplete="name" />
                            <x-label for="submission" value="{{ __('submission') }}" />
                            <x-input id="submission" class="block mt-2 w-full" type="text" name="submission" :value="$participant->submission" required autofocus autocomplete="submission" />
                            
                        </div>
 
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Participant') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>