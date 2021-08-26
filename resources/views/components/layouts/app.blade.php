<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/cascadia-code.min.css">

    {{-- Styles --}}
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
</head>
<body class="antialiased" style="font-family: 'Cascadia Code', sans-serif;">
    <div id="app" class="w-full min-h-screen">
        <header class="flex w-full h-20 px-5 border-b border-gray-300 shadow-sm">
            <div class="my-auto">
                <a
                    href="{{ route('home') }}"
                    class="{{ Route::is('home') ? '' : 'hover:text-black' }}"
                >
                    {{ __('Home') }}
                </a>
            </div>

            <nav class="flex w-full h-full justify-center">
                <div class="flex w-1/2">
                    <div class="flex items-center px-5">
                        <a
                            href="{{ route('cart') }}"
                            class="{{ Route::is('cart') ? '' : 'text-gray-500 hover:text-black' }}"
                        >
                            {{ __('Cart Livewire') }}
                        </a>
                    </div>
                    <div class="flex items-center px-5 ml-5">
                        <a
                            href="{{ route('cart-with-alpinejs') }}"
                            class="{{ Route::is('cart-with-alpinejs') ? '' : 'text-gray-500 hover:text-black' }}"
                        >
                            {{ __('Cart Livewire + Alpine') }}
                        </a>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="w-full min-h-screen mt-5">
                <div class="max-w-5xl mx-auto">
                    <div class="w-full">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Scripts --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>
</html>
