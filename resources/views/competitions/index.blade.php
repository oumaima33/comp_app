<x-app-layout>
     <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Competition list') }}
                        
                        <div class="box" style="float:right;">
                            <form name="search"  action="{{ route('competitions.search') }}" method="GET">
                                <link rel="stylesheet" href="{{ asset('style.css') }}" >
                                <input class="input" onmouseout="this.value = ''; this.blur();" type="text" name="search" placeholder="Search" >
                                </form>
                                <i class="fas fa-search"></i>
                            </div>
                        </h2>
                    </x-slot>
                  
                    
                        <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    @if (auth()->user()->role_id ==1)
                                    <x-link href="{{ route('competitions.create') }}" class="m-7">Add new Competition</x-link>
                                    @endif
                                    <table class="w-full text-sm text-left text-gray-900">
                                      
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                           
                                        <tr>
                                            <th scope="col" class="px-2 py-2">
                                                Competition name
                                            </th>
                                            @if (auth()->user()->role_id ==1)
                                            <th scope="col" class="px-2 py-2">
                                                Competition Code
                                            </th>

                                            <th scope="col" class="px-2 py-2">
                                                participant number
                                            </th>
                                            @endif
                                            <th scope="col" class="px-2 py-2">
                                                start at
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                                end at
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                                description
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                                category
                                            </th>
                                            @if (auth()->user()->role_id ==1)
                                            <th scope="col" class="px-2 py-2">
                                                criteria 1
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                                criteria 2
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                                criteria 3
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                                criteria 4
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                                criteria 5
                                            </th>
                                           
                                            @endif
                                           
                                            <th scope="col" class="px-2 py-2">
                 
                                            </th>
                                              
                                            <th scope="col" class="px-2 py-2">
                 
                                            </th>
                                        
                                            <th scope="col" class="px-2 py-2">
                 
                                            </th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(auth()->user()->role_id ==2)
                                            @foreach ($juryData as $data)
                                                @if (empty($data['competitions']))
                                                <p>Aucune compétition disponible pour le moment.</p>
                                                @else
        

                                                @foreach ($data['competitions'] as $competition)
                                                    <tr class="bg-white border-b">
                                                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                         {{ $competition->comp_name}}
                                                        </td>
                                                        <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                            {{ $competition->satrted_at}}
                                                           </td>
                                                           <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                            {{ $competition->ended_at}}
                                                           </td>
                                            
                                            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $competition->description}}
                                            </td>
                                            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $competition->categorie}}
                                            </td>
                                            
                                        
                                            
                                                
                                                    
                                                    <td class="px-2 py-2">
                                                        <x-link href="{{ route('competitions.show', $competition) }}">Show</x-link></td>
                                                </td>
                                               
                                        
                                        </tr>
                                        
                                   
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @else
                                    @if (empty($competitions))
                                    <p>Aucune compétition disponible pour le moment.</p>
                            @else


                                @forelse ($competitions as $competition)
                            <tr class="bg-white border-b">
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->comp_name}}
                                </td>
                                @if (auth()->user()->role_id ==1)
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->code}}
                                </td>
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->part_nbr}}
                                </td>
                                @endif
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->started_at}}
                                </td>
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->ended_at}}
                                </td>
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->description}}
                                </td>
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->categorie}}
                                </td>
                                
                            @if (auth()->user()->role_id ==1)
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->criteria_1}}
                                </td>
                                <td class="px-2 py-2font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->criteria_2}}
                                </td>
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->criteria_3}}
                                </td>
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->criteria_4}}
                                </td>
                                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $competition->criteria_5}}
                                </td>
                                
                                    <td class="px-2 py-2">
                                        <x-link href="{{ route('competitions.edit', $competition) }}">Edit</x-link></td><td>
                                        <form method="POST" action="{{ route('competitions.destroy', $competition) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button
                                                type="submit"
                                                onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                        </form>
                            @endif
                                        
                                        <td class="px-2 py-2">
                                            <x-link href="{{ route('competitions.show', $competition) }}">Show</x-link></td>
                                    </td>
                                    @if (auth()->user()->role_id ==3) 
                                         
                                    <td class="px-2 py-2">
                                        @if ($user->hasJoinedCompetition($competition->id))
                                            <p  > ✓ Joined</p>
                                        @else
                                            <x-link href="{{ route('competitions.join', $competition->id) }}" onclick="return confirm('you will receive an email to register')">JOIN </x-link> 
                                        @endif
                                    </td>
                                    @endif
                            
                            </tr>
                            
                        @empty
                            <tr class="bg-white border-b">
                                <td colspan="2"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ __('No competition found') }}
                            
                            </td>
                        </td>
                        
                        @endforelse 
                        @endif
                                     @endif 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-app-layout>
