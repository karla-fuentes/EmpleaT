<?php

return [
    'name' => 'Autenticacion',
    /**
     * Regular expression for password stength
     * https://regex101.com/r/ytbTW0/3
     */
    'password_regex' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$!@])(?!.*[iIoO])\S{6,32}$/',

];
