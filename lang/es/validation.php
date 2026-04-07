// lang/es/validation.php
return [
    'required' => 'El campo :attribute es obligatorio.',
    'unique'   => 'Este :attribute ya se encuentra registrado en el sistema.',
    
    'custom' => [
        'email' => [
            'required' => 'Necesitamos tu correo para identificarte.',
            'unique' => 'Ese correo ya pertenece a otro usuario de TurtleCRM.',
        ],
        'placa' => [
            'unique' => 'Este vehículo ya está en la base de datos.',
        ],
    ],

    'attributes' => [
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'name' => 'nombre completo',
    ],
];