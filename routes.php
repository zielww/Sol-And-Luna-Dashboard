<?php

// Index Redirect
$router->get('/', 'login/index.php')->only('guest');

//Login
$router->get('/login', 'login/index.php')->only('guest');
$router->post('/login', 'login/verify.php')->only('guest');

//Logout
$router->delete('/logout', 'login/logout.php')->only('admin');

//Dashboard
$router->get('/dashboard', 'dashboard.controller.php')->only('admin');

//Products
$router->get('/product', 'products/edit.php')->only('admin')->params('products');
$router->get('/products', 'products/index.php')->only('admin');
$router->post('/products', 'products/create.php')->only('admin');
$router->delete('/products', 'products/destroy.php')->only('admin');
$router->patch('/products', 'products/update.php')->only('admin');

//Orders
$router->get('/order', 'orders/show.php')->only('admin')->params('orders');;
$router->get('/orders', 'orders/index.php')->only('admin');
$router->patch('/orders', 'orders/update.php')->only('admin');
$router->delete('/orders', 'orders/delete.php')->only('admin');

//Categories
$router->get('/category', 'categories/edit.php')->only('admin')->params('categories');
$router->get('/categories', 'categories/index.php')->only('admin');
$router->post('/categories', 'categories/create.php')->only('admin');
$router->delete('/categories', 'categories/destroy.php')->only('admin');
$router->patch('/categories', 'categories/update.php')->only('admin');

//Customers
$router->get('/customer', 'customers/edit.php')->only('admin')->params('customers');
$router->get('/customers', 'customers/index.php')->only('admin');
$router->post('/customers', 'customers/create.php')->only('admin');
$router->patch('/customers', 'customers/update.php')->only('admin');
$router->delete('/customers', 'customers/destroy.php')->only('admin');

//Addresses
$router->get('/address', 'customers/addresses/edit.php')->only('admin')->params('customers');
$router->post('/addresses', 'customers/addresses/create.php')->only('admin');
$router->patch('/addresses', 'customers/addresses/update.php')->only('admin');
$router->delete('/addresses', 'customers/addresses/destroy.php')->only('admin');

//Reports
$router->get('/reports', 'reports/index.php')->only('admin');
$router->get('/sales-report', 'reports/sales-report.php')->only('admin');
$router->get('/product-report', 'reports/product-report.php')->only('admin');
$router->get('/payment-report', 'reports/payment-report.php')->only('admin');
$router->get('/delivery-report', 'reports/delivery-report.php')->only('admin');

//Pdfs
$router->get('/sales-pdf', 'reports/pdfs/sales-pdf.php')->only('admin');
$router->get('/payment-pdf', 'reports/pdfs/payment-pdf.php')->only('admin');
$router->get('/delivery-pdf', 'reports/pdfs/delivery-pdf.php')->only('admin');
$router->get('/product-pdf', 'reports/pdfs/product-pdf.php')->only('admin');

//Messages
$router->get('/messages', 'messages/index.php')->only('admin');
$router->post('/messages', 'messages/channel.php')->only('admin');

