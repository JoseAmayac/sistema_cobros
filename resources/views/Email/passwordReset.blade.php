@component('mail::message')
# Recuperar tu contraseña

Haga  click en el siguiente botón para restablecer su contraseña

@component('mail::button', ['url' => 'http://localhost:4200/response?token='.$token])
Recuperar contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
