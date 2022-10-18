<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfefed663b8bfec545285769e014a1afb
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Extendify\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Extendify\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfefed663b8bfec545285769e014a1afb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfefed663b8bfec545285769e014a1afb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}