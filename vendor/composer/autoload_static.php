<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita12e145c4d332a505058fb2e0995e6b2
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dealskoo\\Admin\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dealskoo\\Admin\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita12e145c4d332a505058fb2e0995e6b2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita12e145c4d332a505058fb2e0995e6b2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita12e145c4d332a505058fb2e0995e6b2::$classMap;

        }, null, ClassLoader::class);
    }
}
