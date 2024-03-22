<div class="container mt-24 ml-14">
    <div class="flex justify-center">
      <div class="w-full  md:w-3/4 lg:w-1/2">
        <div class="bg-white shadow-md rounded-lg px-8 py-6 mb-8">
          <div class="text-2xl font-bold mb-6 text-center text-lime-700">les informations d'un rendez-vous </div>
          <div class="ml-5">
                    <p class="text-gray-700 text-lg">numéro  : {{ $RDV->num }}</p>
                    <p class="text-gray-700 text-lg">date de rendez-vous  : {{ $RDV->date_RDV }}</p>
                    <p class="text-gray-700 text-lg">type de rendez-vous : {{ $RDV->type_RDV  }}</p>
                    <p class="text-gray-700 text-lg">nom de patient: {{ $RDV->patient->matricule }}</p>
                    <p class="text-gray-700 text-lg">prenom de patient : {{ $RDV->patient->nom }}</p>
                    <p class="text-gray-700 text-lg">poste de patient: {{ $RDV->patient->poste }}</p>
                    <p class="text-gray-700 text-lg">service de patient: {{ $RDV->patient->service }}</p>
                    <p class="text-gray-700 text-lg">motif de patient: {{ $RDV->patient->motif }}</p>
                   
                </div>
              </div>
            </div>
          </div>
        </div>


       