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

//Orders
$router->get('/orders', 'orders/index.php')->only('admin');
$router->patch('/orders', 'orders/update.php')->only('admin');
$router->get('/order', 'orders/show.php')->only('admin');

//Categories
$router->get('/categories', 'categories/index.php')->only('admin');
$router->post('/categories', 'categories/create.php')->only('admin');
$router->delete('/categories', 'categories/destroy.php')->only('admin');
$router->patch('/categories', 'categories/update.php')->only('admin');
$router->get('/category', 'categories/edit.php')->only('admin');

//Customers
$router->get('/customers', 'customers/index.php')->only('admin');
$router->post('/customers', 'customers/create.php')->only('admin');