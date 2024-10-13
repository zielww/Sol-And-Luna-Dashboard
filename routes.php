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

//Products
$router->get('/products', 'products/index.php')->only('admin');
$router->post('/products', 'products/create.php')->only('admin');
$router->delete('/products', 'products/destroy.php')->only('admin');
$router->patch('/products', 'products/update.php')->only('admin');
$router->get('/product', 'products/edit.php')->only('admin');

