<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteca353772bb1f5812af5716025d59a1f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticIniteca353772bb1f5812af5716025d59a1f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteca353772bb1f5812af5716025d59a1f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteca353772bb1f5812af5716025d59a1f::$classMap;

        }, null, ClassLoader::class);
    }
}
