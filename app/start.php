<?php

    use Slim\Slim;
    use Slim\Views\Twig;
    use Slim\Views\TwigExtension;

    use Noodlehaus\Config;

    use Authenticate\User\User;
    use Authenticate\Helpers\Hash;

    session_cache_limiter(false);
    session_start();

    // For display the errors
    ini_set('diaplay_errors', 'On');

    // This is defines which directory you are right now
    define('INC_ROOT', dirname(__DIR__));

    require INC_ROOT . '/vendor/autoload.php';

    $app = new Slim([
        'mode' => file_get_contents(INC_ROOT . '/mode.php'),
        'view' => new Twig(),
        'templates.path' => INC_ROOT . '/app/views',
    ]);
    $app->configureMode($app->config('mode'), function() use ($app) {
        $app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
    });
    // echo $app->config->get('db.driver');
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

    require 'database.php';
    require 'routes.php';

    $app->container->get('user', function() {
        return new User;
    });

    $app->container->singleton('hash', function() use($app) {
        return new Hash($app->config);
    });



    // This is check for the User Model
    // var_dump($app->user);

    // $app->get('/', function() use($app) {
    //     $app->render('home.php');
    // });

    $view = $app->view();

    $view->parserOptions = [
        'debug' => $app->config->get('twig.debug')
    ];

    $view->parserExtensions = [
        new TwigExtension
    ];



    // echo $app->hash->password('ilovetaju');
?>
