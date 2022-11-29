<?php

$fields = [
'first_name' => 'string | required | alphanumeric | between: 3, 25',
    'last_name' => 'string | required | alphanumeric | between: 3, 25',
'email' => 'email | required | email | unique: users, email',
'password' => 'string | required',
'description' => 'string | required',
    'photo' => 'file | required'
];

// custom messages
$messages = [
'password2' => [
'required' => 'Please enter the password again',
'same' => 'The password does not match'
],
'agree' => [
'required' => 'You need to agree to the term of services to register'
]
];

[$inputs, $errors] = filter($_POST, $fields, $messages);