<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    
        <title>Gorilles - Test Technique</title>
        
        <script src="/js/app.js"></script>
        @section('js') @show
    </head>
    
    <body>
        @include('_layout.includes.menu')
        
        <h1>@yield('title')</h1>
        
        <main>
            @section('content') @show
        </main>
    </body>
</html>