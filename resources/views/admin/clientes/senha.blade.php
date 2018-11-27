@extends('layouts.admin')

@section('content')


<div class="whole-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h3 class="mb-30">{{$tituloPage}}</h3>
                <form class="form-horizontal" method="POST" action="{{ route('admin.clientes.alterarsenha',$cliente->id) }}">
                    {{ csrf_field() }}
                    {!! method_field('PUT')!!}

                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Senha</label>
                        <input name="password" type="password" value="{{old('password')}}" class="form-control" placeholder="Defina a senha do cliente">
                    </div>  
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
