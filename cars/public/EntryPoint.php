<?php
namespace Cla;
class HAmza
{
    private function run()
    {
        $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
        $routes = $this->routes->getRoutes();
        $method = $_SERVER['REQUEST_METHOD'];
        $controller = $routes[$route][$method]['controller'];
        $functionName = $routes[$route][$method]['function'];
        $page = $controller->$functionName();
        $output = $this->loadTemplate('../template/' . $page['template'], $page['variables']);
        $title = $page['title'];
        require '../template/layout.html.php';
    }
}
?>
