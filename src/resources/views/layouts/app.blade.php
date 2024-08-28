<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | {{ $title ?? '' }}</title>

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>

    {{-- Body --}}
    <body class="bg-white">
        {{-- Header --}}
        <x-header />
        {{-- ./Header --}}

        {{-- Main Container --}}
        <div class="container-fluid main-container">
            {{-- Main Row --}}
            <div class="row">
                {{-- Sidebar --}}
                <x-sidebar />
                {{-- ./Sidebar --}}

                {{-- Main --}}
                <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4">
                    {{-- Page Name --}}
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ __('Dashboard') }}</h1>
                    </div>
                    {{-- ./Page Name --}}

                    {{-- Content --}}
                    <div class="container-fluid px-0">
                        <div class="row row-cols-1">
                            {{ $slot }}
                        </div>
                    </div>
                    {{-- ./Content --}}
                </main>
                {{-- ./Main --}}
            </div>
            {{-- ./Main Row --}}
        </div>
        {{-- ./Main Container --}}
    </body>
    {{-- ./Body --}}
</html>
