<?php

it('retrieves the correct data form books api', function() {
    // Arrange => preparar

    // act =>
    $response = $this->json(method: 'GET', uri: '/books/1');

    // assert => afirmacion
    expect($response->getStatusCode())->toBeInt()->toBe(200)
        ->and($response->getBody())->toMatchJson([
        'id' => 1,
        'title' => 'Clean Code: A Handbook of Agile Sofware Craftsmanship',
        'year_published' => 2008,
        'author' => [
            'id' => 1,
            'name' => 'Robert C. Martin',
            'bio' => 'This is an author'
        ]
    ]);
});
