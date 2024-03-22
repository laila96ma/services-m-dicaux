<div class="container mt-24 ml-14">
    <div class="flex justify-center">
      <div class="w-full  md:w-3/4 lg:w-1/2">
        <div class="bg-white shadow-md rounded-lg px-8 py-6 mb-8">
          <div class="text-2xl font-bold mb-6 text-center text-lime-700">les informations d'un rapport médicale </div>
          <div class="ml-5">
           
              <p class="text-lg text-lime-800">nom de patient: {{ $patient->matricule }}</p>
              <p class="text-lg text-lime-800">prenom de patient : {{ $patient->nom }}</p>
              <p class="text-lg text-lime-800">poste de patient: {{ $patient->poste }}</p>
              <p class="text-lg text-lime-800">service de patient: {{ $patient->service }}</p>
              <p class="text-lg text-lime-800">motif de patient: {{ $patient->motif }}</p>
              <p class="text-lg text-lime-800">antécédents médicaux : {{ $patient->dossierMedicaux->first()->antécédents_médicaux }}</p>
              <p class="text-lg text-lime-800">allergies : {{ $patient->dossierMedicaux->first()->allergies }}</p>
              <p class="text-lg text-lime-800">maladie : {{ $patient->dossierMedicaux->first()->maladie }}</p>
              <p class="text-lg text-lime-800">médicament : {{ $patient->dossierMedicaux->first()->médicament }}</p>
              <p class="text-lg text-lime-800">analyse : {{ $patient->dossierMedicaux->first()->analyse }}</p>
              <p class="text-lg text-lime-800">nombre de jours de repos : {{ $patient->dossierMedicaux->first()->nbr_repos }}</p>
              <p class="text-lg text-lime-800">date de rendez-vous : {{ $patient->RDV->first()->date_RDV }}</p>
              
              </div>
            </div>
          </div>
        </div>
      </div>
   
                    