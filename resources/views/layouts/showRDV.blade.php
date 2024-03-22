@extends('home')

@section('content1')

<div class="container mt-24 ml-14">
  <div class="flex justify-center">
    <div class="w-full  md:w-3/4 lg:w-1/2">
      <div class="bg-white shadow-md rounded-lg px-8 py-6 mb-8">
        <div class="text-2xl font-bold mb-6 text-center text-lime-700">les informations d'un rendez-vous </div>
        <div class="ml-5">
                  @if($RDV)
                  <p class="text-gray-700 text-lg">numéro  : {{ $RDV->num }}</p>
                    <p class="text-gray-700 text-lg">date de rendez-vous  : {{ $RDV->date_RDV }}</p>
                    <p class="text-gray-700 text-lg">type de rendez-vous : {{ $RDV->type_RDV  }}</p>
                   
                    @if ($patient )
                    <p class="text-gray-700 text-lg">nom de patient: {{ $patient->matricule }}</p>
                    <p class="text-gray-700 text-lg">prenom de patient : {{ $patient->nom }}</p>
                    <p class="text-gray-700 text-lg">poste de patient: {{ $patient->poste }}</p>
                    <p class="text-gray-700 text-lg">service de patient: {{ $patient->service }}</p>
                    <p class="text-gray-700 text-lg">motif de patient: {{ $patient->motif }}</p>
                  @else
                    <p>Aucun patient  associée à ce dossier médicale.</p>
                  @endif
                  @else
                    <p>Aucun dossier médicale  trouvée.</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      
      @stop
      