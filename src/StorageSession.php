<?php
namespace BaseCode\Storage;

/**
 * Class StorageSession
 * @package BaseCode\StorageSession
 */
Class StorageSession {

    public function set(string $name, $value): StorageSession
    {
        $_SESSION[$name] = $value;

        return $this;
    }

    public function get(string $name, $default = null)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return $default;
    }

    public function all(): array
    {
        return $_SESSION;
    }

    public function regenerate(): bool
    {
        return session_regenerate_id(true);
    }

    public function delete(string $name): bool
    {
        if ($this->get($name)) {
            unset($_SESSION[$name]);
            return true;
        }

        return false;
    }

    public function destroy(): bool
    {
        return session_destroy();
    }
}