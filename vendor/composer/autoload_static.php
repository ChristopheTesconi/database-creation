<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite28b20fb1d165364c94cc181fbfa3b02
{
    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite28b20fb1d165364c94cc181fbfa3b02::$classMap;

        }, null, ClassLoader::class);
    }
}
