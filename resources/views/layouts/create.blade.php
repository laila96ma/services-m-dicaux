@extends('home')

@section('content1')

<div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-md rounded ml-20 px-14 pt-6 pb-8 mb-4 w-6/12">
        <h2 class="text-2xl mb-4 text-center">Créer un patient</h2>

        @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('patient') }}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="matricule">Matricule</label>
                <input type="text" name="matricule" value="{{old('matricule')}}" id="matricule" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('matricule')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">Nom</label>
                <input type="text" name="nom" id="nom" value="{{old('nom')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('nom')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_naissance">Date de naissance</label>
                <input type="date" name="date_naissance" value="{{old('date_naissance')}}" id="date_naissance" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('date_naissance')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="cin">cin</label>
              <input type="text" name="cin" id="cin" value="{{old('cin')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              @error('cin')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="poste">poste</label>
            <input type="text" name="poste" id="poste" value="{{old('poste')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('poste')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="service">service</label>
          <input type="text" name="service" id="service" value="{{old('service')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('service')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="motif">motif</label>
        <input type="text" name="motif" id="motif" value="{{old('motif')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('motif')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
        
    <div class="flex items-center justify-center mt-4">
      <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
  </div>
    </form>
   
  </div>
</div>
 
@stop