<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


Route::get('/', 'Site\SiteController@home')->name('home');
Route::get('/publique', 'Site\SiteController@publique')->name('publique');
Route::get('/page', 'Site\SiteController@page');

Route::get('/sobre-nos', 'Site\SiteController@about')->name('about');
Route::get('/servicos', 'Site\SiteController@servicos')->name('servicos');
Route::get('/contato', 'Site\SiteController@contato')->name('contato');
Route::get('/personalizar', 'PanelCliente\ProjetosController@custom')->name('site.custom');


Route::get('/login', 'LoginController@showLoginForm')->name('login');
Route::post('/login', 'LoginController@login')->name('login.submit');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'ResetPasswordController@reset');

Auth::routes();
Route::get('/pages', 'PanelAdmin\PagesController@show')->name('site.show');
Route::get('/users/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');
    Route::resource('/pages', 'PanelAdmin\PagesController');
    Route::resource('/planos', 'PanelAdmin\PlanosController');
    Route::resource('/clientes', 'PanelAdmin\ClientesController');
    Route::resource('/statusProjs', 'PanelAdmin\StatusProjController');
    Route::resource('/projetos', 'PanelAdmin\ProjetosController');
    Route::resource('/users-admin', 'PanelAdmin\UserAdminController');
    Route::get('/projetos/fase/{id}', 'PanelAdmin\ProjetosController@indexByStatus')->name('admin.projetos.fase');
    Route::resource('/customs', 'PanelAdmin\CustomController');
    Route::get('/clientes-projetos/{user}', 'PanelAdmin\ClientesController@projetos')->name('clientes.projetos');
    Route::put('/projetos/avancar/{projeto}', 'PanelAdmin\ProjetosController@avanacarStatus')->name('clientes.projetos.avancar');
    Route::post('/projetos/busca', 'PanelAdmin\ProjetosController@busca');
    Route::post('/clientes/busca', 'PanelAdmin\ClientesController@busca');
    Route::post('/users-admin/busca', 'PanelAdmin\UserAdminController@busca');

    Route::get('/download/{filename}', 'PanelAdmin\ProjetosController@download');
    Route::get('/deleteorigialfile/{projeto}', 'PanelAdmin\ProjetosController@deleteOrigialFile')->name('deleteorigialfile');

    Route::get('/register/', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register/', 'AuthAdmin\RegisterController@register')->name('admin.register.submit');

    Route::get('/users-admin/senha/{user}', 'PanelAdmin\UserAdminController@senha')->name('admin.users-admin.senha');
    Route::put('/users-admin/senha/{user}', 'PanelAdmin\UserAdminController@alterarsenha')->name('admin.users-admin.alterarsenha');


    Route::get('/clientes/senha/{cliente}', 'PanelAdmin\ClientesController@senha')->name('admin.clientes.senha');
    Route::put('/clientes/senha/{cliente}', 'PanelAdmin\ClientesController@alterarsenha')->name('admin.clientes.alterarsenha');
});
Route::prefix('painel')->group(function() {
    Route::get('/', 'PanelCliente\ProjetosController@index')->name('painel.home');
    Route::get('/projetos/create{plano}', 'PanelCliente\ProjetosController@create')->name('painel.projetos.create');
    Route::post('/store{plano}', 'PanelCliente\ProjetosController@store')->name('panel.projetos.store');
    Route::post('/custom', 'PanelCliente\ProjetosController@customstore')->name('panel.projetos.custom');
    Route::get('/projetos/show/{id}', 'PanelCliente\ProjetosController@show')->name('painel.projetos.show');
    Route::get('/minha-conta', 'PanelCliente\ClientesController@show')->name('painel.minha-conta');
    Route::get('/minha-conta/editar', 'PanelCliente\ClientesController@edit')->name('painel.minha-conta.editar');
    Route::put('/minha-conta/editar', 'PanelCliente\ClientesController@update')->name('painel.minha-conta.update');
    Route::get('/minha-conta/senha', 'PanelCliente\ClientesController@senha')->name('painel.minha-conta.senha');
    Route::put('/minha-conta/senha', 'PanelCliente\ClientesController@alterarsenha')->name('painel.minha-conta.alterarsenha');
    Route::get('/pagamento/{projeto}', 'PanelCliente\PagamentoController@show')->name('site.pagamento');
    Route::get('/boleto', 'PanelCliente\PagseguroController@boleto')->name('seguro.boleto');
    Route::get('/debito', 'PanelCliente\PagseguroController@debito')->name('seguro.debito');
    Route::get('/credito', 'PanelCliente\PagseguroController@credito')->name('seguro.credito');
    Route::post('/notificacao-pagseguro', 'PanelCliente\PagseguroNotificacaoController@notificacao');
});
