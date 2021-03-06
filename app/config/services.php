<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Security;
use Phalcon\Mvc\Router as router;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * Agrego archivo config a inyector de dependencia para accederlo desde cualquier parte
 */
$di->set('config', $config, true);

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

        $view = new View();

        $view->setViewsDir($config->application->viewsDir);

        $view->registerEngines(array(
            '.volt' => function ($view, $di) use ($config) {

                $volt = new VoltEngine($view, $di);

                $volt->setOptions(array(
                    'compiledPath' => $config->application->cacheDir,
                    'compiledSeparator' => '_'
                ));

                return $volt;
            },
            '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
        ));

        return $view;

});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter($config->database->toArray());
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */

$di->setShared('session', function () {
    $session = new SessionAdapter(
        array(
            'uniqueId' => 'eva-app-1'
        )
    );
    $session->start();
    return $session;

});

/*
GENERO LA SEGURIDAD PARA LOS TOKEN EN LAS SESIONES
*/

$di->set('security', function(){
    $security = new Security();
    //hash de contraseñas a 12 rondas
    //MAYOR SEGURIDAD RENDIMIENTO MAS LENTO
    $security->setWorkFactor(12); 
    return $security;
}, true);

$di->set(
    'router',
    function () {
        $router = new Router(false);
        require __DIR__.'/routes.php';
        return $router;
    }
);

$di->set('verificarPermisos','VerificarPermisos');
