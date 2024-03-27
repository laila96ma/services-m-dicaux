<x-guest-layout>
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
          
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
        @media screen and (max-width: 768px) {
            .login-container {
                margin-top: 60px; 
            }
            
        }
    </style>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Register</h2>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
            <x-validation-errors class="mb-4" />
            <form class="card-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="form-label" />
                    <x-input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    @error('name')
                        <div class='text-danger'>{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <x-label for="role" value="{{ __('Role') }}" class="form-label" />
                    <select id="role" class="form-input" name="role" required autocomplete="role">
                        <option value="médecin">médecin</option>
                        <option value="sécrétariat">sécrétariat</option>
                        <option value="assistance médicale">assistance médicale</option>
                    </select>
                    
                    
                    @error('role')
                    <div class='text-danger'>{{$message}}</div>
                @enderror

                </div>
                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" class="form-label" />
                    <x-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    @error('email')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
                </div>
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="form-label" />
                    <x-input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
                </div>
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="form-label" />
                    <x-input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
                @endif
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-button class="form-button ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
