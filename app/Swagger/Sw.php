<?php

namespace App\Swagger;

class Sw
{
    public function __construct()
    {

    }

    public static function Get(string $path, int $response, string $description): array
    {
        return [
            $path,
            $response,
            $description,
        ];
    }
}
