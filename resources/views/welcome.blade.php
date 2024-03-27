<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services Médicaux</title>
   
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
 
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:px-6 sm:py-4 sm:flex sm:justify-between sm:items-center">
            @auth
                <a href="{{ url('/patient') }}" class="text-sm text-gray-700 dark:text-gray-500 w-36 sm:right-14 ">home</a>
            @else
            <button type="submit" class=" bg-lime-600 hover:bg-lime-800 w-28">
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500  text-decoration-none ">login</a>
            </button>
                
                @if (Route::has('register'))
                <button type="submit" class=" bg-lime-600 hover:bg-lime-800 w-28">
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 sm:right-72 ">register</a>
                </button>
                    @endif
            @endauth
        </div>
    @endif

   
    <div class="w-2/3 mt-44 ml-44">
        <div class="bg-white shadow-md rounded-md p-8">
            <div class="md:flex">
               
                <div class="md:w-2/4 md:mr-4">
                    <h5 class="text-lg font-semibold mb-4 ml-28 text-green-700 ">À propos nous</h5>
                    <p class="text-gray-700">À Phosbucraa, notre mission est claire : offrir des solutions de gestion
                        des services médicaux efficaces et adaptées à notre communauté. En mettant l'accent sur l'innovation et 
                        l'accessibilité, nous travaillons sans relâche pour garantir une coordination fluide des soins, une
                        optimisation des ressources et une expérience patient exceptionnelle. Notre engagement envers l'excellence opérationnelle et notre dévouement envers la santé de nos concitoyens nous animent chaque jour.
                        Ensemble, nous façonnons l'avenir des soins de santé à Phosbucraa.</p>
                </div>
              
                <div class="md:w-2/4 mt-4 md:mt-0">
                    <img src="/images/homeImage.jpg" class="w-full rounded-lg" alt="Image d'accueil">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
