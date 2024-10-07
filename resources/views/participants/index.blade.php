<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">
                       {{ __('Competition list') }}
                       </h2>
                   </x-slot>
                   <div class="py-12">
                       <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
                           <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                               <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                  
                                   <table class="w-full text-sm text-left text-gray-900">
                                     
                                       <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                          
                                       <tr>
                                           <th scope="col" class="px-2 py-2">
                                               Participant name
                                           </th>
                                           <th scope="col" class="px-2 py-2">
                                               submission
                                           </th>
                                           <th scope="col" class="px-2 py-2">
                                            Competition id
                                           </th>
                                             
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
                                            @if (empty($data['participants']))
                                            <p>Aucune participant disponible pour le moment.</p>
                                            @else
    
                                            {{-- @dd($data['participants']) --}}
                                            @foreach ($data['participants'] as $participant)
                                            
                                            {{-- @dd($participant) --}}
                                   <tr class="bg-white border-b">
                                       <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                           {{ $participant->name}}
                                       </td>
                                       <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                           {{ $participant->submission}}<a href="{{ $participant->submission }}" download>
                                            <i class="fa fa-download"></i> 
                                       </td>
                                       <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    
                                        {{ $participant->competition_id}}
                                    </td>
                                 
                                           @if (auth()->user()->role_id ==2)
                                              <td class="px-2 py-2">
{{-- @dd($participant) --}}
                                                <x-link href="{{ route('evaluations.index',[ 'participant'=>$participant,'competition_id'=>$participant->competition_id]) }}">evaluate </x-link></td>
                                           </td>
                                           @endif
                                          </tr>
                                         
                                    
                                    </td>
                                </td>
                                        @endforeach
                                    @endif
                                    @endforeach
                                    @else
                                            @if (empty($participants))
                                            <p>Aucune participant disponible pour le moment.</p>
                                  
                                        @else
                                        @foreach($participants as $participant)
                                        <tr class="bg-white border-b">
                                            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $participant->name}}
                                            </td>
                                            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $participant->submission}}
                                                <a href="{{ $participant->submission }}" download>
                                                 <i class="fa fa-download"></i> 
                                             </a>
                                            </td>
                                            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                                             {{ $participant->competition_id}}
                                         </td>
                                         @if (auth()->user()->role_id ==1)
                                                <td class="px-2 py-2">
                                                  
                                                    <form method="POST" action="{{ route('participants.destroy', $participant) }}" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-danger-button
                                                            type="submit"
                                                            onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                                    </form>
                     
                                            
                                                    <td class="px-2 py-2">
                                                        <x-link href="{{ route('participants.show', $participant) }}">Show</x-link></td>
                                                   </td>
                                                @endif
                                
                                </tr>
                                           
                                     
                                       
                                       @endforeach
                                       @endif
                                       @endif
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
                   <script src="https://kit.fontawesome.com/68ee66ea75.js" crossorigin="anonymous"></script>
               </x-app-layout>