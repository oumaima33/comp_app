
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes anciennes Participation') }}
        </h2>
        {{-- @dd($parData) --}}
        {{-- @dd($parData['participant']) --}}
             @if (empty($parData['participant']))
                    <p>Aucune evaluation disponible pour le moment.</p>
             @else

        <h6>Bonjour,{{$parData['participant']->name}}</h6>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-9 lg:px-9">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-900">
        <thead>
            <tr>
                <th>Nom competition</th>
                <th>Nombre de participants</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>submission</th>
                <th>Criteres</th>
                
                <th>note</th>
                <th>score</th>
                <th>Certificat</th>
            </tr>
        </thead>
        <tbody>
           {{-- @dd(($parData['competitions'])) --}}
                <tr>
                  @if (empty($parData['competitions'])  )
                  <p>Aucune evaluation disponible pour le moment.</p>
             @else
             @foreach( $parData['competitions'] as $competition)
             {{-- @dd($competition) --}}
                    <td>{{$competition->comp_name }}</td>
                    <td>{{ $competition->part_nbr }}</td>
                    <td>{{ $competition->description }}</td>
                    <td>{{ $competition->categorie }}</td>
                    <td>{{$parData['participant']->submission}}<a href="{{ $parData['participant']->submission }}" download>
                        <i class="fa fa-download"></i> </a></td>
                    <td>
                        {{ $competition->criteria_1 }} /
                        {{ $competition->criteria_2 }} /
                        {{ $competition->criteria_3 }} /
                        {{ $competition->criteria_4 }} /
                        {{ $competition->criteria_5 }} 
                        
                    </td>
                    {{-- @dd($parData['evaluations']) --}}
                    @if (empty($parData['evaluations'])  )
                  <p>Aucune evaluation disponible pour le moment.</p>
             @else
             @foreach( $parData['evaluations'] as $evaluation)
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        {{ $evaluation->note1 }} /
                        {{$evaluation->note2 }} /
                        {{$evaluation->note3 }} /
                        {{$evaluation->note4 }} /
                        {{$evaluation->note5 }} 
                        <br>
                    </td>
                
                
                    
                    <td> {{ $score=$evaluation->note1+$evaluation->note2+$evaluation->note3+$evaluation->note4+$evaluation->note5;
                    }}<br> 
                    </td>
                    <td class="px-2 py-2"> <x-link href="{{ route('certificate.generate',['participant'=>$parData['participant'],'competition'=>$competition,'score'=>$score]) }}"> générer</x-link></td>
                </tr>

                    @endforeach
                    @endif
                    

                    @endforeach
                    @endif
                    @endif
                   
      
                </tr>
            
            </div>
        </div>
    </div>
</div>                   <script src="https://kit.fontawesome.com/68ee66ea75.js" crossorigin="anonymous"></script>

</x-app-layout>
