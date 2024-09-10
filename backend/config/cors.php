<?php

return [
    'paths' => ['api/*'], // Rutas a las que se aplicará CORS
    'allowed_methods' => ['*'], // Métodos permitidos (GET, POST, etc.)
    'allowed_origins' => ['*'], // Orígenes permitidos (puedes especificar dominios específicos)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Encabezados permitidos
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Si necesitas enviar cookies o encabezados de autenticación
];
