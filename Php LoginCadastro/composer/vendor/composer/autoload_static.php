<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitecae81868e2d434ddfa2c7d4086ea9d9
{
    public static $files = array (
        'c65d09b6820da036953a371c8c73a9b1' => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook/polyfills.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitecae81868e2d434ddfa2c7d4086ea9d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitecae81868e2d434ddfa2c7d4086ea9d9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
