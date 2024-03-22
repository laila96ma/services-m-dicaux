<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-gray-100 text-base text-gray-700">
    @auth
    <div class="fixed top-5 right-2 z-30 flex items-center">
        <p class="to-stone-950">{{ Auth::user()->name }}</p>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="text-white bg-green-600 ml-4 border-lime-600">Logout</button>
        </form>
    </div>
@endauth
    <div class="fixed top-5 left-5 z-30">
        <img src="/images/logo-ocp-removebg-preview.png" alt="Logo" width="100" height="100" class="mr-4">
    </div>
    @auth
    <div class="text-white">{{ Auth::user()->name }}</div>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="text-white">Logout</button>
    </form>
@endauth
    <div class="flex min-h-screen">
        <div class="fixed top-0 left-0 w-full h-16">
            <a href="#0" class="text-white px-4 py-2 flex items-center">
                <i class="fa fa-bars"></i>
            </a>
            <nav class="fixed top-0 left-0 h-full w-64 bg-slate-800  overflow-hidden transition-all duration-300 ease-in-out">
                <ul class="mt-44">
                    <li>
                        <a href="/patient" class="flex items-center text-white px-4 py-2  hover:bg-slate-900">
                            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                              </svg>
                              
                            <span class="text-lg ml-3">patient</span>
                        </a>
                    </li>
                    <li class="mt-5">
                        <a href="{{ url('/dossierMedicaux') }}" class="flex items-center text-white px-4 py-2 hover:bg-slate-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                              </svg>
                              
                              
                            <span class="text-lg ml-3">dossier Medicaux</span>
                        </a>
                    </li>
                    <li class="mt-5">
                        <a href="{{ url('/RDV') }}" class="flex items-center text-white px-4 py-2 hover:bg-slate-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                              </svg>
                              
                              
                              
                            <span class="text-lg ml-3">rendez-vous</span>
                        </a>
                    </li>
                    <li class="mt-5">
                        <a href="{{ url('salleAttente') }}" class="flex items-center text-white px-4 py-2 hover:bg-slate-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                              </svg>
                              
                            <span class="text-lg ml-3">salle d'attente</span>
                        </a>
                    </li>
                    <li class="mt-5">
                        <a href="{{ url('rapportMed') }}" class="flex items-center text-white px-4 py-2 hover:bg-slate-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                              </svg>
                              
                            <span class="text-lg ml-3">rapports médicaux</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <main class="flex-1 p-8">
            <div class="container mx-auto">
                @yield('content1')
            </div>
        </main>
    </div>
</body>
</html>
