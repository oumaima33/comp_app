
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listes des jurys') }}
        </h2>
        
    </x-slot>

<div class="modal fade" id="addEvaluatorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @if (count($competitions) === 0)
                <p>Aucune compétition disponible pour le moment.</p>
            @else
                @foreach ($competitions as $competition)
                    <h5 class="modal-title">Jurys pour la compétition : {{ $competition->comp_name }}</h5>
                     
                    @php
                        $jurys = $competition->jurys;
                    @endphp
                    {{-- @if (count($jurys) === 0)
                        <p>Aucun jury n'a été assigné à cette compétition pour le moment.</p>
                    @else --}}
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Competition_id</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">categorie</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><x-link href="{{route('judges.invite',$competition->id)}}">Add</x-link></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurys as $jury)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $jury->competition_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $jury->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $jury->categorie }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- Actions à définir selon vos besoins -->
                                            <!-- Par exemple : Afficher les détails du jury, le supprimer, etc. -->
                                            <x-link href="">Voir détails</x-link>
                                            <x-link href="{{route('judges.destroy',$jury)}}">Supprimer</x-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- @endif --}}
                @endforeach
            @endif
                
</div>
</x-app-layout>
