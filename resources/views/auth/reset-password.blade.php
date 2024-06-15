{{--<x-guest-layout>--}}
{{--    <form method="POST" action="{{ route('password.store') }}">--}}
{{--        @csrf--}}

{{--        <!-- Password Reset Token -->--}}
{{--        <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--        <h3 style="font-weight: bolder;">Reset Your Password</h3>--}}
{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input  id="email" class="block mt-1 w-full" type="hidden" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}
{{--            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <x-primary-button>--}}
{{--                {{ __('Reset Password') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            font-weight: bolder;
        }
        .block {
            display: block;
        }
        .mt-1 {
            margin-top: 0.25rem;
        }
        .w-full {
            width: 100%;
        }
        .mt-2 {
            margin-top: 0.5rem;
        }
        .mt-4 {
            margin-top: 1rem;
        }
        .flex {
            display: flex;
        }
        .items-center {
            align-items: center;
        }
        .justify-end {
            justify-content: flex-end;
        }
        .button {
            background-color: #3182ce;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #2b6cb0;
        }
        .input-label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .text-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
        }
        .input-error {
            color: #e53e3e;
            font-size: 0.875rem;
        }

    </style>
</head>
<body>
<div style="margin-top: 200px;" class="container">
    <form style="padding: 20px;" method="POST" action="{{ route('password.store') }}">

        <div style="text-align: center">
            <img  style="object-fit: cover; height: 40px; scale: 2; margin-left: 30px; margin-top: 50px; margin-bottom: 50px;" src="{{asset('backend/logo.svg')}}" />

        </div>
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <h3>Reset Your Password</h3>

        <!-- Email Address -->
        <div>
            <input id="email" class="block mt-1 w-full" type="hidden" name="email" value="{{ old('email', request()->email) }}" required autofocus autocomplete="username">
            <div class="input-error mt-2">
                <!-- Display validation error for email -->
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="input-label">Password</label>
            <input id="password" class="text-input block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
            <div class="input-error mt-2">
                <!-- Display validation error for password -->
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="input-label">Confirm Password</label>
            <input id="password_confirmation" class="text-input block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
            <div class="input-error mt-2">
                <!-- Display validation error for password_confirmation -->
                @if ($errors->has('password_confirmation'))
                    {{ $errors->first('password_confirmation') }}
                @endif
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="button">
                Reset Password
            </button>
        </div>
    </form>
</div>
</body>
</html>

