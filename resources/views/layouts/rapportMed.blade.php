@extends('home')

@section('content1')
<div class="flex justify-center items-center h-screen ml-60 mt-52">
    <div class="container mx-auto ">
        <div class="card w-full overflow-hidden">

            <div class="md:col-span-2 col-span-12 ">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-30 col-span-12">
                        <h3 class="liste text-lime-700 font-bold">liste des rapports médicaux</h3>
                        <div class="text-green-500 text-lg mb-4 ">
                        
                        <form action="{{url('search-record')}}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="matricule">
                            <input type="submit" value="search">
                        </form>
                    </div>
                   
                    <div class="card-body flex justify-between items-center">
                        <div class="overflow-x-auto">
                            @if ($data->isEmpty())
                            <p class="text-lg text-red-700 ml-96">Aucun rapport médicale trouvé.</p>
                        @else
                            <table lass="table-auto w-full">
                                <thead>
                                    <tr class="bg-gray-700  text-white text-sm">
                                      
                                        <th class="px-2 py-2">matricule</th>
                                        <th class="px-2 py-2">nom</th>
                                        <th class="px-2 py-2">poste</th>
                                        <th class="px-2 py-2">service </th>
                                        <th class="px-2 py-2">motif </th>
                                        <th class="px-2 py-2">antécédents médicaux </th>
                                        <th class="px-2 py-2">allergies </th>
                                        <th class="px-2 py-2">maladie </th>
                                        <th class="px-2 py-2">médicament </th>
                                        <th class="px-2 py-2">nombre de jours de repos  </th>
                                        <th class="px-2 py-2">rendez-vous </th>
                                        <th class="px-2 py-2">action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        
                                        <td class="border px-2 py-2">{{ $item->matricule }}</td>
                                        <td class="border px-2 py-2">{{ $item->nom }}</td>
                                        <td class="border px-2 py-2">{{ $item->poste }}</td>
                                        <td class="border px-2 py-2">{{ $item->service }}</td>
                                        <td class="border px-2 py-2">{{ $item->motif }}</td>
                                        <td class="border px-2 py-2">{{ $item->antécédents_médicaux }}</td>
                                        <td class="border px-2 py-2">{{ $item->allergies }}</td>
                                        <td class="border px-2 py-2">{{ $item->maladie }}</td>
                                        <td class="border px-2 py-2">{{ $item->médicament }}</td>
                                        <td class="border px-2 py-2">{{ $item->nbr_repos }}</td>
                                        <td class="border px-2 py-2">{{ $item->date_RDV }}</td>
                                        <td class="border px-4 py-2">
                                           
                                            <a href="{{ url('/downloadRM/' . $item->matricule) }}" class="btn btn-primary btn-sm" title="Télécharger">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                            
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
