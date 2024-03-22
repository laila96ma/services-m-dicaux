@extends('home')

@section('content1')
 
<div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-md rounded ml-20 px-14 pt-8 pb-8 mb-4 w-6/12 mt-60">
        <h2 class="text-2xl mb-4 text-center">Créer un dossier médical</h2>
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
      <form action="{{ url('dossierMedicaux') }}" method="post">
        @csrf
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="antécédents_médicaux">Antécédents médicaux</label>
        <input type="text" name="antécédents_médicaux" value="{{old('antécédents_médicaux')}}" id="antécédents_médicaux" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('antécédents_médicaux')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="allergies">allergies</label></br>
        <input type="text" name="allergies" id="allergies" value="{{old('allergies')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></br>
        @error('allergies')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="médicament">médicament</label></br>
        <input type="text" name="médicament" id="médicament" value="{{old('médicament')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></br>
        @error('médicament')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="maladie">maladie</label></br>
        <input type="text" name="maladie" id="maladie" value="{{old('maladie')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></br>
        @error('maladie')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="analyse">analyse</label></br>
        <input type="text" name="analyse" id="analyse" value="{{old('analyse')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></br>
        @error('analyse')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="repos">Repos</label>
        <input type="radio" name="repos" id="repos_oui"  value="oui" class="mr-2 leading-tight focus:outline-none focus:shadow-outline">
        <label class="mr-4" for="repos_oui">Oui</label>
        <input type="radio" name="repos" id="repos_non" value="non" class="mr-2 leading-tight focus:outline-none focus:shadow-outline">
        <label for="repos_non">Non</label>
        @error('repos')
        <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
    </div>
    <div id="nombre_repos_div" class="mb-4" style="display: none;">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nbr_repos">Nombre de jours de repos</label>
        <input type="text" name="nbr_repos" id="nbr_repos" value="{{old('nbr_repos')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('nbr_repos')
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