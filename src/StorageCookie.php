<?php
namespace BaseCode\Storage;

/**
 * Class StorageCookie
 * @package BaseCode\StorageCookie
 */
Class StorageCookie {

    /** @var null|array */
    private $options;

    public function expire(string $type, int $quantity): StorageCookie
    {
        $times = [
            "seconds" => 1,
            "minute" => 60,
            "hour" => 3600,
            "day" => 86400,
            "month" => 2678400,
            "year" => 31536000
        ];

        $expire = 0;

        if (array_key_exists($type, $times)) {
            $expire = time() + $times[$type] * $quantity;
        }

        $this->options["expires"] = $expire;

        return $this;
    }

    public function path(string $path): StorageCookie
    {
        $this->options["path"] = $path;
        return $this;
    }

    public function domain(string $domain): StorageCookie
    {
        $this->options["domain"] = $domain;
        return $this;
    }

    public function secure(bool $bool): StorageCookie
    {
        $this->options["secure"] = $bool;
        return $this;
    }

    public function httpOnly(bool $bool): StorageCookie
    {
        $this->options["httponly"] = $bool;
        return $this;
    }

    public function sameSite(string $samesite): StorageCookie
    {
        $this->options["samesite"] = $samesite;
        return $this;
    }

    public function set(string $name, $value): bool
    {
        $result = setcookie($name, $value, ($this->options ?: []));

        $this->options = null;
        return $result;
    }

    public function get(string $name, $default = null)
    {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }

        return $default;
    }

    public function all(): array
    {
        return $_COOKIE;
    }

    public function delete(string $name): bool
    {
        if ($this->get($name)) {
            return $this->expire("minute", -1000)->set($name, null);
        }

        return false;
    }

    public function destroy(): bool
    {
        $all = $this->all();

        $result = true;

        foreach ($all as $name => $value) {
            if (!$this->delete($name)) {
                $result = false;
            }
        }
    
        return $result;
    }

}