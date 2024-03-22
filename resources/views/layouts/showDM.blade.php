@extends('home')

@section('content1')

<div class="container mt-24 ml-14">
  <div class="flex justify-center">
    <div class="w-full  md:w-3/4 lg:w-1/2">
      <div class="bg-white shadow-md rounded-lg px-8 py-6 mb-8">
        <div class="text-2xl font-bold mb-6 text-center text-lime-700">les informations d'un dossier médicale </div>
        <div class="ml-5">
                  @if($dossierMedicaux)
                    <p class="text-gray-700 text-lg">antécédents médicaux : {{ $dossierMedicaux->date_dossierMedicaux }}</p>
                    <p class="text-gray-700 text-lg">allergies  : {{ $dossierMedicaux->allergies }}</p>
                    <p class="text-gray-700 text-lg">médicament : {{ $dossierMedicaux->médicament  }}</p>
                    <p class="text-gray-700 text-lg">maladie : {{ $dossierMedicaux->maladie  }}</p>
                    <p class="text-gray-700 text-lg">analyse : {{ $dossierMedicaux->analyse  }}</p>
                    <p class="text-gray-700 text-lg">nombre de jours de repos : {{ $dossierMedicaux->nbr_repos  }}</p>
                   
                    @if ($patient)
                    <p class="text-gray-700 text-lg">nom de patient: {{ $patient->matricule }}</p>
                    <p class="text-gray-700 text-lg">prenom de patient : {{ $patient->nom }}</p>
                    <p class="text-gray-700 text-lg">poste de patient: {{ $patient->poste }}</p>
                    <p class="text-gray-700 text-lg">service de patient: {{ $patient->service }}</p>
                    <p class="text-gray-700 text-lg">motif de patient: {{ $patient->motif }}</p>
                  @else
                    <p>Aucun patient associée à ce dossier médicale.</p>
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
      