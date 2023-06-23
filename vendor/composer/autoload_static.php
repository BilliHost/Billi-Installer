<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c81812d94cdbd8f566ac763b664ab55
{
    public static $files = array (
        '1ccb8c06b7341495cbfde88deea573ac' => __DIR__ . '/../..' . '/src/Helpers/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Billidev\\Billiinstaller\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Billidev\\Billiinstaller\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c81812d94cdbd8f566ac763b664ab55::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c81812d94cdbd8f566ac763b664ab55::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c81812d94cdbd8f566ac763b664ab55::$classMap;

        }, null, ClassLoader::class);
    }
}
