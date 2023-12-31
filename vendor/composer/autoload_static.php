<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a075a427cfb1e691eb31ef0ce3842ff
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a075a427cfb1e691eb31ef0ce3842ff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a075a427cfb1e691eb31ef0ce3842ff::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9a075a427cfb1e691eb31ef0ce3842ff::$classMap;

        }, null, ClassLoader::class);
    }
}
