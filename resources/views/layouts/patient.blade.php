@extends('home')

@section('content1')
<div class="flex justify-center items-center h-screen ml-60">
    <div class="container mx-auto ">
        <div class="card w-full overflow-hidden">

            <div class="md:col-span-2 col-span-12 ">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-30 col-span-12">
                    <h3 class="liste text-lime-700 font-bold">la liste des patients </h3>
                    <div class="text-green-500 text-lg mb-4 flex justify-between mt-7">
                        <div>
                            <form action="{{ url('/searchPat') }}" method="POST">
                                @csrf
                                <input type="text" name="matricule">
                                <button type="submit">Search</button>
                            </form>
                            </div>
                       <div>
                        <a href="{{ url('/patient/create') }}" class="btn btn-success btn-sm" title="Add New patient">
                            <i class="fa fa-plus" aria-hidden="true"></i> ajouter un  patient
                        </a>
                       </div>
                        
                    </div>
                    <div class="card-body flex justify-between items-center">
                        <div class="overflow-x-auto">
                            @if ($patients->isEmpty())
                            <p class="text-lg text-red-700 ml-96">Aucun patient trouvé.</p>
                        @else
                            <table class="table-auto w-full">
                                <thead>
                                    <tr class="bg-gray-700 text-white text-sm">
                                        <th class="px-4 py-2">Matricule</th>
                                        <th class="px-4 py-2">Nom</th>
                                        <th class="px-4 py-2">Date de naissance</th>
                                        <th class="px-4 py-2">CIN</th>
                                        <th class="px-4 py-2">Poste</th>
                                        <th class="px-4 py-2">Service</th>
                                        <th class="px-4 py-2">Motif</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->matricule }}</td>
                                        <td class="border px-4 py-2">{{ $item->nom }}</td>
                                        <td class="border px-4 py-2">{{ $item->date_naissance }}</td>
                                        <td class="border px-4 py-2">{{ $item->cin }}</td>
                                        <td class="border px-4 py-2">{{ $item->poste }}</td>
                                        <td class="border px-4 py-2">{{ $item->service }}</td>
                                        <td class="border px-4 py-2">{{ $item->motif }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ url('/patient/' . $item->id) }}" title="View patient" class="text-green-600 hover:text-green-900">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ url('/patient/' . $item->id . '/edit') }}" title="Edit patient" class="text-green-600 hover:text-green-900 ml-2">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <form method="POST" action="{{ url('/patient' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2" title="Delete patient" onclick="return confirm(&quot;Confirm delete?&quot;)">
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
