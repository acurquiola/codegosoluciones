@component('mail::message')
# {{ $datos['nombre'] }}
E-mail: {{ $datos['email'] }}<br>
Asunto: {{ $datos['asunto'] }}<br>
Mensaje:
@component('mail::panel')
    {{ $datos['mensaje'] }}
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent