<?php

test('a Response object can be created', function() {

    // ACT
    $response = new App\Http\Response('{"foo": "bar"}', 200);

    // Assert
    expect($response->getStatusCode())
        ->toBeInt()->toBe(200)
        ->and($response->getBody())
        ->toMatchJson(['foo' => 'bar']);

});

