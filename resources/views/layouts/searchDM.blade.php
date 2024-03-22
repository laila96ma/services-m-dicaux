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
                            <form action="{{ url('/searchDM') }}" method="POST">
                                @csrf
                                <input type="text" name="matricule">
                                <button type="submit">Search</button>
                            </form></div>
                       <div>
                        <a href="{{ url('/dossierMedicaux/create') }}" class="btn btn-success btn-sm" title="Add New dossier médicale">
                            <i class="fa fa-plus" aria-hidden="true"></i> ajouter un dossier médicale
                        </a>
                       </div>
                        
                    </div>
                    <div class="card-body flex justify-between items-center">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr >
                                       
                                        <th class="px-2 py-2"> antécédents médicaux</th>
                                        <th class="px-2 py-2">allergies </th>
                                        <th class="px-2 py-2">maladie </th>
                                        <th class="px-2 py-2">médicament</th>
                                        <th class="px-2 py-2">analyse</th>
                                        <th class="px-2 py-2">nombre de repos</th>
                                        <th class="px-2 py-2">matricule</th>
                                        <th class="px-2 py-2">nom</th>
                                        <th class="px-2 py-2">poste</th>
                                        <th class="px-2 py-2">service</th>
                                        <th class="px-2 py-2">Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dossierMedicaux as $item)
                                    <tr>
                                        
                                        <td class="border px-2 py-2">{{ $item->antécédents_médicaux }}</td>
                                        <td class="border px-2 py-2">{{ $item->allergies }}</td>
                                        <td class="border px-2 py-2">{{ $item->maladie }}</td>
                                        <td class="border px-2 py-2">{{ $item->médicament }}</td>
                                        <td class="border px-2 py-2">{{ $item->analyse }}</td>
                                        <td class="border px-2 py-2">{{ $item->nbr_repos }}</td>
                                        <td class="border px-2 py-2">{{ $item->matricule }}</td>
                                        <td class="border px-2 py-2">{{ $item->nom }}</td>
                                        <td class="border px-2 py-2">{{ $item->poste }}</td>
                                        <td class="border px-2 py-2">{{ $item->service }}</td>
                                       <td class="border px-4 py-2">
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection