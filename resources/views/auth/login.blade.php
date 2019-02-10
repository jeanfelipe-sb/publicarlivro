@extends('layouts.site')

@section('content')
<section class="about-banner">
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="login-content col-lg-12">
                <h1 class="text-white">
                    Login			
                </h1>	
            </div>	
        </div>
    </div>
</section>
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">					
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <h3 class="mb-30">Já possui conta?</h3>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="mt-10 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group-icon mt-10" >
                                <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input id="email" type="email" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'"  class="single-input">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-10 form-group{{ $errors->has('password') ? ' has-error' : '' }} ">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                                <input id="password" type="password" name="password" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'"  class="single-input">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-10">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 form-group">
                            <button type="submit" class="genric-btn primary">Entrar</button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Esqueceu a senha?
                            </a>
                            <br/>
                            <br/>
                            <label class="custom-control-label" for="debito"><a href="{{route('termos')}}" target="_blank">Termos de uso</a></label>
                            <br/>
                        </div>
                    </form>	
                </div>
                <div class="col-lg-5 ml-auto ">
                    <div class="mt-10">
                        <h3 class="mb-30">Não possui conta?</h3>                        
                        <a href="{{ route('register') }}" class="genric-btn primary ">Cadastre-se</a>
                    </div>   
                </div>								
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->
@endsection
