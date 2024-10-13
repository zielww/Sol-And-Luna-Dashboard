<?php

use Core\Response;
use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("Http/views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function url_is($url, $extra_url = null)
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $url || parse_url($_SERVER['REQUEST_URI'],
            PHP_URL_PATH) === $extra_url;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path("Http/views/" . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}

function calculateTotalPrice($price, $quantity) {
    if ($price < 0 || $quantity < 0) {
        return "Invalid input"; // Error handling for negative values
    }
    return round($price * $quantity, 2);
}
