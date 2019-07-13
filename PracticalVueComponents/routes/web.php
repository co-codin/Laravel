<?php

$examples = [
    'smooth-scroll'
];

collect($examples)->each(function ($uri) {
    Route::get($uri, function () use ($uri) {
        return view($uri);
    });
});
