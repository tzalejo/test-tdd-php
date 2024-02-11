<?php
it('crea un objeto de solicitud de acceso formado correctamente', function () {
    // ACT
    $request = \App\Http\Request::create(
        'GET',
        '/some/path?black=white&day=night',
        [
            'CONTENT_TYPE' => 'application/json',
            'Accept' => 'application/json'
        ],
        ''
    );
    // ASSERT
    expect($request->getQueryParams())
        ->toMatchArray(['black' => 'white', 'day' => 'night'])
        ->and($request->getPath())
        ->toBe('/some/path')
        ->and($request->getMethod())
        ->toBe('GET');
});
