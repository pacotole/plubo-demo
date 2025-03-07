<?php

namespace PluboDemo\Includes;

class Loader
{
    public function __construct()
    {
        $this->loadDependencies();

        add_action('plugins_loaded', [$this, 'loadPluginTextdomain']);
    }

    private function loadDependencies()
    {
        //FUNCTIONALITY CLASSES
        foreach (glob(PLUBODEMO_PATH . 'Functionality/*.php') as $filename) {
            $class_name = '\\PluboDemo\Functionality\\' . basename($filename, '.php');
            if (class_exists($class_name)) {
                try {
                    new $class_name(PLUBODEMO_NAME, PLUBODEMO_VERSION);
                } catch (\Throwable $e) {
                    pb_log($e);
                    continue;
                }
            }
        }

        //ADMIN FUNCTIONALITY
        if( is_admin() ) {
            foreach (glob(PLUBODEMO_PATH . 'Functionality/Admin/*.php') as $filename) {
                $class_name = '\\PluboDemo\Functionality\Admin\\' . basename($filename, '.php');
                if (class_exists($class_name)) {
                    try {
                        new $class_name(PLUBODEMO_NAME, PLUBODEMO_VERSION);
                    } catch (\Throwable $e) {
                        pb_log($e);
                        continue;
                    }
                }
            }
        }
    }

    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('plubo-demo', false, dirname(PLUBODEMO_BASENAME) . '/languages/');
    }
}
