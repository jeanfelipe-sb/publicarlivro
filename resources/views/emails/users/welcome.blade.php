@component('mail::message')
# Olá, {{ $user['name'] }}.
A Editora Collaborativa tem o prazer de lhe dar as boas-vindas e lhe parabenizar pela sua recente inclusão em nosso portfólio de clientes.

Trabalharemos com afinco para lhe oferecer a cada dia os melhores serviços buscando sempre a costumeira excelência no atendimento e na qualidade.

Aproveitamos a oportunidade para renovar votos de elevada estima e consideração.

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent