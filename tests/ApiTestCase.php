<?php

namespace Tests;

use App\Http\Kernel;
use App\Http\Response;
use App\Http\Request;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class ApiTestCase extends BaseTestCase
{
    public function json(
        string $method = 'GET',
        string $uri    = '/',
        array $data    = [],
        array $headers = []): Response
    {
        // Json encode the data: codificar json los datos para tenerlos en el mismo formato en el q estaran si envia una solicitud
        $content = json_encode($data);

        // Merge server variables with $headers: Fusionar las variables de nuestro servidor con los encabezados
        $server = array_merge([
            'CONTENT_TYPE' => 'application/json',
            'Accept' => 'application/json',
        ], $headers);

        // Create a $request using a static named constructor
        $request = Request::create(
            method:  $method,
            uri:     $uri,
            server:  $server,
            content: $content
        );

        // Create / resolve the Kernel
        $kernel = new Kernel();

        // Obtain a $response object: $response = $kernel->handle($request)
        $response = $kernel->handle($request);

        // return the $response
        return $response;
    }

}
