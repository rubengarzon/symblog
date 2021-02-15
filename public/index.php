<?php
ini_set('display_errors', 1);
ini_set('display_starup_error',1);
error_reporting(E_ALL);

require_once '..\vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Blog;
use Aura\Router\RouterContainer;
use Symfony\Component\Dotenv\Dotenv;

session_start();
/* $dotenv = Dotenv\Dotenv::createImmutable('C:/xampp/htdocs/symblog'); */
/* $dotenv = new Dotenv\Dotenv(__DIR__.'/../'); */
$dotenv = new Dotenv();
$dotenv->load('C:/xampp/htdocs/symblog/.env');

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV["DB_HOST"],
    'database' => $_ENV["DB_NAME"],
    'username' => $_ENV["DB_USER"],
    'password' => $_ENV["DB_PASS"],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
    ]);
/*     var_dump(getenv('DB_HOST'));
    var_dump(getenv('DB_USER')); */
/* $capsule->addConnection([
'driver' => 'mysql',
'host' => 'localhost',
'database' => 'symblog',
'username' => 'symblog',
'password' => 'symblog',
'charset' => 'utf8',
'collation' => 'utf8_unicode_ci',
'prefix' => '',
]); */
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
    'action' => 'getAddBlogAction',
    'auth' => true
]);
$map->post('saveblog', '/symblog/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action' => 'getAddBlogAction'
]);
$map->get('adduser', '/symblog/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction',
    'auth' => true
]);
$map->post('saveuser', '/symblog/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);
$map->get('login', '/symblog/users/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);
$map->get('admin', '/symblog/users/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
]);
$map->get('logout', '/symblog/users/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout'
]);
$map->post('saveLogin', '/symblog/users/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);
$map->get('contact', '/symblog/contact', '../contact.php');
$map->get('about', '/symblog/about', '../about.php');
$map->get('show', '/symblog/blogs/show', '../show.php');
$map->get('index', '/symblog/',[
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction',
    'auth' => true
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
$handlerData = $route->handler;
$controllerName = $handlerData['controller'];
$actionName = $handlerData['action'];
$needsAuth = $handlerData['auth'] ?? false;
$sessionUserId = $_SESSION['userId'] ?? null;
if($needsAuth && !$sessionUserId) {
    header('Location: /symblog/users/login');
}else{
    $controller = new $controllerName;
    $response = $controller->$actionName($request);
    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}