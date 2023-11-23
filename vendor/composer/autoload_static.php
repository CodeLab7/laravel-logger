<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf17877c63237760280f4c624e6fd29e4
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Codelab7\\LaravelLogger\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Codelab7\\LaravelLogger\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf17877c63237760280f4c624e6fd29e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf17877c63237760280f4c624e6fd29e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf17877c63237760280f4c624e6fd29e4::$classMap;

        }, null, ClassLoader::class);
    }
}
