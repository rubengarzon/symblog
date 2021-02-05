<?php
ini_set('display_errors', 1);
ini_set('display_starup_error',1);
error_reporting(E_ALL);

require_once '..\vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Blog;
use Aura\Router\RouterContainer;



$capsule = new Capsule;
$capsule->addConnection([
'driver' => 'mysql',
'host' => 'localhost',
'database' => 'symblog',
'username' => 'symblog',
'password' => 'symblog',
'charset' => 'utf8',
'collation' => 'utf8_unicode_ci',
'prefix' => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
//require '..\index.php';

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('addblog', '/symblog/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'getAddBlogAction'
]);
$map->post('saveblog', '/symblog/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'getAddBlogAction'
]);
$map->get('contact', '/symblog/contact', '../contact.php');
$map->get('about', '/symblog/about', '../about.php');
$map->get('show', '/symblog/blogs/show', '../show.php');
$map->get('index', '/symblog/',[
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if(!$route){
    echo 'No route';
}else{
    //require $route->handler;
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $controller->$actionName($request);
}