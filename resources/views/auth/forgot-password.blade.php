


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .text-sm {
            font-size: 0.875rem;
            color: #4a5568;
        }
        .mb-4 {
            margin-bottom: 1rem;
        }
        .text-gray-600 {
            color: #718096;
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

        @media(max-width: 425px){
            .container {
                max-width: 300px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>
<body>
<div style="margin-top: 200px;" class="container">

    <!-- Session Status -->
    <div class="mb-4">
        <!-- Assuming session status message is handled here -->
        <p id="session-status" class="text-sm text-green-600">
            <!-- Placeholder for session status -->
        </p>
    </div>

    <form  style="margin: 20px 40px;" method="POST" action="{{ route('password.email') }}">
        <div style="text-align: center">
            <img  style="object-fit: cover; height: 40px; scale: 2; margin-left: 30px; margin-top: 50px; margin-bottom: 50px;" src="{{asset('backend/logo.svg')}}" />

        </div>
        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        @csrf
        <!-- CSRF Token -->
        {{--        <input type="hidden" name="_token" value="your-csr">--}}

        <!-- Email Address -->
        <div  >
            <div class="text-center"  style="color: green; font-weight: bolder">
                {{session('status')}}
            </div>
            <label for="email" class="input-label">Email</label>
            <input id="email" class="text-input block mt-1 w-full" type="email" name="email" required autofocus>
            <p class="input-error mt-2">
                <!-- Placeholder for error message -->
            </p>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="button">
                Email Password Reset Link
            </button>
        </div>
    </form>
</div>
</body>
</html>
