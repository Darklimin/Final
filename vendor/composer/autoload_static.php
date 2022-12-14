<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae80f9c2b0aa84b82b72b2c5149a787c
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'final\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'final\\' => 
        array (
            0 => '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae80f9c2b0aa84b82b72b2c5149a787c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae80f9c2b0aa84b82b72b2c5149a787c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae80f9c2b0aa84b82b72b2c5149a787c::$classMap;

        }, null, ClassLoader::class);
    }
}
