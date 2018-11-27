@extends('layouts.painel')
@section('title', 'Meu painel')

@section('content')
<h1>{{$title}}</h1>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TÍTULO</th>
            <th scope="col">PÁGINAS</th>
            <th scope="col">VALOR</th>
            <th scope="col">ANDAMENTO</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projetos as $projeto)
        <tr>            
            <td><a href="{{route('projetos.show',$projeto->id)}}">{{$projeto->id}}</a></td>
            <td><a href="{{route('projetos.show',$projeto->id)}}">{{$projeto->titulo}}</a></td>
            <td><a href="{{route('projetos.show',$projeto->id)}}">{{$projeto->paginas}} Págs.</a></td>
            <td><a href="{{route('projetos.show',$projeto->id)}}">R$ {{number_format($projeto->valor, 2, ',', '.')}}</a></td>
            <td>
                <div class="single-skill">                        
                    <div class="skill" data-width="{{$projeto->statusProj->porcentagem}}"></div>
                    Completo {{$projeto->statusProj->porcentagem}}%                    
                </div>
            </td>
            <td>                
                <a href="{{route('painel.projetos.show',$projeto->id)}}" class="btn btn-info" title="Visualizar" class="actions view">Vizualizar</a>
            
                @if($projeto->pago == 0)
                <a href="{{route('site.pagamento',$projeto->id)}}" class="btn btn-success" title="Realizar pagamento" class="actions view">Pagamento</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $projetos->links("pagination::bootstrap-4") !!}	

@endsection
