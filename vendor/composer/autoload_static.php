<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitec596ebb8dc1485b7a7dd931d425bf68
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitec596ebb8dc1485b7a7dd931d425bf68::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitec596ebb8dc1485b7a7dd931d425bf68::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitec596ebb8dc1485b7a7dd931d425bf68::$classMap;

        }, null, ClassLoader::class);
    }
}
