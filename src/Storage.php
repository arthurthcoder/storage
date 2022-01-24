<?php
namespace BaseCode\Storage;

/**
 * Class Storage
 * @package BaseCode\Storage
 */
Class Storage {

    /** @var StorageSession */
    public static $session;

    /** @var StorageCookie */
    public static $cookie;

    /**
     * @return StorageSession
     */
    public static function session(): StorageSession
    {
        if (empty(self::$session)) {
            self::$session = new StorageSession();
        }

        return self::$session;
    }

    /**
     * @return StorageCookie
     */
    public static function cookie(): StorageCookie
    {
        if (empty(self::$cookie)) {
            self::$cookie = new StorageCookie();
        }

        return self::$cookie;
    }

}