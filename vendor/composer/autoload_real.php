<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5738a78690717b6258b2a0fd75cf0fcb
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit5738a78690717b6258b2a0fd75cf0fcb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5738a78690717b6258b2a0fd75cf0fcb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5738a78690717b6258b2a0fd75cf0fcb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
