@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard Admin</div>
            <div class="container">
                @component('components.who')
                @endcomponent
                <br>
                <h2>Verificar fases de projetos atuais</h2>
                <br>
                @foreach($statusProjs as $statusProj)
                <a href="{{route('admin.projetos.fase',$statusProj->id)}}" class="btn btn-primary">Visualizar</a>

                {{$statusProj->nome}}
                <b class="text-success">{{$plano = App\Projeto::where('status_projs_id', $statusProj->id)->count()}} Projetos</b>               

                <br><br>


                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
