@extends('layouts.site')
@section('title', 'Criar projeto')

@section('content')
<!-- start banner Area -->
<section class="relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Criar projeto		
                </h1>	
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->
<div class="sample-text-area">
    <div class="container">

        @if(session()->has('message'))
        <div class="alert alert-danger ">
            {{ session()->get('message') }}
        </div>
        @endif
        <h1 >{{$tituloPage}}</h1>

        @if(isset($errors)&& count ($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif


        <form class="form" method="post" action="{{route('panel.projetos.store',$plano)}}" enctype="multipart/form-data">

            {!! csrf_field()!!}
            <br>

            <div class="col-lg-6"style="background: white; padding: 10px">            
                <div class="container">
                    <b>PLANO {{$plano->sigla}} - {{$plano->nome}}</b><br>
                    <ol class="unordered-list">
                        <li>
                            <span>
                                Até {{$plano->paginas}} páginas
                                @if($plano->pg_coloridas == 0)
                                preto e branco
                                @else
                                coloridas
                                @endif
                            </span>
                        </li>
                        <li><span>{{$plano->exemplares}} exemplares para o autor </span></li>
                        <li><span>Criação Capa + Diagramação</span></li>
                        <li><span>Revisão de Texto</span></li>
                        <li><span>Registro de ISBN </span></li>
                        <li><span>Cópia na Biblioteca Nacional</span></li>
                    </ol>
                </div>
            </div>

            <br>
            <div class="form-group">
                <label for="exampleInputEmail1">Título</label>
                <input name="titulo" type="text" required min="0" value="{{old('titulo')}}" class="form-control" placeholder="Defina o titulo do projeto">
            </div>  
            <div class="form-group">
                <label for="exampleInputEmail1">   
                    Nome dos Autores <b>  <br>*Inserir autores em ordem separados por ; (ponto e vírgula)   </b>
                </label>
                <input name="autores" type="text" required value="{{old('autores')}}" class="form-control" placeholder="Informe o nome dos autores do projeto">
            </div>         
            <div class="form-group">
                <label for="exampleInputEmail1">Arquivo original    <br> <b>  **Apenas extensões .DOC ou .DOCX </b></label><br>
                <input name="original_file" type="file" required >
            </div> 
            <br>
            <div class="form-group">
                <label for="exampleTextarea">Observação</label>
                <textarea name="observacao" class="form-control"  id="observacao" rows="3"placeholder="Defina as Observações do projeto">{{old('observacao')}}</textarea>
            </div> 
            <button type="submit" class="btn btn-primary">Criar plano</button>
        </form>
    </div>
</div>
@endsection
