<h1>Produtos</h1>

@if(isset($produtos))
    <ol>
    @foreach($produtos as $p)
        <li>{{$p['id']}} - {{$p['nome']}}</li>         
    @endforeach
    </ol>

    @if(count($produtos) == 0)
        <p>Temos 0 produtos</p>
    @elseif(count($produtos) == 1)
        <p>Temos 1 produto</p>
    @else
        <p>Temos muitos produtos</p>
    @endif

@else
    <p>Erro</p>
@endif