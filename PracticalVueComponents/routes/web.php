<?php

$examples = [
    'smooth-scroll',
    'context-menu',
    'conditional-visibility'
];

collect($examples)->each(function ($uri) {
    Route::get($uri, function () use ($uri) {
        return view($uri);
    });
});
