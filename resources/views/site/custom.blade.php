@extends('layouts.site')
@section('title', 'Projeto personalizado')

@section('content')
<!-- start banner Area -->
<section class="relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Personalize seu plano		
                </h1>	
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->


<!-- Start Sample Area -->
<section class="sample-text-area">
    <div class="container">
        @if(session()->has('message'))
        <div class="alert alert-danger ">
            {{ session()->get('message') }}
        </div>
        @endif
        <h3 class="text-heading">Orientações - Como preparar seu arquivo para um correto orçamento</h3>
        <p class="sample-text">
        <ul class="unordered-list">
            <li>Seu arquivo precisa estar no WORD com extensão “.doc” ou “.docx”.</li>

            <li>A fonte a ser utilizada é Arial 12.</li>
            <li>O espaçamento entre as linhas é de 1,5.</li>
            <li>Tamanho da página tem que ser de 15cmx21cm.</li>
            Depois de aplicadas essas configurações, terá a Quantidade de Página total do seu livro.<br><br>
            <b>Agora o último passo:</b> feito isso, precisamos saber a Quantidade de Páginas Coloridas.<br>
            <li>Diminua do total de páginas e terá a Quantidade de Páginas Preta e Branca.</li>
            Porque isso é importante?<br>
            Porque há um custo para as páginas coloridas e outra para páginas em preto e branco, e na hora de montagem do livro, os encaixes precisam ser coordenados entre as coloridas e preto e branco.
        </ul>
        </p>
    </div>
</section>
<!-- End Sample Area -->
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <h1 >{{$tituloPage}}</h1> 

        @if(isset($errors)&& count ($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
        <div class="section-top-border" >
            <form class="form" method="post" action="{{route('panel.projetos.custom')}}" enctype="multipart/form-data">
                {!! csrf_field()!!}               
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="single-element-widget col-12">
                            <h4>Título</h4>
                            <div class="mt-10 ">
                                <input value="{{old('titulo')}}" type="text" name="titulo" placeholder="Título do projeto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Título do projeto    '" required class="single-input" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="single-element-widget col-12">
                            Nome dos Autores <b>  <br>*Inserir autores em ordem separados por ; (ponto e vírgula)   </b>
                            <div class="mt-10 ">
                                <input  value="{{old('autores')}}" type="text" name="autores" placeholder="Autores" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Autores    '" required class="single-input" >
                            </div>
                        </div>
                    </div>                    

                    <div class="col-lg-6 col-md-12">
                        <div class="single-element-widget col-md-6 col-lg-9">
                            Quantidade de páginas preto e braco
                            <div class="mt-10 ">
                                <input id="n1" type="number" name="pb" onblur="calcular()" placeholder="Total de páginas" onkeypress='return SomenteNumero(event)' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Exemplares'" required class="single-input" >
                            </div>                           
                        </div>                      
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="single-element-widget col-md-6 col-lg-9">
                            Quantidade de páginas coloridas
                            <div class="mt-10 ">
                                <input id="n2" value="{{old('pc')}}" onblur="calcular()" type="number" name="pc" placeholder="Coloridas" onkeypress='return SomenteNumero(event)' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Coloridas'" required class="single-input" >
                            </div>                           
                        </div>                      
                    </div>
                    <div class="col-lg-6 col-md-12">                        
                        <div class="single-element-widget col-md-6 col-lg-9">
                            Total de páginas     
                            <div class="mt-10 ">
                                <input id="resultado" disabled value="{{old('paginas')}}" type="number" name="paginas" placeholder="Páginas" onkeypress='return SomenteNumero(event)' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Páginas'" required class="single-input" >
                            </div>                           
                        </div>                      
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="single-element-widget col-md-6 col-lg-9">
                            Quantidade de exemplares
                            <div class="mt-10 ">
                                <input value="{{old('exemplares')}}" type="number" name="exemplares" placeholder="Exemplares" onkeypress='return SomenteNumero(event)' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Exemplares'" required class="single-input" >
                            </div>                           
                        </div>                      
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="single-element-widget col-12">
                            Formato
                            <div class="default-select " id="default-select">
                                <select name='custom' class="selectpicker" required>
                                    @foreach($customs as $custom)
                                    <option value="{{$custom->id}}">{{$custom->tamanho}}</option>
                                    @endforeach
                                </select>
                            </div>                                    
                        </div>   
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="single-element-widget col-12">
                            <label for="exampleInputEmail1">Arquivo original    <br> <b>  **Apenas extensões .DOC ou .DOCX </b></label><br>
                            <input name="original_file" type="file" required >
                        </div> 
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="single-element-widget col-lg-12">
                            Observações
                            <div class="mt-10 ">
                                <textarea value="{{old('observacao')}}" class="form-control mb-10" rows="5" name="observacao" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" ></textarea>
                            </div>                           
                        </div>                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 offset-5">
                        <button type="submit" class="genric-btn primary">Criar projeto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Align Area -->

<script language='JavaScript'>
    function SomenteNumero(e) {
        var tecla = (window.event) ? event.keyCode : e.which;
        if ((tecla > 47 && tecla < 58))
            return true;
        else {
            if (tecla == 8 || tecla == 0)
                return true;
            else
                return false;
        }
    }
</script>

<script language='JavaScript'>
    function calcular() {
        var n1 = parseInt(document.getElementById('n1').value, 10);
        var n2 = parseInt(document.getElementById('n2').value, 10);
        document.getElementById('resultado').value = n1 + n2;
    }
</script>
@endsection
