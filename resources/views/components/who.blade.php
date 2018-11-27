@if(Auth::guard('web')->check())
    <p class="text-success">Logado como usuario</p>
@else
    <p class="text-danger">Deslogado como usuario</p>
@endif
@if(Auth::guard('admin')->check())
    <p class="text-success">Logado como Administrador</p>
@else
    <p class="text-danger">Deslogado como Administrador</p>
@endif