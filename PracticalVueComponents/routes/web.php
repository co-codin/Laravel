<?php

$examples = [
    'smooth-scroll',
    'context-menu'
];

collect($examples)->each(function ($uri) {
    Route::get($uri, function () use ($uri) {
        return view($uri);
    });
});
