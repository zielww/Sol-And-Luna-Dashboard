<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'admin' => Admin::class,
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key];

        if (!$middleware) {
            throw new \Exception("No assigned middleware for {$key}.");
        }

        (new $middleware)->handle();
    }
}