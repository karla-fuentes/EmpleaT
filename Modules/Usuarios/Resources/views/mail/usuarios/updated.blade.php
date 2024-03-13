@component('mail::message')

# ¡Hola!

## Un usuario de {{ env('APP_NAME') }} ha sido actualizado.

Los datos del usuario modificado son:

### Nombre: {{ $usuario->nombre }}  {{ $usuario->apellido }}
- Email: {{ $usuario->email }}
- Descripción: {{ $usuario->descripcion }}
- Activo: {{ $usuario->activo ? 'Sí' : 'No' }}
- ID: {{ $usuario->id }}

@if ($loggeduser != null)
El usuario que hizo el cambio es:

### Nombre: {{ $loggeduser->nombre }}  {{ $loggeduser->apellido }}
- Email: {{ $loggeduser->email }}
- ID: {{ $loggeduser->id }}
@else


Saludos,
{{ env('APP_NAME') }}

@endcomponent
