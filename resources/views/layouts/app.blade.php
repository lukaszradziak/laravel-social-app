<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
    >

    <!-- Styles -->
    <link
        rel="stylesheet"
        href="{{ mix('css/app.css') }}"
    >

    @livewireStyles

    <!-- Scripts -->
    <script
        src="{{ mix('js/app.js') }}"
        defer
    ></script>
</head>

<body class="font-sans antialiased app-layout">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
            @if ($leftMenu)
                @include('left-menu')
            @endif

            <!-- Page Content -->
            <main class="lg:col-span-9 xl:col-span-10 @if ($leftMenu) py-12 @endif pt-20">
                @if (session('success'))
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        class="rounded-md bg-green-50 p-4 mb-4"
                    >
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: solid/check-circle -->
                                <svg
                                    class="h-5 w-5 text-green-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    {{ __(session('success')) }}
                                </p>
                            </div>
                            <div class="ml-auto pl-3">
                                <div class="-mx-1.5 -my-1.5">
                                    <button
                                        @click="show = false"
                                        type="button"
                                        class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600"
                                    >
                                        <span class="sr-only">Dismiss</span>
                                        <!-- Heroicon name: solid/x -->
                                        <svg
                                            class="h-5 w-5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
