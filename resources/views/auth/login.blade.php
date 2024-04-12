<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet'
        type='text/css'>

    <style>
        body,
        input,
        textarea,
        select {
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            color: #4c4c4c;
        }

        p {
            font-size: 12px;
            width: 150px;
            display: inline-block;
            margin-left: 18px;
        }

        h1 {
            font-size: 32px;
            font-weight: 300;
            color: #4c4c4c;
            text-align: center;
            padding-top: 10px;
            margin-bottom: 10px;
        }

        html {
            background-color: #ffffff;
        }

        .testbox {
            margin: 20px auto;
            width: 343px;
            height: 464px;
            -webkit-border-radius: 8px/7px;
            -moz-border-radius: 8px/7px;
            border-radius: 8px/7px;
            background-color: #ebebeb;
            -webkit-box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
            -moz-box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
            box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
            border: solid 1px #cbc9c9;
        }

        input[type=radio] {
            visibility: hidden;
        }

        form {
            margin: 0 30px;
        }
    </style>
</head>

<body>
    <div class="testbox">
        <h1>Registration</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" /> <br>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" /> <br>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" /> <br>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" /> <br>
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </div>
</body>

</html>
