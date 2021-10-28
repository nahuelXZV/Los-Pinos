<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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
                <h1 class="text-5xl font-bold text-left tracking-wide">Urbanización <br> Los Pinos </h1>
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0"
            style="background-color: #161616;">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center"
                style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">
                <p class="pb-2 pt-4 mb-4 text-white font-medium text-center text-4xl font-bold">Iniciar sesión</p>
                <form action="{{ route('login') }}" method="POST" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                    @csrf

                    <label class="w-full text-xl text-white pb-2 pt-4">Usuario</label>
                    <div class="pb-2 pt-4">
                        <input type="email" name="email" id="email" :value="old('email')" required autofocus
                            placeholder="Escribe Tu Correo Electrónico"
                            class="block w-full p-4 text-lg rounded-sm bg-black">
                    </div>

                    <label class="w-full text-xl text-white pb-2 pt-4">Contraseña</label>
                    <div class="pb-2 pt-4">
                        <input class="block w-full p-4 text-lg rounded-sm bg-black" type="password" name="password"
                            id="password" required autocomplete="current-password" placeholder="Escribe Tu Contraseña">
                    </div>

                    <div class="text-right">
                        <input type="checkbox" name="remember" id="remember" class="mr-2 "> <label
                            for="remember" class="text-sm text-grey-dark hover:text-gray-100">Recuerdame</label>

                        @if (Route::has('password.request'))
                            <a class="ml-20 text-sm text-grey-dark hover:underline cursor-pointer hover:text-gray-100"
                                href="{{ route('password.request') }}">
                                Olvidaste Tu Contraseña?
                            </a>
                        @endif
                    </div>

                    <div class="px-4 pb-2 pt-4">
                        <button
                            class="uppercase block w-full p-4 text-lg rounded-full bg-indigo-500 hover:bg-indigo-600 focus:outline-none">
                            Entrar</button>
                    </div>

                    <div class="p-4 text-center right-0 left-0 flex justify-center space-x-4 mt-16 lg:hidden ">

                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
