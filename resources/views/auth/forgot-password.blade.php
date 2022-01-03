<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Olvidaste tu contraseña</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon2.png') }}">
    <style>
        .efectoButton {
            transition: 0.5s;
        }

        .efectoButton:hover {
            transform: scale(1.1);
            background-color: darkgreen;
            -webkit-box-shadow: 3px 10px 56px 10px rgba(0, 0, 0, 0.72);
            -moz-box-shadow: 3px 10px 56px 10px rgba(0, 0, 0, 0.72);
            box-shadow: 3px 10px 56px 10px rgba(0, 0, 0, 0.72);
        }

        @font-face {
            font-family: 'Ubuntu', sans-serif;
        }

        .fuente {
            font-family: 'Ubuntu', sans-serif;
        }

        .movimiento {
            animation: movimiento 10s ease-in-out infinite;
            /*animation: name duration timing-function delay iteration-count direction fill-mode;*/
        }

        @keyframes movimiento {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(30px);
            }

            100% {
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <section class="min-h-screen flex items-stretch text-white ">
        <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center"
            style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);">
            <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            <div class="w-full px-24 z-10">
                <h1 class="fuente text-5xl font-bold text-left tracking-wide movimiento">Urbanización <br> Los Pinos
                </h1>
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0"
            style="background-color: #161616;">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center"
                style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20 text-white item-center">
                <p class="fuente pb-2 pt-4 mb-4 text-white font-medium text-center text-4xl font-bold">Olvidaste tu
                    contraseña
                </p>
                <div class="mb-4 text-sm text-white">
                    {{ __('¿Olvidaste tu contraseña?No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.') }}
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-white">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="block">
                        <label class="fuente w-full text-sm text-white pb-2 pt-4">Correo electrónico</label>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus placeholder='Escriba su correo electrónico' />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button>
                            {{ __('Enviar enlace de restablecimiento de contraseña') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
