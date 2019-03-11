<?php
namespace CSY2028;
class EntryPoint {
    private $routes;
    public function __construct($routes) {
        $this->routes = $routes;
    }
    public function run() {
        $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
        $routes = $this->routes->getRoutes();// this will hold $routes array from(Ijdb\Controllers\Routes)
        $method = $_SERVER['REQUEST_METHOD'];// this will check if it get or post

        if(isset($routes[$route]['admin']) ){//call the checklogin() function in the (Ijdb\Controllers\Routes)
            $this->routes->checklogin(); // ($routes[$route]['login'])this is the array in (Ijdb\Controllers\Routes)
        }

        $controller = $routes[$route][$method]['controller'];
        $functionName =   $routes[$route][$method]['function'];


        $page = $controller->$functionName();// this equvalent to $page = $jokeController->list();

        $output = $this->loadTemplate('../template/' . $page['template'],
            $page['variables']);
        $title = $page['title'];
        require '../template/layout.html.php';
    }
    public function loadTemplate($fileName, $templateVars) {
        extract($templateVars);
        ob_start();
        require $fileName;
        $contents = ob_get_clean();
        return $contents;
    }
}
?>
