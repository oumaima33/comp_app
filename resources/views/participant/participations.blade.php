
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes anciennes Participations') }}
        </h2>
    </x-slot>
        {{-- @dd($parData) --}}
       

        
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-9 lg:px-9">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                  
    <table class="w-full text-sm text-left text-gray-900">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-2 ">Competition Name</th>
                
                <th scope="col" class="px-2 ">Description</th>
                <th scope="col" class="px-2 ">Category</th>
                <th scope="col" class="px-2 ">submission</th>
                
                <th scope="col" class="px-2 "> score</th>
                <th scope="col" class="px-2 ">Certificat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parData as $Data)
            {{-- @dd($Data['participant']) --}}
                 @if (empty($Data['participant']))
                        <p>Aucune evaluation disponible pour le moment.</p>
                 @else
           {{-- @dd(($Data['competitions'])) --}}
           <tr class="bg-white border-b">
                  @if (empty($Data['competitions'])  )
                  <p>Aucune evaluation disponible pour le moment.</p>
             @else
             @foreach( $Data['competitions'] as $competition)
             {{-- @dd($competition) --}}
             
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">{{$competition->comp_name }}</td>
                   
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">{{ $competition->description }}</td>
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">{{ $competition->categorie }}</td>
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">{{$Data['participant']->submission}}<a href="{{ $Data['participant']->submission }}" download>
                        <i class="fa fa-download"></i> </a></td>
                    
                    {{-- @dd($Data['evaluations']) --}}
                    @if (empty($Data['evaluations'])  )
                  <p>Aucune evaluation disponible pour le moment.</p>
             @else
             @foreach( $Data['evaluations'] as $evaluation)
                  
                   
                    
                    {{-- <td>
                        {{ $evaluation->note1 }} /
                        {{$evaluation->note2 }} /
                        {{$evaluation->note3 }} /
                        {{$evaluation->note4 }} /
                        {{$evaluation->note5 }} 
                        <br>
                    </td>
                 --}}
                
                    
                    <td> {{ $score=$evaluation->note1+$evaluation->note2+$evaluation->note3+$evaluation->note4+$evaluation->note5;
                    }}<br> 
                    </td>
                    <td class="px-2 py-2"> <x-link href="{{ route('certificate.generate',['participant'=>$Data['participant'],'competition'=>$competition,'score'=>$score]) }}"> générer</x-link></td>
                

                    @endforeach
                    @endif
                    

                    @endforeach
                    @endif
                    @endif
                   @endforeach
      
                </tr>
            
            </div>
        </div>
    </div>
</div>                   <script src="https://kit.fontawesome.com/68ee66ea75.js" crossorigin="anonymous"></script>

</x-app-layout>
