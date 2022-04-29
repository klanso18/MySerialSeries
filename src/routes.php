<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'category' => ['CategoryController', 'index',],
    'serie' => ['SerieController', 'index',],
<<<<<<< HEAD
    'login' => ['UserController', 'login',],
    'logout' => ['UserController', 'logout',],
    'register' => ['UserController', 'register',],
=======
    'serie/add' => ['SerieController', 'add',],
>>>>>>> 14f3ad1adf7a57c5a92c0531105216a693a4c8b1
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
];
