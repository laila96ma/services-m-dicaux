@extends('home')

@section('content1')
<div class="flex justify-center items-center h-screen ml-60">
    <div class="container mx-auto ">
        <div class="card w-full overflow-hidden">

            <div class="md:col-span-2 col-span-12 ">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-30 col-span-12">
                    <h3  class="liste"> liste des dossiers médicaux </h3>
                    <div class="text-green-500 text-lg mb-4 flex justify-between mt-7">
                        <div>
                            <form action="{{ url('searchDM') }}" method="POST">
                                @csrf
                                <input type="text" name="matricule">
                                <button type="submit">Search</button>
                            </form></div>
                       <div>
                        <a href="{{ url('/dossierMedicaux/create') }}" class="btn btn-success btn-sm" title="Add New dossier médicale">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New dossier médicale
                        </a>
                       </div>
                        
                    </div>
                    <div class="card-body flex justify-between items-center">
                        <div class="overflow-x-auto">
                            @if ($dossierMedicaux->isEmpty())
                            <p class="text-lg text-red-700 ml-96">Aucun dossier médicale trouvé.</p>
                        @else
                            <table class="table-auto w-full">
                                <thead>
                                    <tr class="bg-gray-700  text-white text-sm">
                                       
                                        <th class="px-1 py-1"> antécédents médicaux</th>
                                        <th class="px-1 py-1">allergies </th>
                                        <th class="px-1 py-1">maladie </th>
                                        <th class="px-1 py-1">médicament</th>
                                        <th class="px-1 py-1">analyse</th>
                                        <th class="px-1 py-1">nombre de repos</th>
                                        <th class="px-1 py-1">matricule</th>
                                        <th class="px-1 py-1">nom</th>
                                        <th class="px-1 py-1">poste</th>
                                        <th class="px-1 py-1">service</th>
                                        <th class="px-1 py-1">Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dossierMedicaux as $item)
                                    <tr>
                                        
                                        <td class="border px-1 py-1">{{ $item->antécédents_médicaux }}</td>
                                        <td class="border px-1 py-1">{{ $item->allergies }}</td>
                                        <td class="border px-1 py-1">{{ $item->maladie }}</td>
                                        <td class="border px-1 py-1">{{ $item->médicament }}</td>
                                        <td class="border px-1 py-1">{{ $item->analyse }}</td>
                                        <td class="border px-1 py-1">{{ $item->nbr_repos }}</td>
                                        
                                        @if ($item->patient)
                                            <td class="border px-1 py-1">{{ $item->patient->matricule }}</td>
                                            <td class="border px-1 py-1">{{ $item->patient->nom }}</td>
                                            <td class="border px-1 py-1">{{ $item->patient->poste }}</td>
                                            <td class="border px-1 py-1">{{ $item->patient->service }}</td>
                                           
                                    @else
                                        <td colspan="3">Aucune patient associée à cette dossier  médicale.</td>
                                    @endif
 
                                    <td class="border px-1 py-2">
                                        <a href="{{ url('/dossierMedicaux/' . $item->id) }}" title="View dossierMedicaux" class="text-green-600 hover:text-green-900">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ url('/dossierMedicaux/' . $item->id . '/edit') }}" title="Edit dossierMedicaux" class="text-green-600 hover:text-green-900 ml-2">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <form method="POST" action="{{ url('/dossierMedicaux' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" title="Delete dossierMedicaux" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
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
    </div>
</div>
@endsection