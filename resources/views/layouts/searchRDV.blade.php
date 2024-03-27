@extends('home')

@section('content1')
<div class="flex justify-center items-center h-screen ml-60">
    <div class="container mx-auto ">
        <div class="card w-full overflow-hidden">

            <div class="md:col-span-2 col-span-12 ">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-30 col-span-12">
                        <h3  class="liste text-lime-700 font-bold"> liste des rendez-vous </h3>
                        <div class="text-green-500 text-lg mb-4 flex justify-between mt-7">
                            <div>
                                <form action="{{ url('searchRDV') }}" method="POST">
                                    @csrf
                                    <input type="text" name="matricule">
                                    <button type="submit">Search</button>
                                </form></div>
                               <div>
                                <a href="{{ url('/RDV/create') }}" class="btn btn-success btn-sm" title="Add New rendez-vous">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New rendez-vous
                                </a>
                               </div>
                                
                            </div>
                            <div class="card-body flex justify-between items-center">
                                <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr class="bg-gray-700  text-white text-sm">
                                       <th class="px-1 py-2">numéro de patient</th>
                                        <th class="px-1 py-2">date de rendez-vous</th>
                                        <th class="px-1 py-2">type de rendez-vous</th>
                                        <th class="px-1 py-2">matricule de patient</th>
                                        <th class="px-1 py-2">nom de patient</th>
                                        <th class="px-1 py-2">poste de patient</th>
                                        <th class="px-1 py-2">service de patient</th>
                                        <th class="px-1 py-2">Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($RDV as $item)
                                    <tr>
                                        <td class="border px-1 py-2">{{ $item->num }}</td>
                                        <td class="border px-1 py-2">{{ $item->date_RDV }}</td>
                                        <td class="border px-1 py-2">{{ $item->type_RDV }}</td>
                                        <td class="border px-1 py-2">{{ $item->matricule }}</td>
                                        <td class="border px-1 py-2">{{ $item->nom }}</td>
                                        <td class="border px-1 py-2">{{ $item->poste }}</td>
                                        <td class="border px-1 py-2">{{ $item->service }}</td>
                                        <td class="border px-4 py-2">
                                                <a href="{{ url('/RDV/' . $item->id) }}" title="View RDV" class="text-green-600 hover:text-green-900">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/RDV/' . $item->id . '/edit') }}" title="Edit RDV" class="text-green-600 hover:text-green-900 ml-2">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <form method="POST" action="{{ url('/RDV' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2" title="Delete RDV" onclick="return confirm(&quot;Confirm delete?&quot;)">
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