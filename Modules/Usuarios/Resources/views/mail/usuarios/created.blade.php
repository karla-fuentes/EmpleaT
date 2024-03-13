@component('mail::message')

# ¡Hola!

## Un nuevo usuario de {{ env('APP_NAME') }} ha sido creado.

Los datos del nuevo usuario son:

### Nombre: {{ $usuario->nombre }}  {{ $usuario->apellido }}
- Email: {{ $usuario->email }}
- Descripción: {{ $usuario->descripcion }}
- Activo: {{ $usuario->activo ? 'Sí' : 'No' }}
- ID: {{ $usuario->id }}

@if ($loggeduser != null)
El usuario que creó la cuenta es:

### Nombre: {{ $loggeduser->nombre }}  {{ $loggeduser->apellido }}
- Email: {{ $loggeduser->email }}
- ID: {{ $loggeduser->id }}
@else
El usuario ha sido creado desde el formulario de registro.
@endif

Saludos,
{{ env('APP_NAME') }}

@endcomponent
