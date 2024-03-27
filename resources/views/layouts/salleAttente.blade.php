@extends('home')

@section('content1')
<div class="flex justify-center items-center h-screen ml-60">
    <div class="container mx-auto ">
        <div class="card w-full overflow-hidden">

            <div class="md:col-span-2 col-span-12 ">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-30 col-span-12">
                    <h3 class="liste text-lime-700 font-bold">Salle d'attente </h3>
                  
                    <div class="card-body flex justify-between items-center">
                        <div class="overflow-x-auto">
                            @if ($RDV->isEmpty())
                            <p class="text-lg text-red-700 ml-96">Aucun patient dans la salle d'attente .</p>
                        @else
                            <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-700  text-white text-sm">
                                    <th class="px-4 py-2">numéro</th>
                                    <th class="px-4 py-2">matricule</th>
                                    <th class="px-4 py-2">nom</th>
                                    <th class="px-4 py-2">Heure de rendez-vous</th>
                                    <th class="px-4 py-2">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($RDV as $RD)
                                <tr>
                                    <td class="border px-2 py-2">{{ $RD->num }}</td>
                                    <td class="border px-2 py-2">{{ $RD->patient->matricule }}</td>
                                    <td class="border px-2 py-2">{{ $RD->patient->nom }}</td>
                                    <td class="border px-2 py-2">{{ $RD->date_RDV }}</td>
                                    <td class="border px-2 py-2">
                                        <form action="{{ route('delete-rdv', $RD->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" title="Delete RDV" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>                                 
                                    </td>
                                </tr>
                                @endforeach
                                
                             </tbody>
                         </table>
                         @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection