<?php

$examples = [
    'smooth-scroll',
    'context-menu',
    'conditional-visibility',
    'modal',
    'confirmation-button'
];

collect($examples)->each(function ($uri) {
    Route::get($uri, function () use ($uri) {
        return view($uri);
    });
});

Route::post('confirmation-button', function () {
    return 'Form submitted';
});
