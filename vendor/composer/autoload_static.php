<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita9cacd03048f97949ce897ce6acbd961
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Reaction\\Inc\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Reaction\\Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita9cacd03048f97949ce897ce6acbd961::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita9cacd03048f97949ce897ce6acbd961::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita9cacd03048f97949ce897ce6acbd961::$classMap;

        }, null, ClassLoader::class);
    }
}
