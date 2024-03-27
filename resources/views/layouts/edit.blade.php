@extends('home')

@section('content1')
 
<div class="flex justify-center items-center h-screen">
  <div class="bg-white shadow-md rounded ml-20 px-14 pt-6 pb-8 mb-4 w-6/12"> 
    <h2 class="text-2xl mb-4">Modifier patient</h2>

    <div class="card-body">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach

      <form action="{{ url('patient/' . $patients->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $patients->id }}" />
        
        <div class="mb-4">
          <label for="matricule" class="block text-gray-700 text-sm font-bold mb-2">Matricule</label>
          <input type="text" name="matricule" id="matricule" value="{{ $patients->matricule }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('matricule')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
          <input type="text" name="nom" id="nom" value="{{ $patients->nom }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('nom')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-4">
            <label for="date_naissance" class="block text-gray-700 text-sm font-bold mb-2">date de naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" value="{{ $patients->date_naissance }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('date_naissance')
            <div class='text-red-500 text-xs italic'>{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <label for="cin" class="block text-gray-700 text-sm font-bold mb-2">cin</label>
            <input type="text" name="cin" id="cin" value="{{ $patients->cin }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('cin')
            <div class='text-red-500 text-xs italic'>{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <label for="poste" class="block text-gray-700 text-sm font-bold mb-2">poste</label>
            <input type="text" name="poste" id="poste" value="{{ $patients->poste }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('poste')
            <div class='text-red-500 text-xs italic'>{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <label for="service" class="block text-gray-700 text-sm font-bold mb-2">service</label>
            <input type="text" name="service" id="service" value="{{ $patients->service }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('service')
            <div class='text-red-500 text-xs italic'>{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <label for="motif" class="block text-gray-700 text-sm font-bold mb-2">motif</label>
            <input type="text" name="motif" id="motif" value="{{ $patients->motif }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('motif')
            <div class='text-red-500 text-xs italic'>{{ $message }}</div>
            @enderror
          </div>
          <div class="flex items-center justify-center mt-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">modifier</button>
          </div>
    </form>
   
  </div>
</div>
 
@stop