<?php

class load {

    private static $loaded_files = array();

    public static function model($model = '') {
        $file = FULL_PATH . '/app/models/' . $model . '_model.php';
        $load_result = self::loader($file);
        if ($load_result === true) {
            $model_name = $model . '_model';
            $instance = new $model_name;

            return $instance;
        }
        return false;
    }

   

    public static function controller($controller = '') {
        $file = FULL_PATH . '/app/controllers/' . $controller . '_controller.php';
        $load_result = self::loader($file);
        if ($load_result === true) {
            $controller_name = $controller . '_controller';
            $instance = new $controller_name;
            return $instance;
        }
        return false;
    }

    public static function view($view = '', $variables = array()) {
        $view.= '.php';
        $file = FULL_PATH . '/app/views/' . $view;
        if (file_exists($file)) {
            return self::output($file, $variables);
        }
        return false;
    }
    
    public static function vendor($name = '') {
        $file = FULL_PATH . '/vendors/' . $name.'.php';
        return self::loader($file);
    }
    
    private static function output($file, $variables = array()) {
        ob_start();
        if (file_exists($file)) {
            include($file);
            extract($variables);
            $output = ob_get_clean();
        }
        return $output;
    }

    private static function loader($file) {
        if (!in_array($file, self::$loaded_files)) {
            if (file_exists($file)) {
                self::$loaded_files[] = $file;
                include($file);
                return true;
            }
            return false;
        }
        return true;
    }
}