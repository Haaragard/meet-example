<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - {{ config('app.name') }}</title>

    {{-- Styles --}}
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
</head>
<body class="antialiased">
    <div id="app" class="w-full min-h-screen">
        <header class="w-full h-28 px-5 border-b border-gray-300">
            <nav class="flex w-full h-full">
                <div class="flex justify-between my-auto">
                    <a
                        href="{{ route('home') }}"
                        class="py-5 px-7 {{ url()->current('home') ? 'bg-gray-200 text-gray-500' : 'bg-gray-300 hover:bg-gray-200 text-black hover:text-gray-500' }}"
                    >Home</a>
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
