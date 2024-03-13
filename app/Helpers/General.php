<?php

if (!function_exists('printIfRouteIs') ) {
    /**
     * Revisa si la ruta corresponde con la URi actual
     * Entonces imprime una cadena
     *
     * http://laraveldaily.com/how-to-check-current-url-or-route/
     *
     * @param  String $route   Nombre de la ruta a verificar
     * @param  String $text    Cadena a imprimir si la ruta coincide
     * @param  String $default Respuesta si la ruta no coincide
     * @return String
     */
    function printIfRouteIs($route, $text = ' class="active"', $default = '')
    {
        if (Route::current()->getName() === $route) {
            return $text;
        }

        return $default;
    }
}


if (!function_exists('printIfRequestIs') ) {
    /**
     * Revisa si el request corresponde con la URi actual
     * Entonces imprime una cadena
     *
     * http://laraveldaily.com/how-to-check-current-url-or-route/
     *
     * @param  String $route   URi de el request a verificar
     * @param  String $text    Cadena a imprimir si el request coincide
     * @param  String $default Respuesta si el request no coincide
     * @return String
     */
    function printIfRequestIs($route, $text = ' class="active"', $default = '')
    {
        if (Request::is($route)) {
            return $text;
        }

        return $default;
    }
}

if (!function_exists('printIfRequestIn') ) {
    /**
     * Revisa si el request corresponde con la URi actual
     * Entonces imprime una cadena
     *
     * http://laraveldaily.com/how-to-check-current-url-or-route/
     *
     * @param  String $route   URi de el request a verificar
     * @param  String $text    Cadena a imprimir si el request coincide
     * @param  String $default Respuesta si el request no coincide
     * @return String
     */
    function printIfRequestIn(Array $routes, $text = ' class="active open"', $default = '')
    {
        foreach ($routes as $route) {
            if (Request::is($route)) {
                return $text;
            }
        }

        return $default;
    }
}


if (!function_exists('getAdminMail') ) {
    /**
     * Devuelve el email para notificar al admin
     *
     * @return String
     */
    function getAdminMail()
    {
        return env('CAJAVERDE_ADMIN_MAIL');
    }
}

if (!function_exists('getFechaLatina') ) {
    /**
     * Convierte una fecha a formato d-m-Y o el especificado
     *
     * @param  String $datetime
     * @return String
     */
    function getFechaLatina($datetime, $format = 'd-m-Y')
    {
        $fecha = Carbon\Carbon::parse($datetime);

        return $fecha->format($format);
    }
}

if(!function_exists('getDropdown')){
    /**
     * Obtiene los hijos del dropdown, dependiendo de el valor
     *
     * @param  String $key
     * @return array
     */
    function getDropdown($value,$tipo='key-value')
    {
        $data = Modules\Configuraciones\Entities\Dropdown::where('parent_id',function($query) use($value)
        {
            $query->select('id')->from('dropdowns')->where('value', $value)->whereNull('parent_id')->first();
        })->get();
        if(empty($data)){
            return array();
        }
        if($tipo == 'key-value'){
            return $data->pluck('value','id')->toArray();
        }elseif($tipo == 'objeto'){
            return $data;
        }
    }
}

if(!function_exists('getDropdownValue')){
    /**
     * Obtiene los hijos del dropdown, dependiendo de el valor
     *
     * @param  String $key
     * @return array
     */
    function getDropdownValue($keyOrId)
    {
        $data = Modules\Configuraciones\Entities\Dropdown::select('value')->where('id',$keyOrId)->orWhere('key',$keyOrId)->groupBy('id')->first();
        if(!isset($data->value)){
            return '';
        }
        return $data->value;
    }
}
