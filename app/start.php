<?php

    use Slim\Slim;
    use Noodlehaus\Config;

    session_cache_limiter(false);
    session_start();

    // For display the errors
    ini_set('diaplay_errors', 'On');

    // This is defines which directory you are right now
    define('INC_ROOT', dirname(__DIR__));

    require INC_ROOT . '/vendor/autoload.php';

    $app = new Slim([
        'mode' => file_get_contents(INC_ROOT . '/mode.php')
    ]);
    $app->configureMode($app->config('mode'), function() use ($app) {
        $app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
    });
    echo $app->config->get('db.driver');
    // var_dump($app->config);

    // echo $app->config('mode');

    // This is a test route
    // $app->get('/test', function() {
    //     echo "Mamun";
    // });

    // This Route for pass some value by the url and this did not work 

    // $app->get('/test/:name', function($name) {
    //     echo "Hello {$name} !";
    // });
    
?>
