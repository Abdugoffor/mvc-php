<?php

namespace MVC\View;

class View
{
    public static $mian;
    public static function layout(string $mian)
    {
        self::$mian = $mian;
    }
    public static function make($view, $params = [])
    {
        $baseContent = self::getBaseContent();

        $viewContent = self::getViewContent($view, $isError = false, $params);

        echo str_replace('{{content}}', $viewContent, $baseContent);
    }

    public static function getBaseContent()
    {
        ob_start();

        include view_path() . self::$mian . '.php';

        return ob_get_clean();
    }

    public static function error($view)
    {
        return self::getViewContent($view, true);
    }

    public static function getViewContent($view, $isError = false, $params = [])
    {
        $path = $isError ? view_path() . 'errors/'  : view_path();

        if (str_contains($view, '.')) {

            $views = explode('.', $view);

            foreach ($views as $view) {

                if (is_dir($path . $view)) {
                    $path .= $view . '/';
                }
            }

            $view = $path . end($views) . '.php';
        } else {
            $view = $path . $view  . '.php';
        }

        foreach ($params as $param => $value) {
            $$param = $value;
        }

        if ($isError) {

            include $view;
        }
        
        ob_start();

        include $view;

        return ob_get_clean();
    }
}
