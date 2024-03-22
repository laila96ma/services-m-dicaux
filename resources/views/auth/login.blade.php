<x-guest-layout>
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            overflow: hidden;
        }
        .card-header {
            background-color: #4b5563;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .card-form {
            padding: 20px;
        }
        .form-input {
            background-color: #f3f4f6;
            border-radius: 5px;
            border: 1px solid #e5e7eb;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
        }
        .form-input:focus {
            outline: none;
            border-color: #667eea;
        }
        .form-label {
            font-weight: 500;
            color: #4b5563;
            margin-bottom: 5px;
            display: block;
        }
        .form-checkbox {
            color: #4b5563;
            display: inline-block;
            margin-right: 5px;
        }
        .form-button {
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .form-button:hover {
            background-color: #1e40af;
        }
    </style>
    
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Login</h2>
            </div>
            
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form class="card-form" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="form-label">Email</label>
                    <x-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div>
                    <label for="password" class="form-label">Password</label>
                    <x-input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="mt-4">
                    <label for="remember_me" class="form-checkbox">
                        <x-checkbox id="remember_me" name="remember" />
                        <span>Remember me</span>
                    </label>
                </div>

                <div class="flex justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <x-button class="form-button ml-4">
                        Log in
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
