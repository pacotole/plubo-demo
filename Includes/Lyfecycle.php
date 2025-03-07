<?php

namespace PluboDemo\Includes;

class Lyfecycle
{
    public static function activate($network_wide)
    {
        do_action('PluboDemo/setup', $network_wide);
    }

    public static function deactivate($network_wide)
    {
        do_action('PluboDemo/deactivation', $network_wide);
    }

    public static function uninstall()
    {
        do_action('PluboDemo/cleanup');
    }
}
