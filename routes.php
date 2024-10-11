<?php

// Index Redirect
$router->get('/', 'login/index.php')->only('guest');

//Login
$router->get('/login', 'login/index.php')->only('guest');
$router->post('/login/verify', 'login/verify.php')->only('guest');

//Logout
$router->delete('/logout', 'login/logout.php')->only('admin');

//Dashboard
$router->get('/dashboard', 'dashboard.controller.php')->only('admin');