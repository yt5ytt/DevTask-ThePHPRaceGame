<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit915a8495ca31009f1b834c96facce48b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit915a8495ca31009f1b834c96facce48b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit915a8495ca31009f1b834c96facce48b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
