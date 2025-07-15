<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}" />
  <script src="{{ asset('assets/js/all.min.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
       <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;1,600&display=swap" rel="stylesheet" />
<style>
  :root {
    font-family: 'Source Sans Pro';
  }
  main#dashboard-main::-webkit-scrollbar {
    width: 8px;
    height: 8px;
  }
  main#dashboard-main::-webkit-scrollbar-thumb {
    border-radius: 9999px;
    background-color: rgb(156 163 175 / 0.75);
  }
  main#dashboard-main::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px rgb(156 163 175 / 0.75);
    border-radius: 10px;
  }
</style>

<div class="bg-slate-200 flex h-screen">
 
@include("layouts.Admin-Sidebar")
 
  <!-- /Sidebar -->

  <div class="flex h-full w-full flex-col">
    <!-- Navbar -->
  @include("layouts.navigation")
    <!-- /Navbar -->

    <!-- Main -->
      <!-- Content -->
    <div class="h-full overflow-hidden pt-20" style="">
      <main id="dashboard-main" class="h-[calc(100vh-10rem)] overflow-auto px-4 py-10">
        {{ $slot }}
      </main>
    </div>
    
  </div>
</div>

    </body>
</html>
