<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class App {
    protected $currentController = 'AuthController'; // Default to Auth
    // Use a neutral default method; we'll choose the right one after loading the controller
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();

        // Look in controllers for first value
        if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller.php')){
            $this->currentController = ucwords($url[0]) . 'Controller';
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // If a method was provided in the URL, use it (after verifying it exists)
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        } else {
            // No method specified in URL: choose a sensible default per controller
            $controllerClass = is_object($this->currentController) ? get_class($this->currentController) : $this->currentController;
            if($controllerClass === 'AuthController'){
                // For the auth controller, default to the login method
                $this->currentMethod = 'login';
            } else {
                // For other controllers, default to index
                $this->currentMethod = 'index';
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
