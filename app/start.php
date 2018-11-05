<?php

    use Slim\App;

    session_cache_limiter(false);
    session_start();

    // For display the errors
    ini_set('diaplay_errors', 'On');

    // This is defines which directory you are right now
    define('INC_ROOT', dirname(__DIR__));

    require INC_ROOT . '/vendor/autoload.php';

    $app = new App();

    // This is a test route
    $app->get('/test', function() {
        echo "Mamun";
    });

    // This Route for pass some value by the url and this did not work 

    // $app->get('/test/:name', function($name) {
    //     echo "Hello {$name} !";
    // });
    
?>
