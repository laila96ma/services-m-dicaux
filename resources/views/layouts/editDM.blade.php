@extends('home')

@section('content1')

<div class="flex justify-center items-center h-screen">
  <div class="bg-white shadow-md rounded ml-20 px-14 pt-6 pb-8 mb-4 w-6/12">
    <h2 class="text-2xl mb-4">modifier dossier médical</h2>

    <div class="card-body">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach

      <form action="{{ url('dossierMedicaux/' .$dossierMedicaux->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $dossierMedicaux->id }}" />

        <div class="mb-4">
          <label for="antécédents_médicaux" class="block text-gray-700 text-sm font-bold mb-2">Antécédents médicaux</label>
          <input type="text" name="antécédents_médicaux" id="antécédents_médicaux" value="{{ $dossierMedicaux->antécédents_médicaux }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('antécédents_médicaux')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="allergies" class="block text-gray-700 text-sm font-bold mb-2">Allergies</label>
          <input type="text" name="allergies" id="allergies" value="{{ $dossierMedicaux->allergies }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('allergies')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="maladie" class="block text-gray-700 text-sm font-bold mb-2">Maladie</label>
          <input type="text" name="maladie" id="maladie" value="{{ $dossierMedicaux->maladie }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('maladie')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="médicament" class="block text-gray-700 text-sm font-bold mb-2">Médicament</label>
          <input type="text" name="médicament" id="médicament" value="{{ $dossierMedicaux->médicament }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('médicament')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="analyse" class="block text-gray-700 text-sm font-bold mb-2">Analyse</label>
          <input type="text" name="analyse" id="analyse" value="{{ $dossierMedicaux->analyse }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('analyse')
          <div class='text-red-500 text-xs italic'>{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="repos">Repos</label>
          <input type="radio" name="repos" id="repos_oui" value="oui" {{ $dossierMedicaux->repos === 'oui' ? 'checked' : '' }} class="mr-2 leading-tight focus:outline-none focus:shadow-outline">
          <label class="mr-4" for="repos_oui">Oui</label>
          <input type="radio" name="repos" id="repos_non" value="non" {{ $dossierMedicaux->repos === 'non' ? 'checked' : '' }} class="mr-2 leading-tight focus:outline-none focus:shadow-outline">
          <label for="repos_non">Non</label>
          @error('repos')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div id="nombre_repos_div" class="mb-4" style="{{ $dossierMedicaux->repos === 'oui' ? '' : 'display: none;' }}">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="nbr_repos">Nombre de jours de repos</label>
          <input type="text" name="nbr_repos" id="nbr_repos" value="{{ $dossierMedicaux->nbr_repos }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('nbr_repos')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="patientID">Sélectionnez un patient</label><br>
          <select name="patientID" id="patientID" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="" disabled>-- Sélectionnez un patient --</option>
            @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ $patient->id == $dossierMedicaux->patientID ? 'selected' : '' }}>{{ $patient->matricule }} - {{ $patient->nom }} - {{ $patient->poste }} - {{ $patient->service }} - {{ $patient->motif }}</option>
            @endforeach
          </select>
        </div>


        <div class="flex items-center justify-center mt-4">
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">modifier</button>
        </div>
      </form>

    </div>
  </div>
</div>
<script>
  document.querySelectorAll('input[name="repos"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
      var nombreReposDiv = document.getElementById('nombre_repos_div');
      if (this.value === 'oui') {
        nombreReposDiv.style.display = 'block';
      } else {
        nombreReposDiv.style.display = 'none';
      }
    });
  });
</script>

@stop
