<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "{{asset('css/app.css')}}">
</head>
<body>
    @component('components.nav-bar', ['itens'=>$itens]) 
    @endcomponent   
    <h1>Layout pai</h1>
    @foreach($itens as $i)
        <p>{{$i}}</p>
    @endforeach
    @yield('mensagem')
    <script type = "text/javascript" src = "{{asset('js/app.js')}}"></script>
</body>
</html>