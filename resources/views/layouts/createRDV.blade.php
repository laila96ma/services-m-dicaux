@extends('home')

@section('content1')
 
<div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-md rounded ml-20 px-14 pt-6 pb-8 mb-4 w-6/12">
        <h2 class="text-2xl mb-4 text-center">crée un rendez-vous</h2>
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
      <form action="{{ url('RDV') }}" method="post">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="num">numéro de rendez-vous</label>
          <input type="text" name="num" id="num" value="{{old('num')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('num')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
          @enderror
      </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="date_RDV">date de rendez-vous</label>
        <input type="datetime-local" name="date_RDV" id="date_RDV" value="{{old('date_RDV')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('date_RDV')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="type_RDV">type de rendez-vous</label></br>
        <input type="text" name="type_RDV" id="type_RDV" value="{{old('type_RDV')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></br>
        @error('type_RDV')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="patientID">Sélectionnez un patient</label></br>
        <select name="patientID" id="patientID" value="{{old('patientID')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="" disabled selected>-- Sélectionnez un patient --</option>
            @foreach($patients as $patient)
            <option value="{{ $patient->id }}">{{ $patient->matricule }}-{{ $patient->nom }} - {{ $patient->poste }} - {{ $patient->service }}-{{ $patient->motif }}</option>
            @endforeach
        </select>
    </div>
        
      
    <div class="flex items-center justify-center mt-4">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
    </div>
    </form>
   
  </div>
</div>

@stop
 
  