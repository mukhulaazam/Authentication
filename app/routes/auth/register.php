<?php

    $app->get('/register', function() use($app) {
        $app->rendar('auth/register.php');
    })->name('register');

