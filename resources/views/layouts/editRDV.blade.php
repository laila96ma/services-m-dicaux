@extends('home')

@section('content1')

<div class="flex justify-center items-center h-screen">
  <div class="bg-white shadow-md rounded ml-20 px-14 pt-6 pb-8 mb-4 w-6/12">
    <h2 class="text-2xl mb-4">modifier un rendez-vous </h2>

    <div class="card-body">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach

      <form action="{{ url('RDV/' .$RDV->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $RDV->id }}" />
        <div class="mb-4">
          <label for="num" class="block text-gray-700 text-sm font-bold mb-2">numéro de rendez-vous</label>
          <input type="text" name="num" id="num" value="{{ $RDV->num }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('num')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="date_RDV" class="block text-gray-700 text-sm font-bold mb-2">date de rendez-vous</label>
          <input type="datetime-local" name="date_RDV" id="date_RDV" value="{{ $RDV->date_RDV }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('date_RDV')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="type_RDV" class="block text-gray-700 text-sm font-bold mb-2">type de rendez-vous</label>
          <input type="text" name="type_RDV" id="type_RDV" value="{{ $RDV->type_RDV }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('type_RDV')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="patientID">Sélectionnez un patient</label><br>
          <select name="patientID" id="patientID" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="" disabled>-- Sélectionnez un patient --</option>
            @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ $patient->id == $RDV->patientID ? 'selected' : '' }}>{{ $patient->matricule }} - {{ $patient->nom }} - {{ $patient->poste }} - {{ $patient->service }} - {{ $patient->motif }}</option>
            @endforeach
          </select>
        </div>


        <div class="flex items-center justify-center mt-4">
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</button>
        </div>
      </form>

    </div>
  </div>
</div>
@stop
