<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaa7cbe0e2ef365dfa3e4f416312e47d8
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Futurapay\\Sdk\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Futurapay\\Sdk\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitaa7cbe0e2ef365dfa3e4f416312e47d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaa7cbe0e2ef365dfa3e4f416312e47d8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaa7cbe0e2ef365dfa3e4f416312e47d8::$classMap;

        }, null, ClassLoader::class);
    }
}