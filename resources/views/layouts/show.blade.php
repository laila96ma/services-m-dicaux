@extends('home')

@section('content1')

<div class="container mt-24 ml-14">
  <div class="flex justify-center">
    <div class="w-full  md:w-3/4 lg:w-1/2">
      <div class="bg-white shadow-md rounded-lg px-8 py-6 mb-8">
        <div class="text-2xl font-bold mb-6 text-center text-lime-700">Informations sur le patient</div>
        <div class="ml-5">
          <p class="text-gray-700 text-lg">Nom : {{ $patients->matricule }}</p>
          <p class="text-gray-700 text-lg">Prénom : {{ $patients->nom }}</p>
          <p class="text-gray-700 text-lg">Date de naissance : {{ $patients->date_naissance }}</p>
          <p class="text-gray-700 text-lg">CIN : {{ $patients->cin }}</p>
          <p class="text-gray-700 text-lg">Poste : {{ $patients->poste }}</p>
          <p class="text-gray-700 text-lg">Service : {{ $patients->service }}</p>
          <p class="text-gray-700 text-lg">Motif : {{ $patients->motif }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
