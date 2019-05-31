<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf803faa26be6b12dd5580fa20c23e72
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grpc\\' => 5,
            'Google\\Protobuf\\' => 16,
            'GPBMetadata\\Google\\Protobuf\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grpc\\' => 
        array (
            0 => __DIR__ . '/..' . '/grpc/grpc/src/lib',
        ),
        'Google\\Protobuf\\' => 
        array (
            0 => __DIR__ . '/..' . '/google/protobuf/src/Google/Protobuf',
        ),
        'GPBMetadata\\Google\\Protobuf\\' => 
        array (
            0 => __DIR__ . '/..' . '/google/protobuf/src/GPBMetadata/Google/Protobuf',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaf803faa26be6b12dd5580fa20c23e72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaf803faa26be6b12dd5580fa20c23e72::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
